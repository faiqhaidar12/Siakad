@extends('layout.app')
@section('title', 'Kelas ')
@section('content')
    <!-- left column -->
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit kelas</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_kelas">Nama kelas</label>
                        <input type="text" class="form-control" name="nama_kelas" id="nama_kelas"
                            placeholder="Masukan Nama Kelas" required>
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
