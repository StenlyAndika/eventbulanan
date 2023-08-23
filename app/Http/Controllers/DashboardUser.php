<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DashboardUser extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.user.index', [
            'title' => 'Data User',
            'user' => User::alluser()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.user.create', [
            'title' => 'Tambah User'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'username' => 'required|unique:user',
            'password' => 'required',
            'nama' => 'required'
        ];

        $validatedData = $request->validate($rules);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('admin.user.index')->with('success', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('dashboard.user.profil', [
            'title' => 'Profil Admin'
        ], compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.user.edit', [
            'title' => 'Edit User'
        ], compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'password' => 'required',
            'nama' => 'required'
        ];

        if ($request->username != auth()->user()->username) {
            $rules['username'] = 'required|unique:user';
        }

        $validatedData = $request->validate($rules);

        if($validatedData['password'] != auth()->user()->password) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }
        
        User::where('id', $user->id)->update($validatedData);

        return redirect()->route('admin.user.index')->with('success', 'Data berhasil diupdate!');
    }

    public function updateroot(Request $request, User $user)
    {
        $rules = [
            'password' => 'required',
            'nama' => 'required'
        ];

        if ($request->username != $user->username) {
            $rules['username'] = 'required|unique:user';
        }

        $validatedData = $request->validate($rules);

        if($validatedData['password'] != $user->password) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }
        
        User::where('id', $user->id)->update($validatedData);

        return redirect()->route('admin.user.index')->with('success', 'Data berhasil diupdate!');
    }

    public function set_admin(User $user)
    {
        if($user->is_admin == 1) {
            $data = [
                'is_admin' => '0',
            ];
        } else {
            $data = [
                'is_admin' => '1',
            ];
        }
    
        User::where('id', $user->id)->update($data);

        return redirect()->route('admin.user.index')->with('toast_success', 'Data berhasil diupdate!');
    }

    public function set_root(User $user)
    {
        if($user->is_root == 1) {
            $data = [
                'is_root' => '0',
            ];
        } else {
            $data = [
                'is_root' => '1',
            ];
        }
    
        User::where('id', $user->id)->update($data);

        return redirect()->route('admin.user.index')->with('toast_success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Request $request)
    {
        User::destroy($user->id);
        if(auth()->user()->username == $user->username) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('home')->with('success','Data berhasil dihapus!');
        } else {
            return redirect()->route('admin.user.index')->with('success','Data berhasil dihapus!');
        }
    }
}
