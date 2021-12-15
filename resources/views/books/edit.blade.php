@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <a href="/books/{{$book->id}}"> <button style="margin-bottom: 20px" class="btn btn-outline-secondary">< Back</button> </a>
            
            <h4 class="text-dark">Update {{ $book->title }}</h4>
            <div class="card">
                <form class="form-control" method="POST" action="/books/{{ $book->id }}">
                    @csrf
                    @method('PUT')
                    <label for="author_name">Author:</label> <br> 
                    @foreach ($book->authors as $author)
                        <input type="text" name="author_name" value="{{ $author->name }}"> <br>
                    @endforeach

                    <label for="title">Book's title:</label> <br>
                    <input type="text" name="title" value="{{ $book->title }}"> <br>

                    <label for="release_year">Release year:  </label> <br>
                    <input type="numeric" name="release_year" value="{{ $book->release_year }}"> <br>
                    
                    <label for="status">Status:  </label> <br>
                    <select name="status" id="status" value="{{ $book->status }}">
                        <option value="available">available</option>
                        <option value="unavailable">unavailable</option>
                    </select>  <br>
                    <button type="submit" class="btn btn-outline-success">Edit</button>
                </form>
                
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <ul>
                            <li class="text-danger">{{ $error }}</li>
                        </ul>
                    @endforeach
                @endif

            </div>
        </div>
    </div>
</div>    
@endsection