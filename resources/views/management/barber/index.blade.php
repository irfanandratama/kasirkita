@extends('layouts.app', ['pageSlug' => 'listBarber'])

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar Tukang Cukur</h1>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Tukang Cukur</h4>
                    </div>
                    <div class="col-12 text-right">
                        <a href="{{ route('management-barber.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> <span>Tambah Tukang Cukur</span></a>
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
                        @foreach ($barber as $row)                              
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $row->name }}</td>
                                <td><a href="mailto:{{ $row->email }}">{{ $row->email }}</a></td>
                                <td>{{ $row->business->name }}</td>
                                <td><div class="badge badge-success">Aktif</div></td>
                                <td>{{ $row->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <form action="{{ route('management-barber.delete', $row->id ) }}" method="post">
                                        @csrf
                                        @method('delete')

                                        <a href="{{ route('management-barber.edit', $row->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-edit"></i> Ubah</a>
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
