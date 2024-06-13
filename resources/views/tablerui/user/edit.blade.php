@extends("Tablerui::layouts.master")
@section('content')   
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Edit User
                </h2>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6">
                            <form method="post" class="card">
                                @csrf
                                @method('put')
                                <div class="card-header">
                                    <h3 class="card-title">User</h3>
                                </div>
                                <div class="card-body">                                    
                                    <div class="mb-3">
                                        <label class="form-label required">First name</label>
                                        <div>
                                            <input type="text" name="first_name" value="{{old('first_name', $data['row']->first_name ?? '')}}" class="form-control @if($errors->has('first_name')) is-invalid @endif" placeholder="Enter first name"/>
                                            @if($errors->has('first_name'))
                                            <div class="invalid-feedback">{{$errors->first('first_name')}}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Last name</label>
                                        <div>
                                            <input type="text" name="last_name" value="{{old('last_name', $data['row']->last_name ?? '')}}" class="form-control @if($errors->has('last_name')) is-invalid @endif" placeholder="Enter last name"/>
                                            @if($errors->has('last_name'))
                                            <div class="invalid-feedback">{{$errors->first('last_name')}}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Email</label>
                                        <div>
                                            <input type="text" name="email" value="{{old('email', $data['row']->email ?? '')}}" class="form-control @if($errors->has('email')) is-invalid @endif" placeholder="Enter email"/>
                                            @if($errors->has('email'))
                                            <div class="invalid-feedback">{{$errors->first('email')}}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Password</label>
                                        <div>
                                            <input type="password" name="password" value="" class="form-control @if($errors->has('password')) is-invalid @endif" placeholder="Enter password"/>
                                            @if($errors->has('password'))
                                            <div class="invalid-feedback">{{$errors->first('password')}}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Confirm password</label>
                                        <div>
                                            <input type="password" name="password_confirmation" value="" class="form-control @if($errors->has('password_confirmation')) is-invalid @endif" placeholder="Enter password again"/>
                                            @if($errors->has('password_confirmation'))
                                            <div class="invalid-feedback">{{$errors->first('password_confirmation')}}</div>
                                            @endif
                                        </div>
                                    </div>
                                    @if(auth()->user()->hasRole('admin'))
                                    <div class="mb-3">
                                        <label class="form-label required">Role</label>
                                        <div>
                                            <select name="role" class="form-control">
                                                <option value="member" @if($data['row']->hasRole('member')) selected @endif>Member</option>
                                                <option value="admin" @if($data['row']->hasRole('admin')) selected @endif>Admin</option>
                                            </select>
                                            @if($errors->has('role'))
                                            <div class="invalid-feedback">{{$errors->first('role')}}</div>
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="card-footer text-end">
                                    <a href="{{route('user.index')}}" class="btn btn-secondary">Back</a>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection