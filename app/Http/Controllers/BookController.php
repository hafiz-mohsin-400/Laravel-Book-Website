<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    public function show($slug)
   {
   		$book = Book::with('category')->where('slug', $slug)->first();
   		return view('book.detail')->with(compact('book'));
   }
    
   public function show_by_author($slug)
   {
   		$bookbyauthor = Book::with('author')->where('slug', $slug)->first();
   		return view('book.detail')->with(compact('bookbyauthor'));
   }
    
   public function show_book_by_active()
   {
   		$books_active = Book::with('scopeActive')->get();
   		return $books_active;
   } 
}
