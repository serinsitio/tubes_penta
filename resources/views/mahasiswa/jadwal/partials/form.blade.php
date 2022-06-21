<div class="card card-danger">
    <div class="card-header">
        <h3 class="card-title"><b>Jadwal Sidang</b></h3>

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
                <!-- Date and time -->
                <div class="form-group">
                    <label>Pilih tanggal dan jam</label>
                      <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input" name="tanggal" value="{{ old('tanggal',$jadwal_sidang->tanggal) }}" data-target="#reservationdatetime"/>
                          <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                          </div>
                      </div>
                  </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
