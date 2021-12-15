@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="text-dark">Our books: </h4> <br>
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
            <p>No books yet :(</p>
        @endforelse

        {{ $books->links() }}
        
</div>
@endsection