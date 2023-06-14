<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class StatController extends Controller
{

    public function __construct()
    {
        
    }

    public function index()
    {
        if(auth()->id() == 2) {

        }
    }
}
