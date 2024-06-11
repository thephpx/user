<?php

namespace Thephpx\User\Http\Controllers\Role;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

class Remove extends AdminController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
        
    public function __invoke(Request $request, \Thephpx\User\Models\Role $role)
    {
        $data = $this->data;

        if($request->isMethod('delete'))
        {
            
        }

    }
}