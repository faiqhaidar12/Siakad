@extends('layout.app')
@section('title', 'Mata Pelajaran')
@section('content')
    <!-- left column -->
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Mata Pelajaran</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ url('/mapel/' . $data->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_mapel">Nama Mata Pelajaran</label>
                        <input type="text" class="form-control" name="nama_mapel" id="nama_mapel"
                            placeholder="Masukan Nama Mata Pelajaran" value="{{ $data->nama_mapel }}" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_guru">Nama Guru Pengajar</label>
                        <select class="form-control" name="guru_id" id="nama_guru">
                            <option value="{{ $data->id }}" selected="selected">{{ $data->guru->nama_guru }}
                                @foreach ($guruList as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->nama_guru }}
                            </option>
                            @endforeach
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
