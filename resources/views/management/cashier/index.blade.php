@extends('layouts.app', ['pageSlug' => 'listCashier'])

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar Kasir</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Akun</a></div>
                <div class="breadcrumb-item"><a href="#">Kasir</a></div>
                <div class="breadcrumb-item">Daftar Kasir</div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Data Kasir</h4>
                    </div>
                    <div class="col-12 text-right">
                        <a href="{{ route('management-cashier.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> <span>Tambah Kasir</span></a>
                    </div>
                    <div class="card-body">
                    @include('alerts.notification')
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                        <thead>                                 
                            <tr>
                            <th class="text-center">
                                ID
                            </th>
                            <th>Nama Kasir</th>
                            <th>Email</th>
                            <th>Outlet</th>
                            <th>Status</th>
                            <th>Tanggal Dibuat</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>   
                        @foreach ($cashier as $row)                              
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $row->name }}</td>
                                <td><a href="mailto:{{ $row->email }}">{{ $row->email }}</a></td>
                                <td>{{ $row->outlet->name }}</td>
                                <td><div class="badge badge-success">Aktif</div></td>
                                <td>{{ $row->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <form action="{{ route('management-cashier.delete', $row->id ) }}" method="post">
                                        @csrf
                                        @method('delete')

                                        <a href="{{ route('management-cashier.edit', $row->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-edit"></i> Ubah</a>
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
