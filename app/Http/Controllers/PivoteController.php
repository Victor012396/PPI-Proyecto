<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\device;

class PivoteController extends Controller
{
    public function index(){
        $user =User::find(1);
        $user =device::find(2);
        return view('welcome', compact('user','materia'));
    }
}
