<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Book;
use DB;

class BooksController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*Get all the books from a specified rack from database*/
    public function index($id)
    {
        $books = Book::where([['is_active',1],['rack_id',$id]])->get();
		return view('books',array('books' => $books,'rid' => $id));
    }

    /*Get searched books results*/
    public function searchbooks(Request $request,$id)
    {
        $rid = $request->rack_id;
        $title = $request->title;
        $author = $request->author;
        $pub_year = $request->pub_year;

        $books = Book::select(DB::Raw('books.*,racks.name'))
            ->Join('racks', 'racks.id', '=', 'books.rack_id')
            ->where('books.is_active','=',1)

            ->when($title, function ($query) use ($title) {
                return $query->where('books.title','like', '%'.$title.'%');
            })
            ->when($author, function ($query) use ($author) {
                return $query->where('books.author','like', '%'.$author.'%');
            })
            ->when($pub_year, function ($query) use ($pub_year) {
                return $query->where('books.pub_year','like', '%'.$pub_year.'%');
            })
            ->get();
        return view('books',array('books' => $books,'rid' => $rid));
    }
}
