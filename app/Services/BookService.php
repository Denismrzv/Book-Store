<?php

namespace App\Services;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;

class BookService 
{
    public function storeBook(StoreBookRequest $request)
    {

        $urlContent = $request->file('content')->store('book/pdfs','public');
        $urlCover = $request->file('cover')->store('book/covers','public');

        return Book::create([
            'title'=> $request->title,
            'content'=> $urlContent,
            'cover'=> $urlCover,
            'genre_id'=>$request->genre_id,
            'autor_id'=>$request->autor_id,
        ]);
    }
    public function updateBook(UpdateBookRequest $request,$id)
    {

    }
} 