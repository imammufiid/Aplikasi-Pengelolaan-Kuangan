<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\UserModel;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        // lakukan cek dahulu, user harus level admin
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'User';

        //-- no serverside datatable
        $user = UserModel::all();
        //--

        return view('user.index', compact('title', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah User';
        return view('user.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validasi = Validator::make($data, [
            'name'     => 'required|max:255',
            'email'    => 'required|email|max:100|unique:users',
            'password' => 'required|confirmed|min:6',
            'role'     => 'required|in:user,admin',
            'status'   => 'required|in:1,0'
        ]);

        if ($validasi->fails()) {
            return redirect('users/create')
                    ->withInput()
                    ->withErrors($validasi);
        }

        // Hash password.
        $data['password'] = bcrypt($data['password']);

        User::create($data);
        return redirect()
                ->route('users.index')
                ->with('success','User berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return UserModel::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(UserModel $user)
    {
        $title = 'Edit User';
        // $user = UserModel::all();
        return view('user.edit', compact('title', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $user = User::findOrFail($id);
        // dd($request);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'role' => 'required|in:admin,user',
            'status' => 'required|in:1,0',
        ]);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors($validator);
        } else {
            $user->update($request->all());
            return redirect()
                ->route('users.index')
                ->with('success', 'User Berhasil Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserModel $user)
    {
        $user->delete();
        return redirect()
            ->route('users.index')
            ->with('success', 'User berhasil dihapus');
    }
}
