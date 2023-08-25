<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Member_status\CreateMember_statusRequest;
use App\Http\Requests\Member_status\UpdateMember_statusRequest;
use App\Http\Resources\Member_status\Member_statusResource;
use App\Models\Member_status;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Request;

class Member_statusController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api']);
    }

    public function index(): AnonymousResourceCollection 
    {
        $member_statuses = Member_status::useFilters()->dynamicPaginate();

        return Member_statusResource::collection($member_statuses);
    }

    public function store(CreateMember_statusRequest $request): JsonResponse
    {
        $member_status = Member_status::create($request->all());

        return $this->responseCreated('Member_status created successfully', new Member_statusResource($member_status));
    }

    public function show(Member_status $member_status): JsonResponse
    {
        return $this->responseSuccess(null, new Member_statusResource($member_status));
    }

    public function update(UpdateMember_statusRequest $request, Member_status $member_status): JsonResponse
    {
        $member_status->update($request->all());

        return $this->responseSuccess('Member_status updated Successfully', new Member_statusResource($member_status));
    }

    public function destroy(Member_status $member_status): JsonResponse
    {
        $member_status->delete();

        return $this->responseDeleted();
    }

    public function restore($id): JsonResponse
    {
        $member_status = Member_status::onlyTrashed()->findOrFail($id);

        $member_status->restore();

        return $this->responseSuccess('Member_status restored Successfully.');
    }

    public function permanentDelete($id): JsonResponse
    {
        $member_status = Member_status::withTrashed()->findOrFail($id);

        $member_status->forceDelete();

        return $this->responseDeleted();
    }

}
