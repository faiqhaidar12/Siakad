@extends('layout.app')
@section('title', 'Data kelas ')
@section('content')
    <a href="/kelas/create" class="btn btn-primary mb-2"><i class="fas fa-plus"></i> Tambah Kelas</a>
    <div class="float-right">
        <div class="card-tools">
            <form action="{{ url('/kelas') }}" method="GET">
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
                <h3 class="card-title">DataTable Kelas</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Kelas</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php $no = 1; ?>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->nama_kelas }}</td>
                                <td><a href="{{ '/kelas/' . $item->id . '/edit' }}" class="btn btn-warning btn-sm"><i
                                            class="fas fa-pencil-alt">
                                        </i> Edit</a>
                                    <form onsubmit="return confirm('Apakah Anda Yakin Ingin Hapus Kelas?')" class="d-inline"
                                        action="{{ '/kelas/' . $item->id }}" method="POST">
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
