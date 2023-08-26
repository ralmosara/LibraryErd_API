<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Fine_payment\CreateFine_paymentRequest;
use App\Http\Requests\Fine_payment\UpdateFine_paymentRequest;
use App\Http\Resources\Fine_payment\Fine_paymentResource;
use App\Models\Fine_payment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Request;
use Essa\APIToolKit\Api\ApiResponse;


class Fine_paymentController extends Controller
{
    use ApiResponse;

    public function index(): AnonymousResourceCollection 
    {
        $fine_payments = Fine_payment::useFilters()->dynamicPaginate();

        return Fine_paymentResource::collection($fine_payments);
    }

    public function store(CreateFine_paymentRequest $request): JsonResponse
    {
        $fine_payment = Fine_payment::create($request->all());

        return $this->responseCreated('Fine_payment created successfully', new Fine_paymentResource($fine_payment));
    }

    public function show(Fine_payment $fine_payment): JsonResponse
    {
        return $this->responseSuccess(null, new Fine_paymentResource($fine_payment));
    }

    public function update(UpdateFine_paymentRequest $request, Fine_payment $fine_payment): JsonResponse
    {
        $fine_payment->update($request->all());

        return $this->responseSuccess('Fine_payment updated Successfully', new Fine_paymentResource($fine_payment));
    }

    public function destroy(Fine_payment $fine_payment): JsonResponse
    {
        $fine_payment->delete();

        return $this->responseDeleted();
    }

    public function restore($id): JsonResponse
    {
        $fine_payment = Fine_payment::onlyTrashed()->findOrFail($id);

        $fine_payment->restore();

        return $this->responseSuccess('Fine_payment restored Successfully.');
    }

    public function permanentDelete($id): JsonResponse
    {
        $fine_payment = Fine_payment::withTrashed()->findOrFail($id);

        $fine_payment->forceDelete();

        return $this->responseDeleted();
    }

}
