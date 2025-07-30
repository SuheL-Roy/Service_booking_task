<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ServiceController extends Controller
{
    public function list_services(Request $request)
    {
        return Service::where('status', true)->get();
    }

    public function store_service(ServiceRequest $request)
    {

        $service = Service::create($request->validated());

        return response()->json([
            'message' => 'Service stored successfully.',
            'data'    => new ServiceResource($service),
        ], 201);
    }

    public function update_service(ServiceRequest $request, $id)
    {
        try {
            $service = Service::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Service not found.',
            ], 404);
        }

        $service->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Service updated successfully.',
            'data'    => new ServiceResource($service),
        ], 200);
    }





    public function destroy_service($id)
    {
        try {
            $service = Service::findOrFail($id);
            $service->delete();

            return response()->json([
                'success' => true,
                'message' => 'Service deleted successfully.',
                'data'    => new ServiceResource($service),
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Service not found.',
                'error'   => $e->getMessage(),
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete service.',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
