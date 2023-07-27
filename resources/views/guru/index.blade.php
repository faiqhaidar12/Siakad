@extends('layout.app')
@section('title', 'Data Guru')
@section('content')
    <a href="/guru/create" class="btn btn-primary mb-2"><i class="fas fa-plus"></i> Tambah GUru</a>
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
                <h3 class="card-title">DataTable Guru</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Guru</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>No. Telepon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php $no = 1; ?>
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>Adi Hidayat</td>
                            <td>Laki-Laki</td>
                            <td>15-01-1996</td>
                            <td>Bantul</td>
                            <td>0966251177</td>
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
