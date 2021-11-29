<?php

namespace App\Http\Controllers\user;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserSettingController extends Controller
{
    public function index(){
        try {
            $users = User::all();
            return view('backend.content.user.index', compact('users'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    
    public function store(Request $request){
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password)
            ]);
            toast('User added successfully','success');
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function edit($id){
        try {
            $user = User::find($id);
            return view('backend.content.user.profile', compact('user'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function update(Request $request,$id){
        try {
            User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password)
            ]);
            toast('Update Successful','success');
            return redirect()->route('home');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function destroy($id){
        try {
            if(auth()->user()->id == $id){
                toast('You cannot delete yourself!','error');
                return redirect()->back();
            }
            User::destroy($id);
            toast('User deleted successfully','success');
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

}
