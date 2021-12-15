@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="text-dark">Results: </h4> <br>
    <h5 class="text-dark">Books: </h4> <br>
        @forelse ($books as $book)

            <a href="books/{{ $book->id }}"> <h5 class="text-secondary"> {{ $book->title }} </h5> </a>  <br>
            <span>Author:
                @foreach ($book->authors as $author)
                    {{ $author->name }}. 
                @endforeach
            </span> <br>
            <span>Release year: {{ $book->release_year }}</span>
            
            @if ($book->status == 'available')
                <p class="text-success">status: {{ $book->status }}</p>
            @else
                <p class="text-danger">status: {{ $book->status }}</p>
            @endif
            
            <hr>
        @empty
            <p>No books found :(</p>
        @endforelse

        {{-- authors --}}

        <h5 class="text-dark">Authors: </h4> <br>
            @forelse ($authors as $author)
    
            <a href="/authors/{{ $author->id }}"> <h5 class="text-secondary"> {{ $author->name }} </h5> </a>   <br>
                
            @empty
                <p>No authors found :(</p>
            @endforelse

     
        
</div>
@endsection