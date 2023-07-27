@extends('layout.app')
@section('title', 'Nilai Siswa ')
@section('content')
    <!-- left column -->
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tambah Nilai Siswa</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_siswa">Kelas</label>
                        <select class="form-control" name="nama_siswa" id="nama_siswa">
                            <option value="">---Pilih Kelas---</option>
                            <option value="">1 A</option>
                            <option value="">2 B</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_siswa">Nama Siswa</label>
                        <select class="form-control" name="nama_siswa" id="nama_siswa">
                            <option value="">---Pilih Siswa---</option>
                            <option value="">Ani</option>
                            <option value="">Budi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="mapel">Mata Pelajaran</label>
                        <select class="form-control" name="mapel" id="mapel">
                            <option value="">Bahasa Indonesia</option>
                            <option value="">Matematika</option>
                        </select>
                    </div>
                    <div class="form-group" style="width: 150px">
                        <label for="nilai">Nilai</label>
                        <input type="number" name="nilai" id="nilai" class="form-control" required>
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
