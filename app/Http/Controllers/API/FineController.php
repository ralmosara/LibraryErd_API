<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Fine\CreateFineRequest;
use App\Http\Requests\Fine\UpdateFineRequest;
use App\Http\Resources\Fine\FineResource;
use App\Models\Fine;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Request;

class FineController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api']);
    }

    public function index(): AnonymousResourceCollection 
    {
        $fines = Fine::useFilters()->dynamicPaginate();

        return FineResource::collection($fines);
    }

    public function store(CreateFineRequest $request): JsonResponse
    {
        $fine = Fine::create($request->all());

        return $this->responseCreated('Fine created successfully', new FineResource($fine));
    }

    public function show(Fine $fine): JsonResponse
    {
        return $this->responseSuccess(null, new FineResource($fine));
    }

    public function update(UpdateFineRequest $request, Fine $fine): JsonResponse
    {
        $fine->update($request->all());

        return $this->responseSuccess('Fine updated Successfully', new FineResource($fine));
    }

    public function destroy(Fine $fine): JsonResponse
    {
        $fine->delete();

        return $this->responseDeleted();
    }

    public function restore($id): JsonResponse
    {
        $fine = Fine::onlyTrashed()->findOrFail($id);

        $fine->restore();

        return $this->responseSuccess('Fine restored Successfully.');
    }

    public function permanentDelete($id): JsonResponse
    {
        $fine = Fine::withTrashed()->findOrFail($id);

        $fine->forceDelete();

        return $this->responseDeleted();
    }

}
