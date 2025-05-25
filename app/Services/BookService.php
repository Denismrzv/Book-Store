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

    public function updateBook(UpdateBookRequest $request, Book $book)
    {
        $data = array_filter([
            'title' => $request->input('title'),
            'genre_id' => $request->input('genre_id'),
            'autor_id' => $request->input('autor_id')
        ],fn($value)=>!is_null($value));

        if($request->content!==null)
        {
            $data['content'] = $request->file('content')->store('book/pdfs','public');
        }
        elseif($request->cover!==null)
        {
            $data['cover'] = $request->file('cover')->store('book/covers','public');
        }
        return $book->update($data);
    }
} 