<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Member\CreateMemberRequest;
use App\Http\Requests\Member\UpdateMemberRequest;
use App\Http\Resources\Member\MemberResource;
use App\Models\Member;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Request;
use Essa\APIToolKit\Api\ApiResponse;


class MemberController extends Controller
{
    use ApiResponse;

    public function index(): AnonymousResourceCollection 
    {
        $members = Member::useFilters()->dynamicPaginate();

        return MemberResource::collection($members);
    }

    public function store(CreateMemberRequest $request): JsonResponse
    {
        $member = Member::create($request->all());

        return $this->responseCreated('Member created successfully', new MemberResource($member));
    }

    public function show(Member $member): JsonResponse
    {
        return $this->responseSuccess(null, new MemberResource($member));
    }

    public function update(UpdateMemberRequest $request, Member $member): JsonResponse
    {
        $member->update($request->all());

        return $this->responseSuccess('Member updated Successfully', new MemberResource($member));
    }

    public function destroy(Member $member): JsonResponse
    {
        $member->delete();

        return $this->responseDeleted();
    }

    public function restore($id): JsonResponse
    {
        $member = Member::onlyTrashed()->findOrFail($id);

        $member->restore();

        return $this->responseSuccess('Member restored Successfully.');
    }

    public function permanentDelete($id): JsonResponse
    {
        $member = Member::withTrashed()->findOrFail($id);

        $member->forceDelete();

        return $this->responseDeleted();
    }

}
