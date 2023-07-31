@extends('layout.app')
@section('title', 'Siswa')
@section('content')
    <!-- left column -->
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tambah Siswa</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="/siswa" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_siswa">Nama Siswa</label>
                        <input type="text" class="form-control" name="nama_siswa" id="nama_siswa"
                            placeholder="Masukan Nama Siswa" value="{{ Session::get('nama_siswa') }}" required>
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
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" value="{{ Session::get('tanggal_lahir') }}" name="tanggal_lahir"
                            id="tgl_lahir" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10">{{ Session::get('alamat') }}</textarea>
                    </div>
                    <div class="form-group" style="width: 150px;">
                        <label for="kelas_id">Pilih Kelas</label>
                        <select class="form-control" name="kelas_id" id="kelas_id">
                            <option value="">---Pilih Kelas---</option>
                            @foreach ($data as $item)
                                <option value="{{ $item->id }}" @if (Session::get('kelas_id') == $item->id) selected @endif>
                                    {{ $item->nama_kelas }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="no_telepon_orang_tua">Nomor Orang Tua / Wali</label>
                        <input type="number" value="{{ Session::get('no_telepon_orang_tua') }}" name="no_telepon_orang_tua"
                            id="no_telepon_orang_tua" class="form-control" required>
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
