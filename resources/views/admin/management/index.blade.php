@extends('layouts.app', ['pageSlug' => 'listManagement'])

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar Akun Management</h1>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Akun Management</h4>
                    </div>
                    <div class="col-12 text-right">
                        <a href="{{route('admin-management.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> <span>Tambah Manajemen</span></a>
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
                        @foreach ($management as $row)                              
                            <tr>
                                <td class="text-center">{{ $row->id }}</td>
                                <td>{{ $row->name }}</td>
                                <td><a href="mailto:{{ $row->email }}">{{ $row->email }}</a></td>
                                <td>{{ $row->business->name }}</td>
                                <td><div class="badge badge-success">Aktif</div></td>
                                <td>{{ $row->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('admin-management.detail', $row->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-eye"></i> Detail</a>
                                </td>
                                @if ($row->outlet_id)
                                    <td>
                                        <a href="{{ route('admin-management.edit-outlet', $row->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-pencil"></i> Assign Outlet</a>
                                    </td>
                                @else
                                    <td>
                                        <a href="{{ route('admin-management.assign-outlet', $row->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-pencil"></i> Assign Outlet</a>
                                    </td>
                                @endif
                                
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
                        <nav class="mt-4" aria-label="navigation">
                            {{$management->links()}}
                        </nav>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
