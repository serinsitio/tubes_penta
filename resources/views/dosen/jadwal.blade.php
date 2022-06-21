<x-dosen-layout>
    <x-slot name="header">Konfirmasi Jadwal</x-slot>
    @if ($pesan = Session::get('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {!! $pesan !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <x-slot name='header'>Jadwal</x-slot>
    <x-slot name="styles">
        <!-- fullCalendar -->
        <link rel="stylesheet" href="{{ asset('admin-lte/plugins/fullcalendar/main.css') }}">
    </x-slot>

    <div class="card card-primary">
        <div class="card-body p-0">
            <!-- THE CALENDAR -->
            <div id="calendar"></div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <x-slot name="scripts">
        <!-- fullCalendar 2.2.5 -->
        <script src="{{ asset('admin-lte/plugins/moment/moment.min.js') }}"></script>
        <script src="{{ asset('admin-lte/plugins/fullcalendar/main.js') }}"></script>
        <!-- Page specific script -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek'
                    },
                    initialView: 'timeGridWeek',
                    editable: true,
                    themeSystem: 'bootstrap',
                    events: "{{ route('dosen.jadwal.get') }}"
                });
                calendar.render();
            });
        </script>
    </x-slot>
</x-dosen-layout>
