<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->get();
        return view('pages.manage-users.index',compact('data'));
    }

    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('pages.manage-users.create',compact('roles'));
    }

    public function store(Request $request)
    {
        if($request['ff']['user_id']){
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'.$request['ff']['user_id'],
                'password' => 'required',
                'roles' => 'required'
            ]);

            $input = $request->all();
            if(!empty($input['password'])){
                $input['password'] = Hash::make($input['password']);
            }else{
                $input = Arr::except($input,array('password'));
            }

            $user = User::find($request['ff']['user_id']);
            $user->update($input);
            DB::table('model_has_roles')->where('model_id',$request['ff']['user_id'])->delete();

            $user->assignRole($request->input('roles'));
        }else{
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'roles' => 'required'
            ]);

            $input = $request->all();
            $input['password'] = Hash::make($input['password']);

            $user = User::create($input);
            $user->assignRole($request->input('roles'));
        }

        session()->flash('success', 'User updated successfully!');
        session()->flash('title', 'Users');

        return response()->json([
            'data' => $user
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('pages.manage-users.create',compact('user','roles','userRole'));
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }

    public function users_delete(Request $request)
    {
        User::find($request->id)->delete();
        return response()->json(['success' => 'User deleted successfully!','title' => 'Users']);
    }
}
