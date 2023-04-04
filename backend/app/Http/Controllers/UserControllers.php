<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;


class UserControllers extends Controller
{

    // * @param  Request  $request
    // * @return Response
    public function show($id)
    {
        $user = User::findOrFail($id);

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
        ]);
    }


    public function register(Request $request){
        $user = new User();
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->email=$request->email;
        $user->password=$request->password;

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|min:5',
            'password' => 'required|min:5',
        ]);


        if ($validator->fails()) {
            return redirect()->route('error')
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
            $user->save();
        }

        

    }
}