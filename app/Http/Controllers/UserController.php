<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;


class UserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }
    // retrieve all the users
    public function fetchAll ()
    {
        $users = User::all();
        return $users;

    }
    // retreive one user by id
    public function fetchOne ( Request $request, $id )
    {
        $user = User::findOrFail( $id );
        return $user;
    }
    // update a users name
    public function updateUserName ( Request $request, $id )
    {
        $user = User::findOrFail( $id );
        $user->name = $request->name;
        $user->save();
        return $user;
    }
}
