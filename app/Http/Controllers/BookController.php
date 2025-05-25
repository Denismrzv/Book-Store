<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Services\BookService;
use Illuminate\Support\Facades\Request;

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
        return view('index',compact('books'));
    }
    
    public function store(StoreBookRequest $request)
    {
        $request->validated();
        $book = $this->service->storeBook($request);
        return response()->json($book);
       
    }

    public function show(Book $book)
    {
        return view('show',compact('book'));
    }
    

    public function update(UpdateBookRequest $request, Book $book)
    {
        $request->validated();
        return response()->json($request->all());
        $updatedBook = $this->service->updateBook($request,$book);
        return response()->json($updatedBook);
    }

    public function delete(Request $request)
    {
        $ids = $request->input('ids',[]);
        if(!$ids){
            return response()->json('error','Не выбраны книги для удаления');
        }
        Book::destroy($ids);
        return response()->json('deleted');
    }
}
