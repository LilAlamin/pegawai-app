<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>List Data Pegawai</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" />


    <style>
        .table-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 10px;
        }

        .table-border {
            border: 2px solid #dee2e6;
            padding: 20px;
            border-radius: 10px;
            background-color: #f8f9fa;
            width: 100%;
            max-width: 1200px;
        }

        @media (max-width: 768px) {
            .table-container {
                padding: 5px;
            }

            .table-border {
                padding: 10px;
            }
        }
    </style>

</head>

<body>
    <div class="table-container">
        <div class="table-border">
            <h3 class="text-center mb-3">Daftar Pegawai</h3>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="pegawai">
                    <thead class="table-dark">
                        <tr>
                            <th>Nomor Pegawai</th>
                            <th>Nama Pegawai</th>
                            <th>Alamat</th>
                            <th>Provinsi</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Terdaftar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $da)
                            @if ($da->IsDelete == 0)
                                <tr>
                                    <td>{{ $da->NIK }}</td>
                                    <td>{{ $da->nama_pegawai }}</td>
                                    <td>{{ $da->alamat }}</td>
                                    <td>{{ $da->provinsi }}</td>
                                    <td>{{ $da->jenis_kelamin }}</td>
                                    <td>{{ \Carbon\Carbon::parse($da->created_at)->translatedFormat('l, d F Y ') }}</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm delete-btn"
                                            data-id="{{ $da->id }}"><i class="fa fa-trash"></i></button>
                                    </td>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-end">
                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                    data-bs-target="#tambahPegawaiModal">
                    Tambah Pegawai
                </button>
            </div>
        </div>
    </div>

    <!-- Tambah Pegawai Modal -->
    <div class="modal fade" id="tambahPegawaiModal" tabindex="-1" aria-labelledby="tambahPegawaiModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahPegawaiModalLabel">Tambah Pegawai</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formTambahPegawai">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="namaPegawai" class="form-label">Nama Pegawai <span
                                    style="color: red">*</span></label>
                            <input type="text" class="form-control" id="namaPegawai" name="nama_pegawai" required
                                placeholder="Masukkan Nama pegawai">
                        </div>
                        <div class="mb-3">
                            <label for="provinsi" class="form-label">Provinsi<span style="color: red">*</span></label>
                            <select name="provinsi" id="provinsi" class="form-control">
                                <option value="">Pilih Provinsi</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="asalKota" class="form-label">Alamat <span style="color: red">*</span></label>
                            <input type="text" class="form-control" id="asalKota" name="asal_kota" required
                                placeholder="Masukkan Alamat pegawai">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin <span style="color: red">*</span></label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="radioLaki"
                                    value="Laki-laki" required>
                                <label class="form-check-label" for="radioLaki">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="radioPerempuan"
                                    value="Perempuan" required>
                                <label class="form-check-label" for="radioPerempuan">Perempuan</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    {{-- Sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            $('#pegawai').DataTable({
                "pageLength": 5,
                lengthMenu: [
                    [5, 10, 25, -1],
                    [5, 10, 25, "All"]
                ],
                "order": [
                    [0, 'asc']
                ],
            });

            $.ajax({
                url: 'https://api.binderbyte.com/wilayah/provinsi?api_key=977ffdaf267411d654312b82a42fdc9ef2757ed9adf32013873585ca79bfeceb',
                method: 'GET',
                success: function(response) {
                    let provinsiSelect = $('#provinsi');
                    // Clear existing options
                    provinsiSelect.empty();
                    // Add default option
                    provinsiSelect.append('<option value="">Pilih Provinsi</option>');
                    // Iterate through response data and append options to select element
                    response.value.forEach(function(provinsi) {
                        provinsiSelect.append(new Option(provinsi.name, provinsi
                        .name)); // Menggunakan nama provinsi sebagai value
                    });
                },
                error: function(xhr) {
                    console.error('Error fetching provinsi data:', xhr);
                }
            });


            $('#formTambahPegawai').submit(function(event) {
                event.preventDefault();

                // Serialize the form data
                let formData = $(this).serializeArray();

                // Get selected province value
                let asalProvinsi = $('#provinsi').val();

                // Add selected province to form data
                formData.push({
                    name: 'provinsi',
                    value: asalProvinsi
                });

                let csrfToken = $('#csrf-token').val();

                // Manually set CSRF token in headers
                $.ajax({
                    url: '{{ route('pegawai.store') }}',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    data: formData,
                    success: function(data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: 'Data pegawai berhasil ditambahkan',
                            showConfirmButton: false,
                            timer: 3000
                        });

                        $('#tambahPegawaiModal').modal('hide');
                        $('#formTambahPegawai')[0].reset(); // Reset the form
                        $('#tambahPegawaiModal').on('hidden.bs.modal', function() {
                            setTimeout(function() {
                                window.location
                                    .reload(); // Reload page after modal is hidden
                            }, 1000);
                        });
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Terjadi kesalahan saat menambahkan data pegawai',
                        });
                    }
                });
            });



        });
    </script>

    <script>
        $('.delete-btn').on('click', function() {
            var id = $(this).data('id');
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/pegawai/' + id,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.isDelete) {
                                Swal.fire(
                                    'Terhapus!',
                                    'Data pegawai telah dihapus.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire(
                                    'Gagal!',
                                    'Data pegawai gagal dihapus.',
                                    'error'
                                );
                            }
                        },
                        error: function(xhr) {
                            Swal.fire(
                                'Gagal!',
                                'Terjadi kesalahan saat menghapus data pegawai.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>
