<?php

namespace Thephpx\User\Http\Controllers\User;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

class Edit extends AdminController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
        
    public function __invoke(Request $request, \Thephpx\User\Models\User $user)
    {
        $data = $this->data;

        if($request->isMethod('put'))
        {
            $request->validate([
                'first_name'=>'required',
                'last_name'=>'required',
                'email'=>'required'
            ]);

            $record = $request->only(['first_name','last_name','email','password']);

            if(!empty($record['password'])){
                $record['password'] = \Hash::make($record['password']);
            } else {
                unset($record['password']);
            }

            $user->fill($record)->save(); 

            if(!empty($request->role) && auth()->user()->hasRole('admin'))
            {
                $user->assignRole($request->role);
            }

            return redirect()->route('user.index')->with('success_message','User updated successfully!');        
        }

        return view('User::tablerui.user.edit', compact('data'));
    }
}