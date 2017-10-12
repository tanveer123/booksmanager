<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;
use App;
use App\Rack;
use App\Admin;
use Auth;
use DB;

class RacksController extends Controller
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

    /*Get all racks on page load*/
    public function index()
    {
        $racks = App\Rack::orderBy('id','Desc')->get();
        return view('admin.racks',array('racks' => $racks));
    }

    /*Get single rack when id is supplied in edit mode*/
    public function getrack(Request $request)
    {
        $rack = Rack::find($request->id);
        return response()->json($rack);
    }

    /*Method saves rack into database*/
	public function save(Request $request) 
	{
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:racks',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->all());
        }

        $dt = date('Y-m-d H:i:s', strtotime($request->d . ' ' . $request->time));
		$rack = new Rack;

		$rack->name = $request->input('name');
        $rack->is_active = $request->input('status');
        $rack->created_by = Auth::guard('admins')->user()->id;
        $rack->created_at = $dt;
        $rack->updated_by = Auth::guard('admins')->user()->id;
        $rack->updated_at = $dt;
        $rack->save();

        Session::flash('status', 'success');
        Session::flash('message', 'Rack has been added successfully.');
        return response()->json('');
	}

    /*Method updates rack into database*/
    public function update(Request $request, $id)
	{
        $dt = date('Y-m-d H:i:s', strtotime($request->d . ' ' . $request->time));

        $rack = Rack::find($id);

        $rack->name = $request->input('name');
        $rack->is_active = $request->input('status');
        $rack->updated_by = Auth::guard('admins')->user()->id;
        $rack->updated_at = $dt;
        $rack->save();

        Session::flash('status', 'success');
        Session::flash('message', 'Rack has been updated successfully.');
        return response()->json('');
    }

    /*Method deletes a rack from database*/
    public function delrack(Request $request) {
        $this->delete($request->id);
        Session::flash('status', 'success');
        Session::flash('message', 'Rack has been deleted successfully.');
        return response()->json('');
    }

    /*Delete method*/
    public function delete($id)
    {
        $rack = new Rack;
        $rack = Rack::find($id);
        $rack->delete();
    }
}
