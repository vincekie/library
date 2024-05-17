<?php

namespace App\Http\Controllers\books;

use App\Models\Books;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BooksBasic extends Controller
{
    public function index() {
      $books = Books::all();
      return view("content.books.books-basic", ['books' => $books]);
    }

    public function getBooks(){
      $books = Books::all();
      return response()->json($books);
    }

    public function getBook($book_id) {

      $book = Books::findOrFail($book_id);
      return response()->json($book);
  }

public function updateBook(Request $request, $book_id) {
    $book = Books::findOrFail($book_id);

    $book->update($request->all());
    return response()->json(['message' => 'Book updated successfully']);
}


  public function deleteBook($book_id) {
      $book = Books::findOrFail($book_id);
      $book->delete();
      return response()->json(['message' => 'Book deleted successfully']);
  }

}
