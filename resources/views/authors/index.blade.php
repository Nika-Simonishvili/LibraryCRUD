@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="text-dark">Authors: </h4> <br>
        @forelse ($authors as $author)
            <a href="/authors/{{ $author->id }}"> <h5 class="text-secondary"> {{ $author->name }} </h5> </a>   
            <hr>
        @empty
            <p>No Authors yet :(</p>
        @endforelse

        {{ $authors->links() }}
        
</div>
@endsection