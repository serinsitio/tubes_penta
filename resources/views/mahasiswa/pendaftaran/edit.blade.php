<form method="POST" action="{{ route('pendaftaran.update', $daftar_sidang->id) }}" enctype="multipart/form-data">
    @csrf
    @method('put')
    @include('mahasiswa.pendaftaran.partials.form', ['daftar_sidang' => $daftar_sidang, 'mahasiswa' => $mahasiswa])

    <div class="row">
        <div class="col text-center pb-3">
            @if ($daftar_sidang->status == 0)
                <button type="submit" class="btn btn-lg btn-block btn-success">Update data</button>
            @else
                <button type="submit" class="btn btn-lg btn-block btn-success" disabled>Pendaftaran anda telah diverifikasi</button>
            @endif
        </div>
    </div>
</form>
