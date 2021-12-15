@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h4 class="text-dark">Add new book</h4>
            <div class="card">
                <form class="form-control" method="POST" action="/books">
                    @csrf
                    <label for="author_name">Author:</label> <br>
                    <input type="text" name="author_name" placeholder="author name..."> <br>

                    <label for="title">Book's title:</label> <br>
                    <input type="text" name="title" placeholder="title..."> <br>

                    <label for="release_year">Release year:  </label> <br>
                    <input type="numeric" name="release_year" placeholder="Release year..."> <br>
                    
                    <label for="status">Status:  </label> <br>
                    <select name="status" id="status">
                        <option value="available">available</option>
                        <option value="unavailable">unavailable</option>
                    </select>  <br>

                    <button type="submit" class="btn btn-outline-primary">Submit</button>
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