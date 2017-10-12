<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App;
use App\Book;
use App\Admin;
use Auth;
use DB;
use Carbon;

class BooksController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    /*Get all books on page load*/
    public function index()
    {
        $books = App\Book::orderBy('id','Desc')->get();
        $racks = App\Rack::orderBy('name','Asc')->get();
        return view('admin.books',array('books' => $books, 'racks' => $racks));
    }

    /*Get single book when id is supplied in edit mode*/
    public function getbook(Request $request)
    {
        $book = Book::find($request->id);
        return response()->json($book);
    }

    /*Method saves book into database*/
    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'rack_id' => 'required',
        ]);
        $maxRBooks = Book::where('rack_id',$request->input('rack_id'))->count();
        if($maxRBooks >= 10)
        {
            $validator->getMessageBag()->add('maxrbooks', 'You can not not add more than 10 books in a rack.');
            return response()->json($validator->errors()->all());
        }

        $dt = date('Y-m-d H:i:s', strtotime($request->d . ' ' . $request->time));
        $book = new Book;

        $book->title = $request->input('title');
        $book->rack_id = $request->input('rack_id');
        $book->pub_year = $request->input('pub_year');
        $book->author = $request->input('author');
        $book->is_active = $request->input('status');
        $book->created_by = Auth::guard('admins')->user()->id;
        $book->created_at = $dt;
        $book->updated_by = Auth::guard('admins')->user()->id;
        $book->updated_at = $dt;
        $book->save();

        Session::flash('status', 'success');
        Session::flash('message', 'Book has been added successfully.');
        return response()->json('');
    }

    /*Method updates book into database*/
    public function update(Request $request, $id)
    {
        $dt = date('Y-m-d H:i:s', strtotime($request->d . ' ' . $request->time));

        $book = Book::find($id);

        $book->title = $request->input('title');
        $book->rack_id = $request->input('rack_id');
        $book->author = $request->input('author');
        $book->pub_year = $request->input('pub_year');
        $book->is_active = $request->input('status');
        $book->updated_by = Auth::guard('admins')->user()->id;
        $book->updated_at = $dt;
        $book->save();

        Session::flash('status', 'success');
        Session::flash('message', 'Book has been updated successfully.');
        return response()->json('');
    }

    /*Method deletes a book from database*/
    public function delbook(Request $request) {
        $this->delete($request->id);
        Session::flash('status', 'success');
        Session::flash('message', 'Book has been deleted successfully.');
        return response()->json('');
    }

    /*Delete method*/
    public function delete($id)
    {
        $book = new Book();
        $book = Book::find($id);
        $book->delete();
    }
}
