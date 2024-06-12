@extends("Tablerui::layouts.master")
@section('content')   
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Users
                </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{route('user.create')}}" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                        data-bs-target="#modal-report">
                        <i class="ti ti-user"></i>
                        Create New User
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
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data['rows'] as $row)
                                        <tr>
                                            <td>{{$row->first_name}}</td>
                                            <td>{{$row->last_name}}</td>
                                            <td class="text-secondary">
                                                {{$row->email}}
                                            </td>
                                            <td class="text-secondary">
                                                {{$row->phone}}
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-secondary" href="#">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection