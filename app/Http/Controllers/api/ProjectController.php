<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectCreateRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Project::all();

        return response()->json([
           'status' => true,
            'message' => 'Data berhasil ditemu    kan',
            'data' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectCreateRequest $request)
    {
        
        $data = new Project();

        $rules = [
            "name" => "required",
            "deskripsi" => "required",
            "image" => "required",
            "status" => "required",
            "category" => "required",
            "harga" => "required",
            "customer" => "required",
            "code" => "required"

        ];

        $validator = FacadesValidator::make($request->all(), $rules);

        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memasukkan data',
                'data' => $validator->errors()
            ], 400);
        }

        $data->name = $request->name;
        $data->deskripsi = $request->deskripsi;
        $data->image = $request->image;
        $data->status_id = $request->status;
        $data->category_id = $request->category;
        $data->harga_total = $request->harga;
        $data->customer_name = $request->customer;
        $data->code_project = $request->code;

        $data->save();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil ditambahkan'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Project::find($id);
        
        if($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data ditemukan',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Project::find($id);

        if(empty($data)) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal melakukan update'
            ], 404);
        }

        $rules = [
            "name" => "required",
            "deskripsi" => "required",
            "image" => "required",
            "status" => "required",
            "category" => "required",
            "harga" => "required",
            "customer" => "required",
            "code" => "required"

        ];

        $validator = FacadesValidator::make($request->all(), $rules);

        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memasukkan update',
                'data' => $validator->errors()
            ], 400);
        }

        $data->name = $request->name;
        $data->deskripsi = $request->deskripsi;
        $data->image = $request->image;
        $data->status_id = $request->status;
        $data->category_id = $request->category;
        $data->harga_total = $request->harga;
        $data->customer_name = $request->customer;
        $data->code_project = $request->code;

        $data->save();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diubah'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Project::find($id);

        if(empty($data)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $data->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dihapus'
        ], 201);
    }
}
