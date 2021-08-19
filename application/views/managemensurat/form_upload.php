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
      <form action="<?=site_url('managemensurat/proses')?>" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group <?=form_error('nama_surat')?'has-error': null?>">
                <label for="nama_surat">Nama Surat</label>
                <input type="hidden" name="id" value="<?=$row->id?>">
                <input type="text" name="nama_surat" class="form-control" id="nama_surat" placeholder="Nama Surat" value="<?= $row->nama_surat ?>" required>
                <?= form_error('nama_surat','<div class="text-small text-danger">','</div>') ?>
            </div>
            <div class="form-group <?=form_error('klasifikasi')?'has-error': null?>">
                <label for="klasifikasi">Klasifikasi</label>
                <select name="klasifikasi" id="klasifikasi" class="form-control" required>
                    <option value="">- Pilih -</option>
                    <option value="001 - Surat Undangan" <?= $row->klasifikasi=='001 - Surat Undangan'?'selected': ''?>>001 - Surat Undangan</option>
                    <option value="470 - Surat Kuasa" <?= $row->klasifikasi=='470 - Surat Kuasa'?'selected': ''?>>470 - Surat Kuasa</option>
                </select>
                <?= form_error('klasifikasi','<div class="text-small text-danger">','</div>') ?>
            </div>
            <div class="form-group <?=form_error('module')?'has-error': null?>">
                <label for="module">Module</label>
                <select name="module" id="module" class="form-control" required>
                    <option value="">- Pilih -</option>
                    <option value="Diskominfo" <?= $row->module=='Diskominfo'?'selected': ''?>>Diskominfo</option>
                    <option value="Bapenda" <?= $row->module=='Bapenda'?'selected': ''?>>Bapenda</option>
                </select>
                <?= form_error('module','<div class="text-small text-danger">','</div>') ?>
            </div>
            <div class="form-group <?=form_error('nama_file')?'has-error': null?>">
                <label for="nama_file">Nama File</label>
                <?php if($page=='edit') {
                  if($row->nama_file!=null)
                  { ?>
                    <div style="margin-bottom:4px">
                      <img src="<?=base_url('uploads/template_surat/'.$row->nama_file)?>" style="width:20%" alt="">
                    </div>
                    <?php
                  }
                }?>
                <input type="file" name="nama_file" class="form-control" id="nama_file" required placeholder="Nama File" value="<?= $row->nama_file ?>">
                <small>(Silahkan <?=$page=='edit'? 'Mengganti Jika Ada Revisi Di ' : 'Upload' ?> Template Surat)</small>
                <?= form_error('nama_file','<div class="text-small text-danger">','</div>') ?>
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