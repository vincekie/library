<?php

namespace App\Http\Controllers\authentications;

use App\Models\User;
use App\Models\AddUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\SendDemoEmail;
use Illuminate\Support\Facades\Mail;


class RegisterBasic extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-register-basic');
  }

}
