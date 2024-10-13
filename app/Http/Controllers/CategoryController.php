<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator as FacadesValidator;


class CategoryController extends Controller
{
    public function index() {
        $categories = DB::table('projects')->rightJoin('categories', 'categories.id', '=', 'projects.category_id')->selectRaw('count(projects.category_id) as jumlah, categories.name, categories.id')->groupBy('category_id', 'name', 'id')->orderBy('categories.id', 'asc')->get();

        return view('admin.pages.kategori.index', compact('categories'));
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'name' => 'required|unique:categories,name'
        ]);

        if(session()->has('errors') != true) {
            Category::create($validateData);
    
            return redirect()->route('category.index')->with('success', 'Successfully added a new category');
        } else {
            return redirect()->route('category.index')->withErrors('errors')->withInput();
        }

    }

    public function destroy($id) {
        $data = Category::find($id);
        $datas = Project::where('category_id', $id)->get();

        if ($datas->isNotEmpty() == true) {
            $datas->toQuery()->update([
                'category_id' => 1
            ]);

            $data->delete();
        } else {
            $data->delete();
        }

        return redirect()->route('category.index')->with('success', 'Successfully deleted data');
    }
}
