<?php

namespace App\Http\Controllers;

use App\User;
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
        $users = User::orderBy('id', 'desc')->paginate(10);
        return view('manage.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        // Here we validate our request
        $this->validate(request(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users'
        ]);

        //Here we parse our request data and imiplement buissnies logic
        //Here we check if we checked automated password and if we do this we auto generate password
        if (request()->has('password') && !empty(request('password'))) {
            $password = trim(request('password'));
        } else {
            //Set the manual password - Here we write the code to manually set password
            $lenght = 10;
            $keyspace = '123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
            $str = '';
            $max = mb_strlen($keyspace, '8bit')-1;
            for ($i = 0; $i < $lenght; ++$i) {
                $str.= $keyspace[random_int(0, $max)];
            }
            $password =  $str;
        }
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt($password)
        ]);

        //Here we create response
        if (isset($user)) {
            return redirect()->route('users.show', $user->id );
        } else {
            session()->flash('danger', 'Sorry problem occured while creating this user');
            return redirect()->route('users.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
