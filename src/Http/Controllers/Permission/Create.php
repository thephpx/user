<?php

namespace Thephpx\User\Http\Controllers\Permission;

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
            $request->validate(
                ['name'=>'required']
            );

            $record = $request->only(['name']);

            \Facades\Thephpx\User\Models\Permission::create($record);      
            return redirect()->route('permission.index')->with('success_message','Permission created successfully!');        
        }

        return view('User::tablerui.permission.create', compact('data'));
    }
}