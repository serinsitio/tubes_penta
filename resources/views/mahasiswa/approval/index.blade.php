<x-app-layout>
    <x-slot name="header">Status Approval</x-slot>
    <x-slot name="styles">
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet"
            href="{{ asset('admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet"
            href="{{ asset('admin-lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    </x-slot>
    <x-slot name="scripts">
        <script src="{{ asset('admin-lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('admin-lte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('admin-lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('admin-lte/plugins/jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('admin-lte/plugins/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ asset('admin-lte/plugins/pdfmake/vfs_fonts.js') }}"></script>
        <script src="{{ asset('admin-lte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('admin-lte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('admin-lte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
        {{-- <script>
            $(function() {
                $("#example1").DataTable({
                    processing: true,
                    serverSide: true,
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "ajax": "{{ route('dosen.konfirmasi.get') }}",
                    "columns": [
                        {"data":"id_mhs","name":"id_mhs"},
                        {"data":"judul_ta","name":"judul_ta"},
                        {"data":"nilai_akhir","name":"nilai_akhir"},
                        {"data":"berkas","name":"berkas","class":"text-center"},
                        {"data":"status","name":"status", "class":"text-center"},
                        {"data":"aksi","name":"aksi", "class":"text-center"},
                    ],
                });
            });
        </script> --}}
    </x-slot>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tabel Status Approval</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Judul TA</th>
                        <th class="text-center">Status Pendaftaran</th>
                        <th class="text-center">Status Jadwal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswa as $data)
                        <tr>
                            <td>{{ $data->user->name }}</td>
                            <td>{{ $data->daftarsidang->judul_ta }}</td>
                            @if (isset($data->daftarsidang))
                                @if ($data->daftarsidang->status == 1)
                                    <td class="text-center"><button type="button" class="btn btn-success"><i
                                                class="fas fa-check-circle"></i></button></td>
                                @else
                                    <td class="text-center"><button type="button" class="btn btn-danger"><i
                                                class="fas fa-times-circle"></i></button></td>
                                @endif
                            @else
                                <td class="text-center"><button type="button" class="btn btn-danger">Anda belum melakukan pendaftaran</button></td>
                            @endif
                            @if (isset($data->jadwalsidang))
                                @if ($data->jadwalsidang->status == 1)
                                    <td class="text-center"><button type="button" class="btn btn-success"><i
                                                class="fas fa-check-circle"></i></button></td>
                                @else
                                    <td class="text-center"><button type="button" class="btn btn-danger"><i
                                                class="fas fa-times-circle"></i></button></td>
                                @endif
                            @else
                                <td class="text-center"><button type="button" class="btn btn-danger">Anda belum memilih jadwal</button></td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Judul TA</th>
                        <th class="text-center">Status Pendaftaran</th>
                        <th class="text-center">Status Jadwal</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</x-app-layout>
