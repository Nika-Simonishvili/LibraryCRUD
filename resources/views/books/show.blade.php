@extends('layouts.app')

@section('content')
    <div class="container">
        
        <a href="/books">  <button class="btn btn-outline-secondary" style="margin-bottom: 20px">
            < Books</button> 
        </a>
        
            <h4 class="text-dark"> {{ $book->title }} </h4> <br>
            Authors:
            @foreach ($book->authors as $author)
            <a href="/authors/{{ $author->id }}" class="link-dark"> <span> {{ $author->name }}</span> </a> <br>
            @endforeach
            <span>Release year: {{ $book->release_year }}</span>

            @if ($book->status == 'available')
                <p class="text-success">Status: {{ $book->status }}</p>
            @else
                <p class="text-danger">Status: {{ $book->status }}</p>
            @endif  
          
            <div class="d-flex">

            @auth
                <a href="/books/{{ $book->id }}/edit" class="btn btn-outline-success">Edit</a>
                    
                <form action="/books/{{ $book->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
            @endauth
            </div>

            <hr>

    </div>
@endsection