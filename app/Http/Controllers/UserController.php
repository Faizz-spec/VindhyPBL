<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = User::all();

        return view('admin.pages.user.index', compact(['datas']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = ['super', 'admin'];
        return view('admin.pages.user.create', compact(['roles']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:'.User::class,
            'password' => 'required',
            'role' => 'required'
        ]);

        User::create($validatedData);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        $roles = ['super', 'admin'];

        return view('admin.pages.user.show', compact(['user', 'roles']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
