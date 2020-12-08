<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('Users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'username' => 'required',
            'birthdate' => 'required'
        ]);

        $user = new User([
            'login' => $request->get('login'),
            'username' => $request->get('username'),
            'surname' => $request->get('surname'),
            'birthdate' => $request->get('birthdate'),
            'email' => $request->get('email'),
            'address' => $request->get('address'),
        ]);

        $user->save();

        return redirect('/user')->with('success', 'Пользователь добавлен!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'login' => 'required',
            'username' => 'required',
            'birthdate' => 'required'
        ]);

        $user = User::find($id);
        $user->login = $request->get('login');
        $user->username = $request->get('username');
        $user->surname = $request->get('surname');
        $user->birthdate = $request->get('birthdate');
        $user->email = $request->get('email');
        $user->address = $request->get('address');

        $user->save();

        return redirect('/user')->with('success', 'Пользователь обновлён!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/user')->with('success', 'Пользователь удалён');
    }
}
