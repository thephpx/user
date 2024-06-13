@extends("Tablerui::layouts.master")
@section('content')   
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Roles
                </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{route('role.create')}}" class="btn btn-primary d-none d-sm-inline-block">
                        <i class="ti ti-circles"></i>
                        Create New Role
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data['rows'] as $row)
                                    <tr>
                                        <td>{{$row->name}}</td>
                                        <td width="15%">
                                            <a class="btn btn-sm btn-secondary" role="button" href="{{route('role.edit', $row->id)}}">Edit</a>
                                            <a class="btn btn-sm btn-danger" role="button" href="#">Remove</a>
                                            <a class="btn btn-sm btn-success" role="button" href="#">Matrix</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$data['rows']->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection