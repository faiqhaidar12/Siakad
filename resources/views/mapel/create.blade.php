@extends('layout.app')
@section('title', 'Mata Pelajaran')
@section('content')
    <!-- left column -->
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tambah Mata Pelajaran</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_mapel">Nama Mata Pelajaran</label>
                        <input type="text" class="form-control" name="nama_mapel" id="nama_mapel"
                            placeholder="Masukan Nama Mata Pelajaran" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_guru">Nama Guru Pengajar</label>
                        <select class="form-control" name="nama_guru" id="nama_guru">
                            <option value="">---Pilih Guru---</option>
                            <option value="">Adi Hidayat</option>
                        </select>
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
