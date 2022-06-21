<div class="card card-danger">
    <div class="card-header">
        <h3 class="card-title"><b>Biodata</b></h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Lengkap</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                        value="{{ old('name') ?? Auth::user()->name }}" placeholder="Masukkan nama lengkap">
                </div>
                <x-auth-validation-errors name="name"/>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tempat Lahir</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                        placeholder="Masukkan tempat lahir">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="exampleInputEmail1"
                        placeholder="Masukkan tanggal lahir">
                </div>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col">
                <div class="col">
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" rows="8" placeholder="Masukkan alamat ..."></textarea>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kota</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                placeholder="Masukkan kota anda">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Negara</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                placeholder="Masukkan negara anda">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kode Pos</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                placeholder="Masukkan kode pos anda">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1">No HP</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                        placeholder="Masukkan tanggal lahir">
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
    <!-- /.card-body -->
</div>

<div class="card card-danger">
    <div class="card-header">
        <h3 class="card-title"><b>Data Diri</b></h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1">Judul Tugas Akhir</label>
                    <input type="text" class="form-control" name="judul_ta"
                        value="{{ old('judul_ta', $daftar_sidang->judul_ta) }}" placeholder="Masukkan judul tugas akhir">
                </div>
                <x-auth-validation-errors name="judul_ta"/>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nilai Tugas Akhir</label>
                    <input type="number" class="form-control" name="nilai_akhir"
                        value="{{ old('nilai_akhir', $daftar_sidang->nilai_akhir) }}" placeholder="Masukkan nilai tugas akhir">
                </div>
                <x-auth-validation-errors name="nilai_akhir"/>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1">NIM</label>
                    <input type="text" class="form-control" name="nim"
                        value="{{ old('nim', $mahasiswa->nim) }}" placeholder="Masukkan nim">
                </div>
                <x-auth-validation-errors name="nim"/>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1">Prodi</label>
                    <input type="text" class="form-control" name="prodi"
                        value="{{ old('prodi', $mahasiswa->prodi) }}" placeholder="Masukkan prodi">
                </div>
                <x-auth-validation-errors name="prodi"/>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>

<div class="card card-danger">
    <div class="card-header">
        <h3 class="card-title"><b>Berkas</b></h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col"><label for="exampleInputEmail1">File Submission</label></div>

            <div class="col text-right"><p>Maximum file size : 5mb</p></div>
        </div>
        <div class="row">
            <div class="col">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="inputGroupFile01" name="berkas" aria-describedby="inputGroupFileAddon01">
                      <label class="custom-file-label" for="inputGroupFile01">Pilih file</label>
                    </div>
                  </div>
                  <x-auth-validation-errors name="berkas"/>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
