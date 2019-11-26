@extends('layouts.app', ['pageSlug' => 'listOutlet'])

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar Outlet</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Management</a></div>
                <div class="breadcrumb-item"><a href="#">Outlet</a></div>
                <div class="breadcrumb-item">Daftar Outlet</div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Data Outlet</h4>
                    </div>
                    <div class="col-12 text-right">
                        <a href="{{route('management-outlet.create')}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> <span>Tambah Outlet</span></a>
                    </div>
                    <div class="card-body">
                    @include('alerts.notification')
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                        <thead>                                 
                            <tr>
                            <th class="text-center">
                                #
                            </th>
                            <th>Nama Outlet</th>
                            <th>Alamat</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($outlet as $row)                                 
                            <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{ $row->address }}</td>
                            <td>
                                <form action="{{route('management-outlet.delete', $row->id)}}" method="post">
                                    @csrf
                                    @method('delete')

                                    <a href="{{route('management-outlet.detail', $row->id)}}" class="btn btn-icon btn-info"><i class="fas fa-edit"></i> Ubah</a>
                                    <button type="submit" class="btn btn-icon btn-danger icon-left"></i> Hapus
                                    </button>
                                </form>
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
    </section>
</div>
@endsection
