<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Notifications\newnotyfy;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use App\Notifications\InvoicePaid;


use App\Events\newevent;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index1()
    {
        return view('home');
    }
    public function send(Request $req)
    {
        $user = User::find(15);
        $kk= Auth::user()->name .' '. $req->messege;


     $user->notify(new InvoicePaid($kk));

    event(new newevent($kk));


        return back();
        // Notification::send($users, new InvoicePaid($invoice));
    }
    public function index()
    {
        //
    $catagorys= User::latest()->get();
        return $catagorys;
    }

}
