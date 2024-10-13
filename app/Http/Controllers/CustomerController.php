<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Project::latest();
            return view('customer');
    }

    public function show(Project $project) {
        return view('customer_project', compact(['project']));
    }

    public function search(Request $request) {
        $code = $request->code_project;
        return redirect()->route('service.show', $code);
    }

}
