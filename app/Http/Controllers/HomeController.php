<?php

namespace App\Http\Controllers;

use App\Roltoekenning;
use App\User;
use Illuminate\Http\Request;
use App\Lespakket;
use Auth;
class HomeController extends Controller
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
    public function index()
    {
        $lespakketten = Lespakket::All();
        $users = User::all();
        return view('home', [
            'lespakketten' => $lespakketten,
            'users' => $users
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
