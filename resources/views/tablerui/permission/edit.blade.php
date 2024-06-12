@extends("Tablerui::layouts.master")
@section('content')   
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Edit Permission
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
                                    <h3 class="card-title">Permission</h3>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label required">Name</label>
                                        <div>
                                            <input type="text" name="name" value="{{old('name', $data['row']->name??'')}}" class="form-control" aria-describedby="permissionName"
                                                placeholder="Enter permission name"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <a href="{{route('permission.index')}}" class="btn btn-secondary">Back</a>
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