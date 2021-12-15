<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    public function index()
    {
        $authors = Author::orderBy('created_at', 'desc')->with('books')->paginate(5);

        return view('authors.index', [
            'authors' => $authors
        ]);
    }

    public function show($id)
    {
        $author = Author::find($id);
        return view('authors.show')->with('author', $author);
    }
}
