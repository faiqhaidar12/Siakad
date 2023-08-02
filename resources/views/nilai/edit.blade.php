@extends('layout.app')
@section('title', 'Nilai Siswa')
@section('content')
    <!-- left column -->
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Nilai Siswa</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ url('/nilai/' . $data->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_kelas">Kelas</label>
                        <select class="form-control" name="kelas_id" id="nama_kelas">
                            <option value="{{ $data->kelas->id }}" selected="selected">{{ $data->kelas->nama_kelas }}
                            </option>
                            @foreach ($dataKelas as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_siswa">Nama Siswa</label>
                        <select class="form-control" name="siswa_id" id="nama_siswa">
                            <option value="{{ $data->siswa->id }}">{{ $data->siswa->nama_siswa }}</option>
                            @foreach ($dataSiswa as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_siswa }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="mapel">Mata Pelajaran</label>
                        <select class="form-control" name="mapel_id" id="mapel">
                            <option value="{{ $data->id }}">{{ $data->mapel->nama_mapel }}</option>
                            @foreach ($dataMapel as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_mapel }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" style="width: 150px">
                        <label for="nilai">Nilai</label>
                        <input type="number" name="nilai" id="nilai" value="{{ $data->nilai }}"
                            class="form-control" required>
                    </div>
                    <div class="form-group" style="width: 150px">
                        <label for="semester">Semester</label>
                        <select class="form-control" name="semester" id="semester">
                            <option value="{{ $data->semester }}" selected="selected">{{ $data->semester }}
                            </option>
                            <option value="Ganjil">Ganjil</option>
                            <option value="Genap">Genap</option>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Set the CSRF token for AJAX request
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        $('#nama_kelas').change(function() {
            var kelasId = $(this).val();
            if (kelasId !== '') {
                // Make AJAX request to get siswa data based on selected kelas
                $.ajax({
                    url: '/get-siswa-by-kelas/' + kelasId,
                    type: 'GET',
                    success: function(data) {
                        var options = '<option value="">---Pilih Siswa---</option>';
                        for (var siswaId in data) {
                            options += '<option value="' + siswaId + '">' + data[siswaId] + '</option>';
                        }
                        $('#nama_siswa').html(options);
                    },
                    error: function(xhr) {
                        // Handle error if any
                    }
                });
            } else {
                // Clear the siswa dropdown if no kelas is selected
                $('#nama_siswa').html('<option value="">---Pilih Siswa---</option>');
            }
        });
    </script>
@endsection
