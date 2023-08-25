<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book_author\CreateBook_authorRequest;
use App\Http\Requests\Book_author\UpdateBook_authorRequest;
use App\Http\Resources\Book_author\Book_authorResource;
use App\Models\Book_author;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Request;

class Book_authorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api']);
    }

    public function index(): AnonymousResourceCollection 
    {
        $book_authors = Book_author::useFilters()->dynamicPaginate();

        return Book_authorResource::collection($book_authors);
    }

    public function store(CreateBook_authorRequest $request): JsonResponse
    {
        $book_author = Book_author::create($request->all());

        return $this->responseCreated('Book_author created successfully', new Book_authorResource($book_author));
    }

    public function show(Book_author $book_author): JsonResponse
    {
        return $this->responseSuccess(null, new Book_authorResource($book_author));
    }

    public function update(UpdateBook_authorRequest $request, Book_author $book_author): JsonResponse
    {
        $book_author->update($request->all());

        return $this->responseSuccess('Book_author updated Successfully', new Book_authorResource($book_author));
    }

    public function destroy(Book_author $book_author): JsonResponse
    {
        $book_author->delete();

        return $this->responseDeleted();
    }

    public function restore($id): JsonResponse
    {
        $book_author = Book_author::onlyTrashed()->findOrFail($id);

        $book_author->restore();

        return $this->responseSuccess('Book_author restored Successfully.');
    }

    public function permanentDelete($id): JsonResponse
    {
        $book_author = Book_author::withTrashed()->findOrFail($id);

        $book_author->forceDelete();

        return $this->responseDeleted();
    }

}
