<?php

namespace Thephpx\User\Http\Controllers\User;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

class Index extends AdminController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
        
    public function __invoke(Request $request)
    {
        $data = $this->data;

        $data['rows'] = \Facades\Thephpx\User\Models\User::paginate(10);

        return view('User::tablerui.user.index', compact('data'));
    }
}