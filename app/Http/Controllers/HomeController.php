<?php

namespace App\Http\Controllers;

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
        return view('home', [
            'lespakketten' => $lespakketten
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
