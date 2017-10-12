<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Rack;

class RacksController extends Controller
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

    /*Get all the racks from database*/
    public function index()
    {
        $racks1 = \DB::table('racks')
            ->leftJoin('books', 'books.rack_id', '=', 'racks.id')
            ->select(\DB::raw('racks.id,racks.name, count(books.id) as books'))
            ->groupBy('racks.id')
            ->groupBy('racks.name');

        $racks = \DB::table('racks')
            ->rightJoin('books', 'books.rack_id', '=', 'racks.id')
            ->select(\DB::raw('racks.id,racks.name, count(books.id) as books'))
            ->where('racks.is_active',1)
            ->where('books.is_active',1)
            ->groupBy('racks.id')
            ->groupBy('racks.name')
            ->union($racks1)
            ->get();
		return view('racks',array('racks' => $racks));
    }
}
