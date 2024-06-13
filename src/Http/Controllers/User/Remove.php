<?php

namespace Thephpx\User\Http\Controllers\User;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

class Remove extends AdminController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
        
    public function __invoke(Request $request, \Thephpx\User\Models\User $user)
    {
        $data = $this->data;

        if($request->isMethod('delete'))
        {
            if(auth()->user()->hasRole('admin'))
            {
                $user->forceDelete();

                return redirect()->route('user.index')->with('success_message','User removed successfully!');
            }

            return redirect()->route('user.index')->with('warning_message','User could not be removed, permission denined!');
        }

        return redirect()->route('user.index')->with('warning_message','User could not be removed!');
    }
}