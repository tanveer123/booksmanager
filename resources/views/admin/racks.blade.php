@extends('admin.layouts.layout')

@section('racks-active', 'active')
@section('page-title', 'Racks')
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
                    <div class="caption">Racks</div>
                    <div class="actions"><a onclick="toggle('add', 0)" class="btn btn-warning btn-xs"><i class="fa fa-plus"></i>&nbsp;New Rack</a></div>
                </div>
                <div class="portlet-body">
                    <div class="row mbm">
                        <div class="col-lg-12">
                            @if(count($racks) > 0)
                                <div class="table-responsive">
                                    <table id="racks" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Created by</th>
                                        <th>Created at</th>
                                        <th>Updated by</th>
                                        <th>Updated at</th>
                                        <th width="25%" align="center" style="text-align:center;">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($racks as $rack)
                                        <tr id="rack-row-{{ $rack->id }}">
                                            <td>{{ $rack->name }}</td>
                                            <td style="text-align: center;">
                                                @if($rack->is_active == 0)
                                                    <span class="label label-sm label-danger label-{{ $rack->is_active }}">Pending</span>
                                                @else
                                                    <span class="label label-sm label-success label-{{ $rack->is_active }}">Active</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ \App\Admin::user($rack->created_by)  }}
                                            </td>
                                            <td>
                                                {{ Carbon\Carbon::parse($rack->created_at)->format('d/m/Y h:i:s A') }}
                                            </td>
                                            <td>
                                                {{ \App\Admin::user($rack->updated_by) }}
                                            </td>
                                            <td>
                                                {{ Carbon\Carbon::parse($rack->updated_at)->format('d/m/Y h:i:s A') }}
                                            </td>
                                            <td><div class="action-btns">
                                                    <a type="button" class="btn btn-default btn-xs" onclick="toggle('edit',{{ $rack->id }})"><i class="fa fa-edit"></i>&nbsp;Edit</a>&nbsp;&nbsp;
                                                    <button class="btn btn-danger btn-xs btn-delete" onclick="delRack({{ $rack->id }})"><i class="fa fa-trash-o"></i>&nbsp;Delete</button></div></td>
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
                <form name="frmRack" id="frmRack" class="form-horizontal" method="post" onsubmit="return saveRack()">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"> </h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Name <span class="required">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter rack name here" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-8">
                                <select name="status" id="status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Pending</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="rack_id" id="rack_id" />
                        <button class="btn btn-primary" type="submit" id="btn-save">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section ('scripts')
    <script src="{{ asset('public/js/racks.js') }}"></script>
@endsection