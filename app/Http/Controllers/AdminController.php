<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Voertuig;
use App\Lespakket;
use App\Rol;
use App\Voertuigtype;
use App\Lesprijs;
use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getData()
    {
        $users = User::All();
        $voertuigen = Voertuig::orderBy('voertuigtype_voertuigtype_id')->get();
        $lespakketten = Lespakket::orderBy('voertuigtype_voertuigtype_id', 'DESC')->get();

        return view('beheer', [
            'users' => $users,
            'voertuigen' => $voertuigen,
            'lespakketten' => $lespakketten
        ]);
    }


    //User routes
    public function getUser($id)
    {
        $user = User::all()->where('id', $id)->first();

        return view('edit_user', [
            'user' => $user
        ]);
    }

    public function newUser()
    {
        return view('new_user');
    }

    public function editUser(Request $request)
    {
        if (User::where('email', $request->input('email'))->get() == false) {
            User::create($request->all());
        }

        $user = User::where('email', $request->input('email'))->first();
        $user->voornaam = $request->input('voornaam');
        $user->tussenvoegsel = $request->input('tussenvoegsel');
        $user->achternaam = $request->input('achternaam');
        $user->geslacht = $request->input('geslacht');
        $user->adres = $request->input('adres');
        $user->huisnr = $request->input('huisnr');
        $user->postcode = $request->input('postcode');
        $user->plaats = $request->input('plaats');
        $user->telefoon = $request->input('telefoon');
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect('/beheer');
    }

    public function insertUser(Request $request)
    {
        $user = User::create($request->all());
        $user->toRol()->attach(3);

        return redirect('/beheer');
    }

    //Employees routes
    public function getEmployee($id)
    {
        $user = User::all()->where('id', $id)->first();
        $rollen = Rol::all();

        return view('edit_employee', [
            'user' => $user,
            'rollen' => $rollen
        ]);
    }

    public function newEmployee()
    {
        $rollen = Rol::all();
        return view('new_employee', [
            'rollen' => $rollen
        ]);
    }

    public function editEmployee(Request $request)
    {
        if (User::where('email', $request->input('email'))->get() == false) {
            User::create($request->all());
        }

        $user = User::where('email', $request->input('email'))->first();
        $user->voornaam = $request->input('voornaam');
        $user->tussenvoegsel = $request->input('tussenvoegsel');
        $user->achternaam = $request->input('achternaam');
        $user->geslacht = $request->input('geslacht');
        $user->adres = $request->input('adres');
        $user->huisnr = $request->input('huisnr');
        $user->postcode = $request->input('postcode');
        $user->plaats = $request->input('plaats');
        $user->telefoon = $request->input('telefoon');
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->password = bcrypt($request->input('password'));
        $user->save();
//        $user->toRol()->updateExistingPivot($user->toRol[0]->rol_id, ['rol_rol_id' => $request->get('rol')]);

        return redirect('/beheer');
    }

    public function insertEmployee(Request $request)
    {
        $user = User::create($request->all());
        $user->toRol()->attach($request->get('rol'));

        return redirect('/beheer');
    }

    //Voertuig routes

    public function getVoertuig($kenteken)
    {
        $voertuig = Voertuig::all()->where('kenteken', $kenteken)->first();
        $voertigtypes = Voertuigtype::all();

        return view('edit_voertuig', [
            'voertuig' => $voertuig,
            'voertuigtypes' => $voertigtypes
        ]);
    }

    public function newVoertuig()
    {
        $voertuigtypes = Voertuigtype::all();
        return view('new_voertuig', [
            'voertuigtypes' => $voertuigtypes
        ]);
    }

    public function editVoertuig(Request $request)
    {
        $voertuig = Voertuig::where('kenteken', $request->input('kenteken'))->first();
        $voertuig->kenteken = $request->input('kenteken');
        $voertuig->merk = $request->input('merk');
        $voertuig->aankoopdatum = $request->input('aankoopdatum');
        $voertuig->voertuigtype_voertuigtype_id = $request->input('voertuigtype_voertuigtype_id');
        $voertuig->save();

        return redirect('/beheer');
    }

    public function insertVoertuig(Request $request)
    {
        Voertuig::create($request->except('_token'));

        return redirect('/beheer');
    }

    //Lespakket routes

    public function getLespakket($id)
    {
        $lespakket = Lespakket::all()->where('lespakket_id', $id)->first();
        $voertigtypes = Voertuigtype::all();

        return view('edit_lespakket', [
            'lespakket' => $lespakket,
            'voertuigtypes' => $voertigtypes
        ]);
    }

    public function newLespakket()
    {
        $voertuigtypes = Voertuigtype::all();
        return view('new_lespakket', [
            'voertuigtypes' => $voertuigtypes
        ]);
    }

    public function editLespakket(Request $request)
    {
        $voertuig = Lespakket::where('lespakket_id', $request->input('lespakket_id'))->first();
        $voertuig->lespakket = $request->input('lespakket');
        $voertuig->lessenaantal = $request->input('lessenaantal');
        if ($request->input('actie') != "") {
            $voertuig->actie = $request->input('actie');
        }
        $voertuig->voertuigtype_voertuigtype_id = $request->input('voertuigtype_voertuigtype_id');
        $voertuig->save();

        return redirect('/beheer');
    }

    public function insertLespakket(Request $request)
    {
        $lespakket = Lespakket::create($request->except('_token', 'prijs'));

        $lesprijs = Lesprijs::create([
            'prijs' => $request->get('prijs'),
            'lespakket_lespakket_id' => $lespakket->lespakket_id
        ]);

        return redirect('/beheer');
    }
}
