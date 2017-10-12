@extends('layouts.app')

@section('title', 'Racks')

@section('page_id', 'racks')

@section('content')
    <div class="content user-content">
        
        <div class="container">
            <h2 class="page-title">Racks</h2>
            <div class="row">
                <div class="col-lg-12">

                </div>
            </div>
            <div class="table-responsive">
                <table id="racks" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Books</th>
                            <th align="center" style="text-align:center;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($racks as $rack)
                        <tr id="rack-row-{{ $rack->id }}">
                            <td>{{ $rack->name }}</td>  
                            <td>{{ $rack->books }}</td>
                            <td class="align-center"><div class="action-btns">
                                <a type="button" class="btn btn-success btn-xs" href="{{ url('books') . '/' . $rack->id }}"><i class="fa fa-hand-o-left"></i>&nbsp;View</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection