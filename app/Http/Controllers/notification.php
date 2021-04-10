<?php

namespace App\Http\Controllers;

use App\Models\notification as ModelsNotification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class notification extends Controller
{
    public function index()
    {
        // $catagorys= ModelsNotification::all();

// foreach ($catagorys as $notification) {

//     $data=$notification->data->data;

// }


    $catagorys= ModelsNotification::latest()->get();

    return $catagorys;
    }

public function index1(Request $req){

Cache::set('key','$req');
$value = Cache::get('key');
// return view('welcome')->with('cc',$value);
echo $value;

    }
}
