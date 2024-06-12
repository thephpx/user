<?php

namespace Thephpx\User\Http\Controllers\Role;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use Thephpx\User\Models\Role;

class Matrix extends AdminController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
        
    public function __invoke(Request $request, Role $role)
    {
        $data = $this->data;

        $data['permissions'] = \Facades\Thephpx\User\Models\Permission::get();

        return view('User::tablerui.role.matrix', compact('data'));
    }
}