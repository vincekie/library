<?php

namespace App\Http\Controllers\books;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BorrowBookBasic extends Controller
{
    public function index(){
      return view("content.books.issue-borrowbooks-basic");
    }
}
