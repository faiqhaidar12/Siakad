@extends('layout.app')
@section('title', 'Pengaturan User')
@section('content')
    <a href="/pengguna/create" class="btn btn-primary mb-2"><i class="fas fa-plus"></i> Tambah User</a>
    <div class="float-right">
        <div class="card-tools">
            <form action="{{ url('/pengguna') }}" method="GET">
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
                <h3 class="card-title">Data Table Users</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php $no = 1; ?>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td style="width: 30%">
                                    <form action="{{ url('/pengguna/' . $user->id) }}" class="form-inline d-inline"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select class="form-control" style="width: 200px" name="role">
                                            <option value="Siswa" {{ $user->role == 'Siswa' ? 'selected' : '' }}>Siswa
                                            </option>
                                            <option value="Guru" {{ $user->role == 'Guru' ? 'selected' : '' }}>Guru
                                            </option>
                                            <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin
                                            </option>
                                        </select>
                                        <button class="btn btn-primary btn-sm btn-inline" type="submit">Simpan</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        {{ $users->links() }}
    </div>
@endsection
