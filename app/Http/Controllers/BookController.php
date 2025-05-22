<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Services\BookService;


class BookController extends Controller
{
    protected $service;

    public function __construct(BookService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $books = Book::all();
        return response()->json($books);
    }
    
    public function store(StoreBookRequest $request)
    {
        $request->validated();
        $book = $this->service->storeBook($request);
        return response()->json($book);
       
    }

    public function update(UpdateBookRequest $request, Book $id)
    {
        return response()->json($id);
        $request->validated();
        $updatedBook = $this->service->updateBook($request,$id);
        return response()->json($updatedBook);
    }
}
