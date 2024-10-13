<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Sparepart;
use Illuminate\Http\Request;

class SparepartController extends Controller
{
    public function index() {
        $datas = Sparepart::all();

        return view('admin.pages.sparepart.index', ['spareparts' => $datas]);
    }

    public function create() {
        $categories = Category::all();

        return view('admin.pages.sparepart.create', compact(['categories']));
    }

    public function store(Request $request) {

        $validatedData = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'harga' => 'required'
        ]);

        Sparepart::create($validatedData);

        return redirect()->route('sparepart.index')->with('success', 'Successfully added a new sparepart');
    }

    public function edit($id) {
        $sparepart = Sparepart::find($id);
        $categories = Category::all();

        return view('admin.pages.sparepart.edit', compact(['categories', 'sparepart']));
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'harga' => 'required'
        ]);

        $data = Sparepart::find($id);
        $data->update($validatedData);

        return redirect()->route('sparepart.index')->with('success', 'Successfully update sparepart');
    }
}
