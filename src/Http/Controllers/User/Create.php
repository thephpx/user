<?php

namespace Thephpx\User\Http\Controllers\User;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

class Create extends AdminController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
        
    public function __invoke(Request $request)
    {
        $data = $this->data;

        if($request->isMethod('post'))
        {
            $request->validate([
                'first_name'=>'required',
                'last_name'=>'required',
                'phone'=>'required',
                'email'=>'required',
                'password'=>'required|confirmed',
            ]);

            $record = $request->only(['first_name','last_name','phone','email','password']);

            if(!empty($record['password'])){
                $record['password'] = \Hash::make($record['password']);
            } else {
                $record['password'] = $record['first_name'].date("Y");
            }

            \Facades\Thephpx\User\Models\User::create($record);     
            return redirect()->route('user.index')->with('success_message','User created successfully!');       
        }

        return view('User::tablerui.user.create', compact('data'));
    }
}