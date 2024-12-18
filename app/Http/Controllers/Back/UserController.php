<?php

namespace App\Http\Controllers\Back;

use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index(){
        $user = Auth::user();
        if($user->role == 1){
            $users = User::get();
        } else {
            $users = User::whereId($user->id)->get();
        }
        return view('back.user.index', [
            'users' => $users
        ]);
    }

    public function store(UserRequest $request){
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        User::create($data);

        return back()->with('Success', 'User created successfully');
    }

    public function destroy($id){
        User::find($id)->delete();
        return back()->with('Success', 'User deleted successfully');
    }

    public function update(UpdateUserRequest $request, string $id){
        $data = $request->validated();
        if($data['password'] != ''){
            $data['password'] = bcrypt($data['password']);
            User::find($id)->update($data);
        } else {
            User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
        }

        return back()->with('Success', 'User updated successfully');
    }
}
