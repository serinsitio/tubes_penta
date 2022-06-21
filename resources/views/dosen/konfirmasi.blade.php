<x-dosen-layout>
    @if ($pesan = Session::get('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {!! $pesan !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <x-slot name="header">Konfirmas Pendaftaran Sidang</x-slot>
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
        <script>
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
        </script>
    </x-slot>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tabel Konfirmasi</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Judul TA</th>
                        <th>Nilai Akhir</th>
                        <th>Berkas</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Judul TA</th>
                        <th>Nilai Akhir</th>
                        <th>Berkas</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</x-dosen-layout>
