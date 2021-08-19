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
      <form action="<?=site_url('crud/proses')?>" method="POST">
        <div class="card-body">
            <div class="form-group <?=form_error('nama')?'has-error': null?>">
                <label for="nama">Nama</label>
                <input type="hidden" name="id" value="<?=$row->id?>">
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" value="<?= $row->nama ?>" required>
                <?= form_error('nama','<div class="text-small text-danger">','</div>') ?>
            </div>
            <div class="form-group <?=form_error('nip')?'has-error': null?>">
                <label for="nip">NIP</label>
                <input type="number" name="nip" class="form-control" id="nip" placeholder="NIP" value="<?= $row->nip ?>" required>
                <?= form_error('nip','<div class="text-small text-danger">','</div>') ?>
            </div>
            <div class="form-group <?=form_error('nomorhp')?'has-error': null?>">
                <label for="nomorhp">Nomor Hp</label>
                <input type="number" name="nomorhp" class="form-control" id="nomorhp" placeholder="Isi Nomor Hp" required value="<?= $row->nomorhp ?>">
                <?= form_error('nomorhp','<div class="text-small text-danger">','</div>') ?>
            </div>
            <div class="form-group <?=form_error('tglizin')?'has-error': null?>">
                <label for="tglizin">Tanggal Izin</label>
                <input type="date" name="tglizin" class="form-control" id="tglizin" value="<?= $row->tglizin ?>" required>
                <?= form_error('tglizin','<div class="text-small text-danger">','</div>') ?>
            </div>
            <div class="form-group <?=form_error('keterangan')?'has-error': null?>">
                <label for="keterangan">Keterangan</label>
                <input type="textarea" name="keterangan" class="form-control" id="keterangan" required placeholder="Keterangan" value="<?= $row->keterangan ?>">
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