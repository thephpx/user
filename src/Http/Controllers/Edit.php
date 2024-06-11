<?php

namespace Thephpx\User\Http\Controllers;

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
                'phone'=>'required',
                'email'=>'required'
            ]);

            $record = $request->only(['first_name','last_name','phone','email','password']);

            if(!empty($record['password'])){
                $record['password'] = \Hash::make($record['password']);
            } else {
                unset($record['password']);
            }

            $user->fill($record)->save();            
        }

        return view('User::tablerui.edit', compact('data'));
    }
}