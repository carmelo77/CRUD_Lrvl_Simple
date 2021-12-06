<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class Usercontroller extends Controller
{
    public function index()
    {
        $user = User::paginate(8);

        return view('dashboard.user.index',compact('user'));
    }

    public function store(Request $request) 
    {
        $this->validate(request(), [
            'name' => 'required| max: 100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'password_confirm' => 'required_with:password|same:password|min:8',
            'phone' => 'min:10',
            'number_personal_document' => 'required|max:11',
            'date_birth' => 'required|date|before:-18 years',
            'city_code' => 'required|integer',
            'role' => 'required'
        ]);

        $data = [
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'phone' => $request->phone,
            'number_personal_document' => $request->number_personal_document,
            'date_birth' => $request->date_birth,
            'city_code' => $request->city_code,
            'role' => $request->role,
        ];

        User::create($data);

        return redirect()->route('users.index')
            ->with('success','User created successfully');
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
    
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }

    public function edit($id)
    {   
        $user = User::find($id);
    
        return view('dashboard.user.edit',compact('user'));
    }

    public function update(Request $request, $id) {

        $this->validate(request(), [
            'name' => 'required| max: 100',
            //'email' => 'required|email|unique:users,email,' . $id,
            'password_confirm' => 'same:password',
            'phone' => 'min:10',
            //'number_personal_document' => 'required|max:11',
            'date_birth' => 'required|date|before:-18 years',
            'city_code' => 'required|integer',
            'role' => 'required'
        ]);

        $user = User::find($id);

        $data = [
           // 'email' => $request->email,
            'password' => $request->password != '' ? Hash::make($request->password) : $user->password,
            'name' => $request->name,
            'phone' => $request->phone,
            //'number_personal_document' => $request->number_personal_document,
            'date_birth' => $request->date_birth,
            'city_code' => $request->city_code,
            'role' => $request->role,
        ];

        $user = User::find($id);

        $user->update($data);

        return redirect()->route('users.index')
            ->with('success','User created successfully');
    }

    public function search(Request $request) 
    {
        if($request->option == 1) {
            $user = User::where('name', 'like', '%' . $request->search . '%')->paginate(8);
        }

        if($request->option == 2) {
            $user = User::where('email', 'like', '%' . $request->search . '%')->paginate(8);
        }

        if($request->option == 3) {
            $user = User::where('number_personal_document', 'like', '%' . $request->search . '%')->paginate(8);
        }

        if($request->option == 4) {
            $user = User::where('phone', 'like', '%' . $request->search . '%')->paginate(8);
        }

        return view('dashboard.user.index',compact('user'))
            ->with('success','User created successfully');;
    }
}
