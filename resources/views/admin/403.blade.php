@extends('admin.layouts.layout')

@section('dashboard-active', 'active')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="note note-danger" style="display:none;">
                <h4 class="box-heading">Error</h4>
                <p>{{ $exception }}</p>
            </div>
        </div>
    </div>
@endsection