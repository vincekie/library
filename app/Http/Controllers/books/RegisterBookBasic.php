<?php

namespace App\Http\Controllers\books;
use App\Models\Books;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterBookBasic extends Controller
{
  public function registerbook(Request $request){
    $create_book  = $request->validate([
      'title' => 'required|unique:book,title',
      'author' => 'required',
      'book_number' => 'required|unique:book,book_number',
      'genre' => 'required',
      'availability_status' => 'required',
    ]);

    $book = Books::create($create_book);
    return redirect()->route('books-basic');
  }
}
