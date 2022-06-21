<x-app-layout>
    <x-slot name="header">Pendaftaran</x-slot>

    @if ($pesan = Session::get('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {!! $pesan !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($pesan = Session::get('gagal'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {!! $pesan !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($mahasiswa)
        @include('mahasiswa.pendaftaran.edit')
    @else
        @include('mahasiswa.pendaftaran.create')
    @endif

    <x-slot name="scripts">
        <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
        <script>
            $('#inputGroupFile01').on('change', function() {
                //get the file name
                var fileName = $(this).val().split('\\').pop();;
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            })
        </script>
    </x-slot>
</x-app-layout>
