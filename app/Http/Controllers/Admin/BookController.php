<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;
use App\Category;
use App\Author;
use App\Country;
use File;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $searchTerm = request()->get('s');
    	$books = Book::with('author', 'category')->orWhere('title', 'LIKE', "%{$searchTerm}%")->orderBy('id', 'DESC')->paginate(10);
        return view('admin/book/index')
            ->with(compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $countries = Country::get();
         $categories = Category::get();
         $authors = Author::get();
        return view('admin/book/create')
          ->with(compact('countries', 'categories', 'authors'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required',
            'slug' => 'required',
            'category_id' => 'required|not_in:none',
            'author_id' => 'required|not_in:none',
            'availability' => 'required',
            'price' => 'required',
            'country_of_publisher' => 'required|not_in:none',
            'description' => 'required',
            'book_img' => 'required|image|mimes:jpeg,jpg,gif,png',
            'book_upload' => 'required|mimes:pdf'

        ]);

        $fileName = null;
        $bookPDF = null;    
        
        if (request()->hasFile('book_img')) 
        {
            $file = request()->file('book_img');
            $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/books', $fileName);
        }

        if (request()->hasFile('book_upload')) 
        {
            $PDFFile = request()->file('book_upload');
            $bookPDF = md5($PDFFile->getClientOriginalName()) . time() . "." . $PDFFile->getClientOriginalExtension();
            $PDFFile->move('./uploads/books', $bookPDF);
        }

        Book::create([
            'category_id' => request()->get('category_id'),
            'author_id' => request()->get('author_id'),
            'user_id' => '2',
            'title' => request()->get('title'),
            'slug' => request()->get('slug'),
            'availability' => request()->get('availability'),
            'price' => request()->get('price'),
            'publisher' => request()->get('publisher'),
            'country_of_publisher' => request()->get('country_of_publisher'),
            'isbn' => request()->get('isbn'),
            'isbn-10' => request()->get('isbn-10'),
            'audience' => request()->get('audience'),
            'format' => request()->get('format'),
            'language' => request()->get('language'),
            'description' => request()->get('description'),
            'book_upload' => $bookPDF,
            'book_img' => $fileName,
            'total_pages' => request()->get('total_pages'),
            'downloaded' => '4',
            'edition_number' => request()->get('edition_number'),
            'recomended' => request()->get('recomended'),
            'status' => 'DEACTIVE',
        ]);

        return redirect()->to('/admin/book');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        $countries = Country::get();
        $categories = Category::get();
        $authors = Author::get();
        return view('admin/book/edit')
         ->with(compact('book', 'countries', 'categories', 'authors'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $this->validate(request(), [
            'title' => 'required',
            'slug' => 'required',
            'category_id' => 'required|not_in:none',
            'author_id' => 'required|not_in:none',
            'availability' => 'required',
            'price' => 'required',
            'country_of_publisher' => 'required|not_in:none',
            'description' => 'required',
            //'book_img' => 'required|image|mimes:jpeg,jpg,gif,png',
            //'book_upload' => 'required|mimes:pdf'

        ]);

        $currentImage = $book->book_img;
        $currentPDF = $book->book_upload;

        $fileName = null;
        if (request()->hasFile('book_img'))
        {
           $file = request()->file('book_img');
           $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
           $file->move('./uploads/books', $fileName);
        }

        $bookPDF = null;
        if (request()->hasFile('book_upload')) 
        {
            $PDFFile = request()->file('book_upload');
            $bookPDF = md5($PDFFile->getClientOriginalName()) . time() . "." . $PDFFile->getClientOriginalExtension();
            $PDFFile->move('./uploads/books', $bookPDF);
        }


        $book->update([
            'category_id' => request()->get('category_id'),
            'author_id' => request()->get('author_id'),
            'user_id' => '2',
            'title' => request()->get('title'),
            'slug' => request()->get('slug'),
            'availability' => request()->get('availability'),
            'price' => request()->get('price'),
            'publisher' => request()->get('publisher'),
            'country_of_publisher' => request()->get('country_of_publisher'),
            'isbn' => request()->get('isbn'),
            'isbn-10' => request()->get('isbn-10'),
            'book_img' => ($fileName) ? $fileName : $currentImage,
            'book_upload' => ($bookPDF) ? $bookPDF : $currentPDF,
            'audience' => request()->get('audience'),
            'format' => request()->get('format'),
            'language' => request()->get('language'),
            'total_pages' => request()->get('total_pages'),
            'downloaded' => '4',
            'edition_number' => request()->get('edition_number'),
            'recomended' => request()->get('recomended'),
            'description' => request()->get('description')
        ]);

        if ($fileName) {
            File::delete('./uploads/books/' . $currentImage);
        }

        if ($bookPDF) {
            File::delete('./uploads/books/' . $currentPDF);        
        }

        return redirect()->to('/admin/book');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
      if ($request->ajax()) {
          $book = Book::find($id); //db column name should be id
          $currentImage = $book->book_img;
          $currentPDF = $book->book_upload;
          $book->delete();
          File::delete('./uploads/books/' . $currentImage);
          File::delete('./uploads/books/' . $currentPDF);
          return 'true';
      }
        return 'false';
    }

    public function status(Request $request, $id)
    {
        if ($request->ajax()) {
        $book = Book::find($id);
        $newStatus = ($book->status == 'DEACTIVE') ? 'ACTIVE': 'DEACTIVE';
        $book->update ([
            'status' => $newStatus

        ]);
        return $newStatus;    
        }
        return redirect()->back();
    }
}
