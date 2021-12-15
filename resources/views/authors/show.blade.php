@extends('layouts.app')

@section('content')
    <div class="container">

            <h4 class="text-dark"> {{ $author->name }} </h4> <br>
            @forelse ($author->books as $book)
                <ul>
                    <a href="/books/{{ $book->id }}"> <li class="link-secondary">{{ $book->title }}</li> </a>
                </ul>
            @empty
                <p>No authors found :(</p>
            @endforelse

            <hr>

    </div>
@endsection