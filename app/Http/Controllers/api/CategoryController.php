<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::all();

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
        $data = new Category();

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
        $data = Category::find($id);
        
        if($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data ditemukan',
                'data' => $data
            ], 201);
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
        $data = Category::find($id);

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
                'message' => 'Gagal melakukkan update',
                'data' => $validator->errors()
            ], 400);
        }

        $data->name = $request->name;

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
        $data = Category::find($id);

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
