@extends('layouts.app', ['pageSlug' => 'listAdmin'])

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar Admin</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Akun</a></div>
                <div class="breadcrumb-item"><a href="#">Admin</a></div>
                <div class="breadcrumb-item">Daftar Admin</div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Data Admin</h4>
                    </div>
                    <div class="col-12 text-right">
                        <a href="{{route('admin.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> <span>Tambah Admin</span></a>
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
                            <th>Nama Admin</th>
                            <th>Email</th>
                            <th>Last Login</th>
                            <th>Tanggal Dibuat</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>   
                        @foreach ($admin as $row)                              
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td>{{ $row->name }}</td>
                                <td><a href="mailto:{{ $row->email }}">{{ $row->email }}</a></td>
                                <td>{{ $row->last_login }}</td>
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
