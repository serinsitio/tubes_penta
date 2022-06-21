<form method="POST" action="{{ route('pendaftaran.store') }}" enctype="multipart/form-data">
    @csrf
    @include('mahasiswa.pendaftaran.partials.form', ['daftar_sidang' => new App\Models\DaftarSidang, 'mahasiswa' => new App\Models\Mahasiswa])

    <div class="row">
        <div class="col text-center pb-3">
            <button type="submit" class="btn btn-lg btn-block btn-success">Submit</button>
        </div>
    </div>
</form>
