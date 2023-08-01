@extends('layout.app')
@section('title', 'Data Siswa')
@section('content')
    <a href="/siswa/create" class="btn btn-primary mb-2"><i class="fas fa-plus"></i> Tambah Siswa</a>
    <div class="float-right">
        <div class="card-tools">
            <form action="{{ url('/siswa') }}" method="GET">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="keyword" class="form-control float-right" placeholder="Search"
                        value="{{ request('keyword') }}">
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
                <h3 class="card-title">DataTable Siswa</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Kelas</th>
                            <th>Telp Ortu/Wali</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php $no = 1; ?>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->nama_siswa }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>{{ $item->tanggal_lahir }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->kelas->nama_kelas }}</td>
                                <td>{{ $item->no_telepon_orang_tua }}</td>
                                <td><a href="{{ '/siswa/' . $item->id . '/edit' }}" class="btn btn-warning btn-sm"><i
                                            class="fas fa-pencil-alt">
                                        </i> Edit</a>
                                    <form onsubmit="return confirm('Apakah Anda Yakin Ingin Hapus Siswa?')"
                                        action="{{ '/siswa/' . $item->id }}" class="d-inline" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash">
                                            </i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        {{ $data->links() }}
    </div>
@endsection
