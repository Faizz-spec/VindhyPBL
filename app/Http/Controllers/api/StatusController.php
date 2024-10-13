<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Status::all();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil didapatkan',
            'data' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Status();

        $rules = [
            'name' => 'required|unique:categories,name'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memasukkan data',
                'data' => $validator->errors()
            ], 400);
        }

        $data->name = $request->name;

        $data->save();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil menambahkan data'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Status::find($id);
        
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
        $data = Status::find($id);

        if(empty($data)) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal melakukan update, data tidak ada'
            ], 404);
        }

        $rules = [
            "name" => "required",

        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memasukkan update',
                'data' => $validator->errors()
            ], 400);
        }

        $data->name = $request->name;

        $data->save();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diubah'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Status::find($id);

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
        ], 200);
    }
}
