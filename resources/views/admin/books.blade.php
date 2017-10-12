@extends('admin.layouts.layout')

@section('books-active', 'active')
@section('page-title', 'Books')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="note note-success" style="{{ (Session('status') == 'success') ? 'display:block' : 'display:none' }}">
                <h4 class="box-heading">Success</h4>
                <p>{{ Session::get('message') }}</p>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="portlet box">
                <div class="portlet-header">
                    <div class="caption">Books</div>
                    <div class="actions"><a onclick="toggle('add', 0)" class="btn btn-warning btn-xs"><i class="fa fa-plus"></i>&nbsp;New Book</a></div>
                </div>
                <div class="portlet-body">
                    <div class="row mbm">
                        <div class="col-lg-12">
                            @if(count($books) > 0)
                                <div class="table-responsive">
                                    <table id="books" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Pub Year</th>
                                        <th>Rack</th>
                                        <th>Status</th>
                                        <th>Created by</th>
                                        <th>Created at</th>
                                        <th>Updated by</th>
                                        <th>Updated at</th>
                                        <th width="25%" align="center" style="text-align:center;">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($books as $book)
                                        <tr id="book-row-{{ $book->id }}">
                                            <td>{{ $book->title }}</td>
                                            <td>{{ $book->author }}</td>
                                            <td>{{ $book->pub_year }}</td>
                                            <td>{{ $book->rack->name }}</td>
                                            <td style="text-align: center;">
                                                @if($book->is_active == 0)
                                                    <span class="label label-sm label-danger label-{{ $book->is_active }}">Pending</span>
                                                @else
                                                    <span class="label label-sm label-success label-{{ $book->is_active }}">Active</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ \App\Admin::user($book->created_by) }}
                                            </td>
                                            <td>
                                                {{ Carbon\Carbon::parse($book->created_at)->format('d/m/Y h:i:s A') }}
                                            </td>
                                            <td>
                                                {{ \App\Admin::user($book->updated_by) }}
                                            </td>
                                            <td>
                                                {{ Carbon\Carbon::parse($book->updated_at)->format('d/m/Y h:i:s A') }}
                                            </td>
                                            <td><div class="action-btns">
                                                    <a type="button" class="btn btn-default btn-xs" onclick="toggle('edit',{{ $book->id }})"><i class="fa fa-edit"></i>&nbsp;Edit</a>&nbsp;&nbsp;
                                                    <button class="btn btn-danger btn-xs btn-delete" onclick="delBook({{ $book->id }})"><i class="fa fa-trash-o"></i>&nbsp;Delete</button></div></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                    <input type="hidden" name="csrf-token2" id="csrf-token2" value="{{ csrf_token() }}">
                                </div>
                            @else
                                <div class="info" style="text-align: center; margin-top: 20px; font-weight: bold;">No book record found in the database.</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" object="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="frmBook" id="frmBook" class="form-horizontal" onsubmit="return saveBook()">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"> </h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="racks" class="col-sm-3 control-label">Racks <span class="required">*</span></label>
                            <div class="col-sm-8">
                                <select id="racks" class="form-control" name="rack_id" required>
                                    <option value="">Select rack</option>
                                    @foreach($racks as $rack)
                                        <option value="{{$rack->id}}">{{$rack->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-3 control-label">Title <span class="required">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter book title here" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="author" class="col-sm-3 control-label">Author</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="author" name="author" placeholder="Enter book author here" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pub_year" class="col-sm-3 control-label">Pub Year</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="pub_year" name="pub_year" placeholder="Enter pub year here" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status" class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-8">
                                <select name="status" id="status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Pending</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="book_id" id="book_id" />
                        <button class="btn btn-primary" type="submit" id="btn-save">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section ('scripts')
    <script src="{{ asset('public/js/books.js') }}"></script>
@endsection