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
            <form action="/nilai" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_kelas">Kelas</label>
                        <select class="form-control" name="kelas_id" id="nama_kelas">
                            <option value="">---Pilih Kelas---</option>
                            @foreach ($dataKelas as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_siswa">Nama Siswa</label>
                        <select class="form-control" name="siswa_id" id="nama_siswa">
                            <option value="">---Pilih Siswa---</option>
                            @foreach ($dataSiswa as $siswa_id => $nama_siswa)
                                <option value="{{ $siswa_id }}" @if (Session::get('nama_siswa') == $siswa_id) selected @endif>
                                    {{ $nama_siswa }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_mapel">Mata Pelajaran</label>
                        <select class="form-control" name="mapel_id" id="nama_mapel">
                            <option value="">---Pilih Mapel---</option>
                            @foreach ($dataMapel as $item)
                                <option value="{{ $item->id }}" @if (Session::get('nama_mapel') == $item->id) selected @endif>
                                    {{ $item->nama_mapel }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" style="width: 150px">
                        <label for="nilai">Nilai</label>
                        <input type="number" name="nilai" id="nilai" value="{{ Session::get('nilai') }}"
                            class="form-control" required>
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
