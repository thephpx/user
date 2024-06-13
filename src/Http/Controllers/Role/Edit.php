<?php

namespace Thephpx\User\Http\Controllers\Role;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

class Edit extends AdminController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
        
    public function __invoke(Request $request, \Thephpx\User\Models\Role $role)
    {
        $data = $this->data;

        if($request->isMethod('put'))
        {
            $request->validate(
                ['name'=>'required']
            );
            
            $record = $request->only(['name']);

            $role->fill($record)->save();
            return redirect()->route('role.index')->with('success_message','Role updated successfully!');  
            
        }

        $data['row'] = &$role;

        return view('User::tablerui.role.edit', compact('data'));
    }
}