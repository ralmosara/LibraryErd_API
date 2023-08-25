<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\CreateBookRequest;
use App\Http\Requests\Book\UpdateBookRequest;
use App\Http\Resources\Book\BookResource;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api']);
    }

    public function index(): AnonymousResourceCollection 
    {
        $books = Book::useFilters()->dynamicPaginate();

        return BookResource::collection($books);
    }

    public function store(CreateBookRequest $request): JsonResponse
    {
        $book = Book::create($request->all());

        return $this->responseCreated('Book created successfully', new BookResource($book));
    }

    public function show(Book $book): JsonResponse
    {
        return $this->responseSuccess(null, new BookResource($book));
    }

    public function update(UpdateBookRequest $request, Book $book): JsonResponse
    {
        $book->update($request->all());

        return $this->responseSuccess('Book updated Successfully', new BookResource($book));
    }

    public function destroy(Book $book): JsonResponse
    {
        $book->delete();

        return $this->responseDeleted();
    }

    public function restore($id): JsonResponse
    {
        $book = Book::onlyTrashed()->findOrFail($id);

        $book->restore();

        return $this->responseSuccess('Book restored Successfully.');
    }

    public function permanentDelete($id): JsonResponse
    {
        $book = Book::withTrashed()->findOrFail($id);

        $book->forceDelete();

        return $this->responseDeleted();
    }

}
