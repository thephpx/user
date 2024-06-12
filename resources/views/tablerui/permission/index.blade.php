@extends("Tablerui::layouts.master")
@section('content')   
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Permissions
                </h2>
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
                                        <td width="10%">
                                            <a class="btn btn-sm" role="button" href="{{route('permission.edit', $row->id)}}">Edit</a>
                                            <a class="btn btn-sm" role="button" href="#">Remove</a>
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