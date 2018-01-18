<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
            $password = $str;
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
            session()->flash('danger', 'Sorry problem occured while creating this user.');
            return redirect()->route('users.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user) // Here we implement Route model binding
    {
        return view('manage.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('manage.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        //Here we validate the request data
        $this->validate(request(), [
            'name' => 'required|max:255',
            // 'email' => 'required|email|unique:users,email'.$id,
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)]
        ]);

        //Here we parsed request data and implement buissnes logic
        //Here update user and we check to see if we autogenerate new password elsif we select 'manual'
        $user->name = request('name');
        $user->email = request('email');
        if (request('password_options') == 'auto') {
            //Set the manual password - Here we write the code to manually set password
            $lenght = 10;
            $keyspace = '123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
            $str = '';
            $max = mb_strlen($keyspace, '8bit')-1;
            for ($i = 0; $i < $lenght; ++$i) {
                $str.= $keyspace[random_int(0, $max)];
            }
            $user->password = bcrypt($str);
            //Check to see if we select manual radio button
        } elseif (request('password_options') == 'manual') {
            $user->password = bcrypt(request('password'));
        }

        //Here we create response
        if ($user->save()) {
            return redirect()->route('users.show', $user->id);
        } else {
            session()->flash('error', 'There was a problem saving updated user info to the database. Try again later.');
            return redirect()->route('users.edit', $user->id);
        }
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
