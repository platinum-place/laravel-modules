<?php

namespace Modules\Auth\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Auth\app\Http\Requests\StoreUserRequest;
use Modules\Auth\app\Http\Requests\UpdateUserRequest;
use Modules\Auth\app\Http\Resources\UserResource;
use Modules\Auth\app\Services\UserService;

class UserController extends Controller
{
    protected UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $records = $this->service->all();

        return UserResource::collection($records);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $record = $this->service->store($request->validated());

        return new UserResource($record);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $record = $this->service->getById($id);

        return new UserResource($record);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $record = $this->service->update($id, $request->validated());

        return new UserResource($record);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->service->destroy($id);

        return response()->noContent();
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore(string $id)
    {
        $record = $this->service->restore($id);

        return new UserResource($record);
    }
}
