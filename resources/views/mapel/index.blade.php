@extends('layout.app')
@section('title', 'Data Mata Pelajaran')
@section('content')
    <a href="/mapel/create" class="btn btn-primary mb-2"><i class="fas fa-plus"></i> Tambah Mata Pelajaran</a>
    <div class="float-right">
        <div class="card-tools">
            <form action="" method="GET">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="keyword" class="form-control float-right" placeholder="Search"
                        value="">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DataTable Mata Pelajaran</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Mata Pelajaran</th>
                            <th>Pengajar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php $no = 1; ?>
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>Bahasa Indonesia</td>
                            <td>Adi Hidayat</td>
                            <td><a href="" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt">
                                    </i> Edit</a>
                                <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash">
                                    </i> Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection
