@extends('layouts.app')

@section('title', 'Books')

@section('page_id', 'books')

@section('content')

    <div class="content user-content">

        <div class="container">
            <ol class="breadcrumb">
                <li><a href="{{ url('racks') }}">Racks</a></li>
                <li class="active">Books</li>
            </ol>
            <h2 class="page-title">Books</h2>
            <div class="row">
                <div class="col-lg-12 align-right">
                    <form name="searchForm" id="searchForm" method="post" action="{{ env('MAINPATH') . 'books/'. $rid }}">
                        {{ csrf_field() }}
                        <label class=""><strong>Search by:</strong></label>&nbsp;
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Book Title">&nbsp;
                        <input type="text" class="form-control" name="author" value="{{ old('author') }}" placeholder="Book Author">&nbsp;
                        <input type="text" class="form-control" name="pub_year" value="{{ old('pub_year') }}" placeholder="Published Year">&nbsp;
                        <input type="hidden" name="rack_id" id="rack_id" value="{{ $rid }}" />
                        <button type="submit" class="btn btn-primary">Submit</button>&nbsp;
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <table id="books" class="table table-hover table-striped table-bordered table-advanced">
                    <thead>
                        <tr>
                            <th>Rack</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Pub Year</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $book)
                        <tr id="book-row-{{ $book->id }}">
                            <td>{{ $book->rack->name }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->pub_year }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection