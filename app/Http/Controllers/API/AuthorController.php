<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Author\CreateAuthorRequest;
use App\Http\Requests\Author\UpdateAuthorRequest;
use App\Http\Resources\Author\AuthorResource;
use App\Models\Author;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api']);
    }

    public function index(): AnonymousResourceCollection 
    {
        $authors = Author::useFilters()->dynamicPaginate();

        return AuthorResource::collection($authors);
    }

    public function store(CreateAuthorRequest $request): JsonResponse
    {
        $author = Author::create($request->all());

        return $this->responseCreated('Author created successfully', new AuthorResource($author));
    }

    public function show(Author $author): JsonResponse
    {
        return $this->responseSuccess(null, new AuthorResource($author));
    }

    public function update(UpdateAuthorRequest $request, Author $author): JsonResponse
    {
        $author->update($request->all());

        return $this->responseSuccess('Author updated Successfully', new AuthorResource($author));
    }

    public function destroy(Author $author): JsonResponse
    {
        $author->delete();

        return $this->responseDeleted();
    }

    public function restore($id): JsonResponse
    {
        $author = Author::onlyTrashed()->findOrFail($id);

        $author->restore();

        return $this->responseSuccess('Author restored Successfully.');
    }

    public function permanentDelete($id): JsonResponse
    {
        $author = Author::withTrashed()->findOrFail($id);

        $author->forceDelete();

        return $this->responseDeleted();
    }

}
