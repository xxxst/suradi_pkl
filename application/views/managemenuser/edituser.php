<section class="content">
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-dark">
      <div class="card-header">
        <h3 class="card-title">Cek Data User !</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <!-- ?php echo validation_errors(); ?> -->
      <form action="" method="POST">
        <div class="card-body">
            <div class="form-group <?=form_error('username')?'has-error': null?>">
                <input type="hidden" name="id" value="<?=$row->id?>">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Isi Username" value="<?= $this->input->post('username') ?? $row->username ?>">
                <?= form_error('username','<div class="text-small text-danger">','</div>') ?>
            </div>
            <div class="form-group <?=form_error('password')?'has-error': null?>">
                <label for="password">Password</label> <small>(Biarkan kosong jika tidak diganti)</small>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="<?= $this->input->post('password') ?>">
                <?= form_error('password','<div class="text-small text-danger">','</div>') ?>
            </div>
            <div class="form-group <?=form_error('nama')?'has-error': null?>">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" value="<?= $this->input->post('nama') ?? $row->nama ?>">
                <?= form_error('nama','<div class="text-small text-danger">','</div>') ?>
            </div>
            <div class="form-group <?=form_error('nip')?'has-error': null?>">
                <label for="nip">NIP</label>
                <input type="text" name="nip" class="form-control" id="nip" placeholder="NIP" value="<?= $this->input->post('nip') ?? $row->nip ?>">
                <?= form_error('nip','<div class="text-small text-danger">','</div>') ?>
            </div>
            <div class="form-group <?=form_error('level')?'has-error': null?>">
                <label>Level</label>
                <select name="level" class="form-control">
                    <?php $level=$this->input->post('level') ?? $row->level ?>
                    <option value="1" <?= $level == 1 ? 'selected' : null ?>>Admin</option>
                    <option value="2" <?= $level == 2 ? 'selected' : null ?>>Staff</option>
                    <option value="3" <?= $level == 3 ? 'selected' : null ?>>Kasi</option>
                    <option value="4" <?= $level == 4 ? 'selected' : null ?>>Kabid</option>
                    <option value="5" <?= $level == 5 ? 'selected' : null ?>>Sekdin</option>
                    <option value="6" <?= $level == 6 ? 'selected' : null ?>>Kadin</option>
                </select>
                <?= form_error('level','<div class="text-small text-danger">','</div>') ?>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="reset" class="btn btn-danger">Reset</button>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
</section>