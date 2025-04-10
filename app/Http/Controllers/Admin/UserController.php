<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $title;
    protected $route;
    public function __construct() {
        $this->title = 'User';
        $this->route = 'admin.users.';
    }
    public function index()
    {
        $data['users'] = User::all();
        $data['title'] = $this->title;
        $data['route'] = $this->route;

        return view('admin.users.index', $data);
    }

    public function create()
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;

        return view('admin.users.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

         

        return redirect()->route('admin.users.index')->with('success', 'User created successfully');
    }

    public function edit($id)
    {
        $data['item'] = User::find($id);
        $data['title'] = $this->title;
        $data['route'] = $this->route;

        return view('admin.users.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id,
            'password' => 'nullable',
            'confirm_password' => 'nullable|same:password'
        ]);

        // Alternative method to update the user
        // $user = User::find($id);
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        // $user->save();

        // Create method to update the user
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('admin.users.index');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('admin.users.index');
    }
}
