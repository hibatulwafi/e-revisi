<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class WelcomeController extends Controller
{

  public function __construct()
    {
          $user = Auth::user();
dd($user);
    }

    public function index()
    {
          dd(Auth::user());
    }

}
