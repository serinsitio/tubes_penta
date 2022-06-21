<x-app-layout>
    <x-slot name="header">Edit jadwal</x-slot>
    <form action="{{ route('jadwal.update', $jadwal_sidang->id) }}" method="POST">
        @csrf
        @method('put')
        @include('mahasiswa.jadwal.partials.form',['jadwal_sidang' => $jadwal_sidang])

        <div class="row pl-2 pb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

    <x-slot name="styles">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="{{ asset('admin-lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    </x-slot>

    <x-slot name="scripts">
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{ asset('admin-lte/plugins/moment/moment.min.js') }}"></script>
        <script src="{{ asset('admin-lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
        <script>
            $(function() {
                //Date and time picker
                $('#reservationdatetime').datetimepicker({
                    icons: {
                        time: 'far fa-clock'
                    }
                });
            });
        </script>
    </x-slot>
</x-app-layout>
