<div class="row">
    <div class="col-xl-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">Dashboard</h4>
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="#">Uplon</a></li>
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <form action="<?php echo base_url(); ?>index.php/c_admin/proses_add_pinjam_mobil/" method="post">
                <fieldset class="form-group">
                    <label for="exampleInputEmail1">NIK</label>
                    <input type="text"  class="form-control" id="exampleInputEmail1" placeholder="<?php echo $this->session->userdata('username');?>" disabled="true" ><input type="hidden" name="nik" value="<?php echo $this->session->userdata('username');?>">
                    </small>
                </fieldset>
                <fieldset class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text"  class="form-control" id="exampleInputEmail1" placeholder="<?php echo $karyawan->nama_karyawan;?>" disabled="true"><input type="hidden" name="nama" value="<?php echo $this->session->userdata('username');?>">
                    </small>
                </fieldset>
                <fieldset class="form-group">
                    <label for="exampleInputEmail1">Hari</label>
                    <input type="text" name="date" class="form-control"  placeholder="<?php echo $tanggal; ?>" disabled="true">
                    <input type="hidden" name="input_tanggal" value="<?php echo $tanggal;?>">
                    </small>
                </fieldset>
                <label>Jam Mulai</label>
                <div class="form-group">
                    <div class="col-10">
                        <input class="form-control" name="jam_mulai" type="time" value="13:45:00" id="example-time-input" parsley-trigger="change" required>
                    </div>
                </div>
                <label>Jam Akhir</label>
                <div class="form-group">
                    <div class="input-group">
                        <div class="col-10">
                            <input class="form-control" name="jam_akhir" type="time" value="13:45:00" id="example-time-input" parsley-trigger="change" required>
                        </div>
                    </div>
                </div>
                <!-- input-group -->
                <fieldset class="form-group">
                    <label for="exampleSelect1">Driver</label>
                    <select class="form-control" id="exampleSelect1" name="driver" required>
                        <option value="" selected disabled>Pilih Driver</option>
                        <?php foreach ($driver as $row1): ?>
                        <option value="<?php echo $row1->nik; ?>"><?php echo $row1->nama_karyawan; ?></option>
                        <?php endforeach; ?>
                    </select>
                </select>
            </fieldset>
            <fieldset class="form-group">
                <label for="exampleTextarea">Tujuan</label>
                <textarea class="form-control" name="tujuan" id="exampleTextarea" rows="3" parsley-trigger="change" required></textarea>
            </fieldset>
            <fieldset class="form-group">
                <label for="exampleTextarea">Keperluan</label>
                <textarea class="form-control" name="keperluan" id="exampleTextarea" rows="3" parsley-trigger="change" required></textarea>
            </fieldset>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <!-- end row -->
    </div>
</div>
</div>
