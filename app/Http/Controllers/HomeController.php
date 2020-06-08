<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Author;
use App\Book;
use App\Category;
use App\Team;
use App\Media;
use carbon\carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    public function index()
   {
      $sliders = Media::where('media_type', 'slider')->active()->get();
      $upcoming_books = Book::where('status', 'UPCOMING')->limit(5)->get();
      $downloaded_books = Book::with('author', 'category')->orderBy('downloaded', 'DESC')->get();
      $recomended_books = Book::where('recomended', '1')->get();
      $categories = Category::active()->get();
      $books = Book::active()->with('author', 'category')->latest()->paginate(10);
      $author = Author::where('author_feature', 'yes')->active()->inRandomOrder()->first();
      $galleries = Media::active()->where('media_type', 'gallery')->limit(6)->get();
      return view('index')->with(compact('downloaded_books', 'recomended_books', 'categories', 'books', 'author', 'galleries', 'upcoming_books', 'sliders' ,'blogs'));
   }

   public function about()
   {
      $teams = Team::active()->inRandomOrder()->limit(4)->get();
       
       return view('about')->with(compact('teams'));
   }

   public function blog()
    {
      return view('blog');  
    }

   public function gallery()
   {
      $galleries = Media::where('media_type', 'gallery')->active()->paginate(12);
       return view('gallery')->with(compact('galleries'));
   }

   public function author()
   {
        $getSearch = request()->get('letter');
        $authors = Author::active()->where('title', 'LIKE', "$getSearch%")->paginate(5);
        $downloaded_books = Book::orderBy('downloaded', 'DESC')->limit(5)->get();
        $authorOfTheWeeks = Author::limit(5)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        return view('author')->with(compact('authors', 'downloaded_books', 'authorOfTheWeeks'));
   }

   public function author_detail($slug)
   {
        $author_detail = Author::where('slug', $slug)->first();
        return view('author_detail')
            ->with(compact('author_detail'));
   }
   
}
