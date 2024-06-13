<?php

namespace Thephpx\User\Http\Controllers\Permission;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

class Remove extends AdminController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
        
    public function __invoke(Request $request, \Thephpx\User\Models\Permission $permission)
    {
        $data = $this->data;

        if($request->isMethod('delete'))
        {
            if(auth()->user()->hasRole('admin'))
            {
                $permission->forceDelete();

                return redirect()->route('permission.index')->with('success_message','Permission removed successfully!');
            }

            return redirect()->route('permission.index')->with('warning_message','Permission could not be removed, permission denined!');
        }

        return redirect()->route('permission.index')->with('warning_message','Permission could not be removed!');
    }
}