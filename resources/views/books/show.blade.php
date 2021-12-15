@extends('layouts.app')

@section('content')
    <div class="container">

            <h4 class="text-dark"> {{ $book->title }} </h4> <br>
            @foreach ($book->authors as $author)
                <span>author: {{ $author->name }}</span> <br>
            @endforeach
            <span>Release year: {{ $book->release_year }}</span>

            @if ($book->status == 'available')
                <p class="text-success">status: {{ $book->status }}</p>
            @else
                <p class="text-danger">status: {{ $book->status }}</p>
            @endif  
          
            <div class="d-flex">

                <a href="/books/{{ $book->id }}/edit" class="btn btn-outline-success">Edit</a>
                    
                <form action="/books/{{ $book->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
        
            </div>

            <hr>

    </div>
@endsection