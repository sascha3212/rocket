<?php

namespace App\Http\Controllers;

use App\Absentie;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Voertuig;
use App\Lespakket;
use App\Feestdagen;
use App\Contract;
use App\Les;
use Carbon\Carbon;

class UserController extends Controller
{
    public function reserveren()
    {
        function generateDateRange(Carbon $start_date, Carbon $end_date)
        {
            $dates = [];

            for ($date = $start_date; $date->lte($end_date); $date->addDay()) {
                $dates[] = $date->format('Y-m-d');
            }

            return $dates;
        }

        $lespakketten = Lespakket::all();
        $contracten = Contract::where('users_id', Auth::user()->id)->get();
        $users = User::all();
        $voertuigen = Voertuig::all();
        $lessen = Les::where('geannuleerd',0)->get();
        $absenties = Absentie::all();
        $feestdagen = Feestdagen::all();

        $absente_dagen = [];
        $feest_dagen = [];
        $niet_mogelijk = [];

        for ($dag = 0; $dag <= 20; ++$dag) {
            $datum = Carbon::createFromFormat('H:i', '07:00')->addDay($dag);
            $datum->toDateTimeString();
            // 9 hours up from 07:00 - 17:00
            for ($uur = 0; $uur <= 9; $uur++) {
                $datum = $datum->addHour(1);

                // Ook als er geen lessen bestaan, Maak alsnog de datums aan.
                if (count($lessen) > 0) {

                    foreach ($lessen as $les) {
                        // check if les not exist on that time
                        // else the les does exist on that time
                        if ($les->lesdatum . ' ' . $les->starttijd <> $datum->format('Y-m-d H:i:s')) {
                            // Check if key doesnt exist yet, Otherwise the forloop replaces all key's except the last one.
                            if (!isset($dates[$datum->format('Y-m-d')][$datum->format("H:i:s")])) {
                                $dates[$datum->format('Y-m-d')][$datum->format("H:i:s")] = 'vrij';
                            }
                        } else {
                            $dates[$datum->format('Y-m-d')][$datum->format("H:i:s")] = $les;
                        }
                    }
                } else {
                    $dates[$datum->format('Y-m-d')][$datum->format("H:i:s")] = 'vrij';
                }
            }
            $datum->addDay();
        }

        foreach ($contracten as $contract) {
            foreach ($users as $user) {
                if ($user->id == $contract->instructeur_id) {
                    foreach ($absenties as $absentie) {
                        if ($absentie->users_id == $user->id) {
                            $absente_dagen = generateDateRange(Carbon::parse($absentie->startdatum), Carbon::parse($absentie->einddatum));
                        }
                    }
                }
            }
        }
        foreach ($feestdagen as $feestdag) {
            $feest_dagen = generateDateRange(Carbon::parse($feestdag->datum), Carbon::parse($feestdag->einddatum));
        }

        foreach ($absente_dagen as $absente_dag) {
            $niet_mogelijk[$absente_dag] = $absente_dag;
        }

        foreach ($feest_dagen as $feest_dag) {
            $niet_mogelijk[$feest_dag] = $feest_dag;
        }

        $beschikbaar = generateDateRange(Carbon::now(), Carbon::now()->addWeek(3));
        $het_kan = [];


        foreach ($beschikbaar as $mooiedag) {
            $het_kan[$mooiedag] = $mooiedag;
        }
        foreach ($niet_mogelijk as $kutdag) {
            $het_kan[$kutdag] = '-';
        }

        return view('lessen', [
            'niet_mogelijk' => $het_kan,
            'lespakketten' => $lespakketten,
            'voertuigen' => $voertuigen,
            'users' => $users,
            'contracten' => $contracten,
            'dates' => $dates
        ]);
    }

    public function insertLes(Request $request)
    {
        $les = new Les();
        $les->lesdatum = $request->get('lesdatum');
        $les->starttijd = $request->get('starttijd');
        $les->klant = Auth::user()->id;
        $les->instructeur = 3;
        $les->ophaaladres = $request->get('ophaaladres');
        $les->voertuig_kenteken = 'XD-XD-69';
        $les->lestype_lestype_id = 1;
        $les->save();

        return redirect('lessen');
    }

    public function annuleerLes($id)
    {
        $les = Les::where('les_id',$id)->first();
        $les->geannuleerd = 1;
        $les->save();

        return redirect('lessen');
    }

}
