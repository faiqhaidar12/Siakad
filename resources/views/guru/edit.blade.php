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
            <form>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_guru">Nama Guru</label>
                        <input type="text" class="form-control" name="nama_guru" id="nama_guru"
                            placeholder="Masukan Nama Guru" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                            <option value="">Laki-Laki</option>
                            <option value="">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group" style="width: 150px">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">Nomor Telepon</label>
                        <input type="number" name="no_hp" id="no_hp" class="form-control" required>
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
