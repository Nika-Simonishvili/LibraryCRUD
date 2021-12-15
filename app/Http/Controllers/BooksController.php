<?php

namespace App\Http\Controllers;

use App\Http\Requests\bookValidateRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin', ['except' => ['index', 'show', 'search']]);    
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('created_at', 'desc')->with('authors')->paginate(5);

        return view('books.index', [
            'books' => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(bookValidateRequest $request)
    {
        $request->validated();

        //  check if author already exists..
        
        $author = Author::where('name',$request->input('author_name'))->first();
        if(!$author){
            $author = Author::create([
            'name' => $request->input('author_name')
            ]);
        }
        

        $book = Book::create([
            'title' => $request->input('title'),
            'release_year' => $request->input('release_year'),
            'status' => $request->input('status')
        ]);
        
        $book->authors()->attach($author->id);

        return redirect('/books');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);

        return view('books.show')->with('book', $book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);

        return view('books.edit')->with('book', $book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(bookValidateRequest $request, $id)
    {
        $request->validated();

        // check if author already exists.....
        $author = Author::where('name',$request->input('author_name'))->first();
        if(!$author){
            $author = Author::create([
            'name' => $request->input('author_name')
            ]);
        }

        //


        $book = Book::find($id);

        $book -> update([
            'title' => $request->input('title'),
            'release_year' => $request->input('release_year'),
            'status' => $request->input('status')
        ]);

        $book->authors()->sync($author->id);

        return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::find($id)->delete();

        return redirect('books');  
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $books = Book::where('title', 'like', '%' .$search. '%')->get();
        $authors = Author::where('name', 'like', '%' .$search. '%')->get();

        return view('books.search', [
            'books' => $books,
            'authors' => $authors
        ]);

    }
}
