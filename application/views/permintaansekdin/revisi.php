<section class="content">
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-dark">
      <div class="card-header">
        <h3 class="card-title">Isikan Data !</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <!-- ?php echo validation_errors(); ?> -->
      <form action="<?=site_url('permintaansekdin/proses')?>" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group <?=form_error('nama_surat')?'has-error': null?>">
                <label for="nama_surat">Nama Surat</label>
                <input type="hidden" name="id" value="<?=$row->id?>">
                <input type="text" name="nama_surat" class="form-control" id="nama_surat" placeholder="Nama Surat" value="<?= $row->nama_surat ?>" required>
                <?= form_error('nama_surat','<div class="text-small text-danger">','</div>') ?>
            </div>
            <div class="form-group <?=form_error('tanggal')?'has-error': null?>">
                <label for="tanggal">Tanggal Surat</label>
                <input type="date" name="tanggal" class="form-control" id="tanggal" value="<?= $row->tanggal ?>" required>
                <?= form_error('tanggal','<div class="text-small text-danger">','</div>') ?>
            </div>
            <div class="form-group <?=form_error('penandatanganan')?'has-error': null?>">
                <label for="penandatanganan">Penandatanganan</label>
                <input type="text" name="penandatanganan" class="form-control" disabled id="nomorhp" placeholder="Penandatanganan" required value="<?= $row->penandatanganan ?>">
                <?= form_error('penandatanganan','<div class="text-small text-danger">','</div>') ?>
            </div>
            <div class="form-group <?=form_error('module')?'has-error': null?>">
                <label for="module">Module</label>
                <select name="module" id="module" class="form-control" required disabled>
                    <option value="">- Pilih -</option>
                    <option value="Diskominfo" <?= $row->module=='Diskominfo'?'selected': ''?>>Diskominfo</option>
                    <option value="Bapenda" <?= $row->module=='Bapenda'?'selected': ''?>>Bapenda</option>
                </select>
                <?= form_error('module','<div class="text-small text-danger">','</div>') ?>
            </div>
            <div class="form-group <?=form_error('tujuan')?'has-error': null?>">
                <label for="tujuan">Tujuan Surat</label>
                <select name="tujuan" id="tujuan" class="form-control" required>
                    <option value="">- Pilih -</option>
                    <option value="Diskominfo" <?= $row->tujuan=='Diskominfo'?'selected': ''?>>Diskominfo</option>
                    <option value="Bapenda" <?= $row->tujuan=='Bapenda'?'selected': ''?>>Bapenda</option>
                </select>
                <?= form_error('module','<div class="text-small text-danger">','</div>') ?>
              </div>
              <div class="form-group <?=form_error('keterangan')?'has-error': null?>">
                <label for="keterangan">Keterangan</label>
                <input type="textarea" name="keterangan" class="form-control" id="keterangan" required placeholder="Keterangan" value="<?= $row->keterangan ?>">
                <?= form_error('keterangan','<div class="text-small text-danger">','</div>') ?>
              </div>
              <div class="form-group <?=form_error('nama_file')?'has-error': null?>">
                <label for="nama_file">Nama File</label>
                <?php if($page=='edit') {
                  if($row->nama_file!=null)
                  { ?>
                    <div style="margin-bottom:4px">
                      <img src="<?=base_url('uploads/surat_keluar/'.$row->nama_file)?>" style="width:20%" alt="">
                    </div>
                    <?php
                  }
                }?>
                <input type="file" name="nama_file" class="form-control" id="nama_file" required placeholder="Nama File" value="<?= $row->nama_file ?>">
                <small>(Silahkan <?=$page=='edit'? 'Mengganti Jika Ada Revisi Di ' : 'Upload' ?> File Surat)</small>
                <?= form_error('keterangan','<div class="text-small text-danger">','</div>') ?>
              </div>
              <div class="form-group <?=form_error('nama_file')?'has-error': null?>">
                <label for="ket_verifikator3">Keterangan Revisi</label>
                <textarea type="text" name="ket_verifikator3" class="form-control" id="ket_verifikator3" required placeholder="Keterangan Revisi"><?= $row->ket_verifikator3 ?></textarea>
                <?= form_error('keterangan','<div class="text-small text-danger">','</div>') ?>
              </div>
              <div class="form-group <?=form_error('verifikator3')?'has-error': null?>">
                <label for="verifikator3">Verifikasi</label>
                <select name="verifikator3" id="verifikator3" class="form-control" required>
                    <option value="">- Pilih -</option>
                    <option value="0" <?= $row->verifikator3=='0'?'selected': ''?>>Belum Terverifikasi</option>
                    <option value="1" <?= $row->verifikator3=='1'?'selected': ''?>>Terverifikasi</option>
                </select>
                <?= form_error('keterangan','<div class="text-small text-danger">','</div>') ?>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" name="<?=$page?>" class="btn btn-primary">Simpan</button>
          <button type="reset" class="btn btn-danger">Reset</button>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
</section>