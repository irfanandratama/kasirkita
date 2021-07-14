@extends('layouts.app', ['pageSlug' => 'cashier'])

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar Akun Kasir</h1>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Akun Kasir</h4>
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
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Bisnis</th>
                            <th>Status</th>
                            <th>Tanggal Dibuat</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>   
                        @foreach ($cashier as $row)                              
                            <tr>
                                <td class="text-center">{{ $row->id }}</td>
                                <td>{{ $row->name }}</td>
                                <td><a href="mailto:{{ $row->email }}">{{ $row->email }}</a></td>
                                <td>{{ $row->business->name }}</td>
                                <td><div class="badge badge-success">Aktif</div></td>
                                <td>{{ $row->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('admin-cashier.detail', $row->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-eye"></i> Detail</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
                        <nav class="mt-4" aria-label="navigation">
                            {{$cashier->links()}}
                        </nav>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
