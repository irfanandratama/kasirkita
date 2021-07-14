@extends('layouts.app', ['pageSlug' => 'listProduct'])
{{-- @section('style')
    <link rel="stylesheet"
          href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection --}}
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Daftar Produk</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Management</a></div>
                    <div class="breadcrumb-item"><a href="#">Produk</a></div>
                    <div class="breadcrumb-item">Daftar Produk</div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Produk</h4>
                        </div>
                        <div class="col-12 row">
                            <form class="form col-6" method="post" action="{{ route('management-product.search') }}">
                                @csrf
                                <div class="col-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="search" name="search" placeholder="Cari Produk" autocomplete="off">
                                        <div class="input-group-append">
                                            <button class="btn btn-icon icon-left btn-primary" type="button">
                                                <i class="fas fa-search"></i> Cari
                                            </button>
                                        </div>
                                      </div>
                                </div>
                            </form>
                                                    
                            <div class="col-6 text-right">
                                <a href="{{route('management-product.create')}}" class="btn btn-icon icon-left btn-primary"><i
                                    class="fas fa-plus"></i> <span>Tambah Produk</span></a>
                            </div>
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
                                        <th>Nama Produk</th>
                                        <th>Foto</th>
                                        <th>Harga</th>
                                        <th>Kategori</th>
                                        <th>Outlet</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if ($product)
                                            @foreach ($product as $row)                                 
                                                <tr>
                                                <td class="text-center">{{$loop->iteration}}</td>
                                                <td>{{$row->name}}</td>
                                                <td><img src="{{ asset('assets/img/product/' . $row->image) }}" height="100" /></td>
                                                <td class="text-center">Rp. {{ number_format($row->price, 0, '.', '.')}}</td>
                                                <td>{{ $row->category->name }}</td>
                                                <td>
                                                    @foreach ($outlet as $rows)
                                                        @if ($rows->id == $row->productDetail[0]['outlet_id'])
                                                            {{ $rows->name }}
                                                        @else
                                                            Toko tidak diketahui
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <form action="{{route('management-product.delete', $row->id)}}" method="post">
                                                        @csrf
                                                        @method('delete')

                                                        <a href="{{route('management-product.edit', $row->id)}}" class="btn btn-icon btn-primary"><i class="fas fa-edit"></i> Ubah</a>
                                                        <button type="submit" class="btn btn-icon btn-danger icon-left"></i> Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                                </tr>
                                            @endforeach
                                            
                                        @else
                                            <tr class="text-center">Data tidak ditemukan</tr>
                                        @endif
                                        
                                    </tbody>
                                </table>
                                <nav class="mt-4" aria-label="navigation">
                                    {{$product->links()}}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
{{-- @section('script')
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            var u = "{{route('management-product.delete',['id'=> 0])}}";
            var dt = $('#table-1').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('management-product.data')}}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'foto', name: 'foto', orderable: false, searchable: false, align: 'center'},
                    {data: 'harga', name: 'price'},
                    {data: 'kategori', name: 'category_id'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, align: 'center'},
                ]
            });

            var del = function (id) {
                var x = u.replace("/0","/"+id);
                $.ajax({
                    url: x,
                    method: "DELETE",
                }).done(function () {
                    dt.ajax.reload();
                    alert("Data sudah terhapus.");
                }).fail(function (textStatus) {
                    alert("Request failed: " + textStatus);
                });
            }
            $('body').on('click', '.hapus-data', function () {
                del($(this).attr('data-id'));
            });
        });
    </script>
@endsection --}}
