<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Loan\CreateLoanRequest;
use App\Http\Requests\Loan\UpdateLoanRequest;
use App\Http\Resources\Loan\LoanResource;
use App\Models\Loan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api']);
    }

    public function index(): AnonymousResourceCollection 
    {
        $loans = Loan::useFilters()->dynamicPaginate();

        return LoanResource::collection($loans);
    }

    public function store(CreateLoanRequest $request): JsonResponse
    {
        $loan = Loan::create($request->all());

        return $this->responseCreated('Loan created successfully', new LoanResource($loan));
    }

    public function show(Loan $loan): JsonResponse
    {
        return $this->responseSuccess(null, new LoanResource($loan));
    }

    public function update(UpdateLoanRequest $request, Loan $loan): JsonResponse
    {
        $loan->update($request->all());

        return $this->responseSuccess('Loan updated Successfully', new LoanResource($loan));
    }

    public function destroy(Loan $loan): JsonResponse
    {
        $loan->delete();

        return $this->responseDeleted();
    }

    public function restore($id): JsonResponse
    {
        $loan = Loan::onlyTrashed()->findOrFail($id);

        $loan->restore();

        return $this->responseSuccess('Loan restored Successfully.');
    }

    public function permanentDelete($id): JsonResponse
    {
        $loan = Loan::withTrashed()->findOrFail($id);

        $loan->forceDelete();

        return $this->responseDeleted();
    }

}
