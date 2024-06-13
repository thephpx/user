<?php

namespace Thephpx\User\Http\Controllers\Permission;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

class Edit extends AdminController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
        
    public function __invoke(Request $request, \Thephpx\User\Models\Permission $permission)
    {
        $data = $this->data;

        if($request->isMethod('put'))
        {
            $request->validate(
                ['name'=>'required']
            );
            
            $record = $request->only(['name']);

            $permission->fill($record)->save();
            return redirect()->route('permission.index')->with('success_message','Permission updated successfully!');  
            
        }

        $data['row'] = &$permission;

        return view('User::tablerui.permission.edit', compact('data'));
    }
}