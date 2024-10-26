<?php

namespace Modules\Authentication\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Authentication\app\Http\Requests\Client\StoreClientRequest;
use Modules\Authentication\app\Http\Requests\Client\UpdateClientRequest;
use Modules\Authentication\app\Http\Resources\ClientResource;
use Modules\Authentication\app\Services\ClientService;

class ClientController extends Controller
{
    protected ClientService $service;

    public function __construct(ClientService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $records = $this->service->all();

        return ClientResource::collection($records);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        $record = $this->service->store($request->validated());

        return new ClientResource($record);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $record = $this->service->getById($id);

        return new ClientResource($record);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, string $id)
    {
        $record = $this->service->update($id, $request->validated());

        return new ClientResource($record);
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

        return new ClientResource($record);
    }
}
