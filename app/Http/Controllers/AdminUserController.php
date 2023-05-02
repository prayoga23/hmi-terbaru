<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Validator;
use Session;
use Illuminate\Support\Facades\Hash;

use App\User;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::get();
        return view('admin.management', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.management_tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            // dd($validator->errors());
            return redirect()->route("admin.management.create")->with('danger', $validator->errors()->first());
        }
        $user = new User();
        $user->name = $request->name;
        $user->last_name = ($request->has('last_name')) ? $request->last_name : "";
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route("admin.management.index")->with('success', 'Userberhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        $user = User::where('id', $user_id)->firstOrFail();
        // dd($id);

        return view('admin.management_edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
        ]);
        if ($validator->fails()) {
            // dd($validator->errors());
            return redirect()->route("admin.management.edit", $user_id)->with('danger', $validator->errors()->first());
        }
        $user = User::where('id', $user_id)->firstOrFail();
        $user->name = $request->name;
        $user->last_name = "";
        $user->email = $request->email;
        if ($request->has('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->route("admin.management.index")->with('success', 'User berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route("admin.management.index")->with('success', 'Kategori berhasil dihapus');
    }
}
