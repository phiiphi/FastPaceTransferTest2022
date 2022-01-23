<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        #fetch user
        $admUser = User::where('user_type', 'Admin')->first();
        $admin = $admUser->user_type;

        #check if user is an admin or student
        if ($admin !== $request->user()->user_type) {
            return $response = [
                'message' => 'Unauthorised User, Contact Admin',
            ];
        }

        return $admUser = User::where('user_type', 'Admin')->first();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
       #fetch data
        $admUser = User::where('name', 'Super Admin')->first();
        $admin = $admUser->name;

        #check if user is a super admin
        if ($admin !== $request->user()->name) {
            return $response = [
                'message' =>
                    'Unauthorized to delete User, Contact: Super Admin',
            ];
        }
        #validate user input feild
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string',
            'phone' => 'required|string',
            'user_type' => 'required|string',
        ]);

        #insert user to database
        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'phone' => $fields['phone'],
            'user_type' => $fields['user_type'],
        ]);

        #send feeback to user if successful
        return response($user, 201);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         #fetch data
        $admUser = User::where('name', 'Super Admin')->first();
        $admin = $admUser->name;

        #check if user is a super admin
        if ($admin !== $request->user()->name) {
            return $response = [
                'message' =>
                    'Unauthorized to delete User, Contact: Super Admin',
            ];
        }
        $question = Question::find($id);
        $question->update($request->all());
        return $question;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        #fetch data
        $admUser = User::where('name', 'Super Admin')->first();
        $admin = $admUser->name;

        #check if user is an super admin
        if ($admin !== $request->user()->name) {
            return $response = [
                'message' =>
                    'Unauthorized to delete User, Contact: Super Admin',
            ];
        }
        User::destroy($id);

        return response([
            'message' => 'User Deleted Successfully',
        ]);
    }
}
