<?php

namespace App\Http\Controllers\books;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReturnBookBasic extends Controller
{
    public function index(){
      return view("content.books.issue-returnbook-basic");
    }
}
