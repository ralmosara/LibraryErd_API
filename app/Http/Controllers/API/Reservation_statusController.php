<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reservation_status\CreateReservation_statusRequest;
use App\Http\Requests\Reservation_status\UpdateReservation_statusRequest;
use App\Http\Resources\Reservation_status\Reservation_statusResource;
use App\Models\Reservation_status;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Request;
use Essa\APIToolKit\Api\ApiResponse;


class Reservation_statusController extends Controller
{
    use ApiResponse;
    
    public function index(): AnonymousResourceCollection 
    {
        $reservation_statuses = Reservation_status::useFilters()->dynamicPaginate();

        return Reservation_statusResource::collection($reservation_statuses);
    }

    public function store(CreateReservation_statusRequest $request): JsonResponse
    {
        $reservation_status = Reservation_status::create($request->all());

        return $this->responseCreated('Reservation_status created successfully', new Reservation_statusResource($reservation_status));
    }

    public function show(Reservation_status $reservation_status): JsonResponse
    {
        return $this->responseSuccess(null, new Reservation_statusResource($reservation_status));
    }

    public function update(UpdateReservation_statusRequest $request, Reservation_status $reservation_status): JsonResponse
    {
        $reservation_status->update($request->all());

        return $this->responseSuccess('Reservation_status updated Successfully', new Reservation_statusResource($reservation_status));
    }

    public function destroy(Reservation_status $reservation_status): JsonResponse
    {
        $reservation_status->delete();

        return $this->responseDeleted();
    }

    public function restore($id): JsonResponse
    {
        $reservation_status = Reservation_status::onlyTrashed()->findOrFail($id);

        $reservation_status->restore();

        return $this->responseSuccess('Reservation_status restored Successfully.');
    }

    public function permanentDelete($id): JsonResponse
    {
        $reservation_status = Reservation_status::withTrashed()->findOrFail($id);

        $reservation_status->forceDelete();

        return $this->responseDeleted();
    }

}
