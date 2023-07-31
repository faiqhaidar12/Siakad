@extends('layout.app')
@section('title', 'Guru')
@section('content')
    <!-- left column -->
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tambah Guru</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="/guru">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_guru">Nama Guru</label>
                        <input type="text" class="form-control" name="nama_guru" id="nama_guru"
                            placeholder="Masukan Nama Guru" value="{{ Session::get('nama_guru') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                            <option selected="selected">--Pilih--</option>
                            <option value="laki-laki" @if (Session::get('jenis_kelamin') == 'laki-laki') selected @endif>Laki-Laki</option>
                            <option value="perempuan" @if (Session::get('jenis_kelamin') == 'perempuan') selected @endif>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group" style="width: 150px">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control"
                            value="{{ Session::get('tgl_lahir') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10">{{ Session::get('alamat') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="no_telepon">Nomor Telepon</label>
                        <input type="number" name="no_telepon" id="no_telepon" class="form-control"
                            value="{{ Session::get('no_telepon') }}" required>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>

@endsection
