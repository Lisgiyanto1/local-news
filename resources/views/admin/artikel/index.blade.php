@extends('layouts.backend.app',[
'title' => 'Manage Artikel',
'contentTitle' => 'Manage Artikel',
])
@push('css')
<!-- DataTables -->
<link rel="stylesheet"
    href="{{ asset('templates/backend/AdminLTE-3.0.1') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush
@section('content')
<x-alert></x-alert>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('admin.artikel.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
            </div>
            <div class="card-body table-responsive">
                <table id="dataTable1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Author</th>
                            <th>Kategori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no=1;
                        @endphp

                        @foreach($artikel as $art)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $art->judul }}</td>
                            <td>{{ $art->user->name }}</td>
                            <td>{{ $art->kategoriArtikel->nama_kategori }}</td>

                            <td>
                                @if(auth()->user()->id == $art->user_id)
                                <div class="row ml-2">
                                    <a href="{{ route('admin.artikel.edit',$art->id) }}"
                                        class="btn btn-primary btn-sm"><i class="fas fa-edit fa-fw"></i></a>

                                    <form method="POST" action="{{ route('admin.artikel.destroy',$art->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Yakin hapus ?')" type="submit"
                                            class="btn btn-danger btn-sm ml-2"><i
                                                class="fas fa-trash fa-fw"></i></button>
                                    </form>
                                </div>
                                @else
                                <!-- <a href="javasript:void(0)" class="btn btn-danger btn-sm">
                    <i class="fas fa-ban"></i> No Action Available
                    </a> -->
                                <!-- make edit -->
                                <div class="row ml-2">
                                    <a href="{{ route('admin.artikel.edit',$art->id) }}"
                                        class="btn btn-primary btn-sm"><i class="fas fa-edit fa-fw"></i></a>

                                    <form method="POST" action="{{ route('admin.artikel.destroy',$art->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger btn-sm ml-2" data-toggle="modal"
                                            data-target="#confirmModal">
                                            <i class="fas fa-trash fa-fw"></i>
                                        </button>

                                        <!-- Confirmation Modal -->
                                        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog"
                                            aria-labelledby="confirmModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="confirmModalLabel">Confirmation</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </form>
                                    @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
@push('js')
<!-- DataTables -->
<script src="{{ asset('templates/backend/AdminLTE-3.0.1') }}/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{ asset('templates/backend/AdminLTE-3.0.1') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.js">
</script>
<script>
$(function() {
    $("#dataTable1").DataTable();
});
</script>
@endpush