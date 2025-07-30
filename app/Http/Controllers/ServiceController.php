<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function list_services(Request $request)
    {
          return Service::where('status', true)->get();
    }

    public function store_service(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'status' => 'boolean',
        ]);

        $service =  Service::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Service created successfully.',
            'data' => $service
        ], 201);
    }

    public function update_service(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'string',
            'description' => 'nullable',
            'price' => 'numeric',
        ]);



        $service = Service::findOrFail($id);
        $service->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Service updated successfully.',
            'data' => $service
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
                'data' => $service
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Service not found.',
                'error' => $e->getMessage()
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete service.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
