<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Request;
use Essa\APIToolKit\Api\ApiResponse;


class CategoryController extends Controller
{
    use ApiResponse;

    public function index(): AnonymousResourceCollection 
    {
        $categories = Category::useFilters()->dynamicPaginate();

        return CategoryResource::collection($categories);
    }

    public function store(CreateCategoryRequest $request): JsonResponse
    {
        $category = Category::create($request->all());

        return $this->responseCreated('Category created successfully', new CategoryResource($category));
    }

    public function show(Category $category): JsonResponse
    {
        return $this->responseSuccess(null, new CategoryResource($category));
    }

    public function update(UpdateCategoryRequest $request, Category $category): JsonResponse
    {
        $category->update($request->all());

        return $this->responseSuccess('Category updated Successfully', new CategoryResource($category));
    }

    public function destroy(Category $category): JsonResponse
    {
        $category->delete();

        return $this->responseDeleted();
    }

    public function restore($id): JsonResponse
    {
        $category = Category::onlyTrashed()->findOrFail($id);

        $category->restore();

        return $this->responseSuccess('Category restored Successfully.');
    }

    public function permanentDelete($id): JsonResponse
    {
        $category = Category::withTrashed()->findOrFail($id);

        $category->forceDelete();

        return $this->responseDeleted();
    }

}
