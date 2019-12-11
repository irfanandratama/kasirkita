@extends('layouts.app', ['pageSlug' => 'business'])

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar Bisnis</h1>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Data Bisnis</h4>
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
                            <th>Nama Bisnis</th>
                            <th>Jumlah Outlet</th>
                            <th>Tanggal Dibuat</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>   
                        @foreach ($business as $row)                              
                            <tr>
                                <td class="text-center">{{ $row->id }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->outlet->count() }} Outlet</td>
                                <td>{{ $row->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <a href="" class="btn btn-icon btn-primary"><i class="fas fa-edit"></i> Detail</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
                        <nav class="mt-4" aria-label="navigation">
                            {{$business->links()}}
                        </nav>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
