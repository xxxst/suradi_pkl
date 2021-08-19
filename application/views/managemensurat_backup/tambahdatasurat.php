<section class="content">
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Isikan Data Surat !</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <!-- ?php echo validation_errors(); ?> -->
        <?php 
        if(isset($error))
        {
            echo "ERROR UPLOAD : <br/>";
            print_r($error);
            echo "<hr/>";
        }
        ?>
        <form action="<?php echo base_url('managemensurat/proses')?>" method="POST" enctype="multipart/form-data">
        <div class="container-fluid row">
                <div class="card-body col-md-6">
                    <div class="form-group">
                        <label for="namasurat">Nama Surat</label>
                        <input type="text" name="namasurat" class="form-control" id="namasurat" placeholder="Isi Nama Surat" value="<?= set_value('namasurat') ?>" required>
                        <?= form_error('namasurat','<div class="text-small text-danger">','</div>') ?>
                    </div>
                    <div class="form-group">
                        <label>Klasifikasi</label>
                        <select name="klasifikasi" class="form-control">
                            <option value="001 - Surat Undangan" <?= set_value('klasifikasi') == 1 ? "selected" : null?>>001 - Surat Undangan</option>
                            <option value="470 - Surat Kuasa" <?= set_value('klasifikasi') == 2 ? "selected" : null?>>470 - Surat Kuasa</option>
                            <option value="474 - Surat Keterangan" <?= set_value('klasifikasi') == 3 ? "selected" : null?>>474 - Surat Keterangan</option>
                        </select>
                        <?= form_error('level','<div class="text-small text-danger">','</div>') ?>
                    </div>
                    <div class="form-group">
                        <label>Module</label>
                        <select name="module" class="form-control">
                            <option value="Diskominfo" <?= set_value('module') == 1 ? "selected" : null?>>Diskominfo</option>
                            <option value="Bapenda" <?= set_value('module') == 2 ? "selected" : null?>>Bapenda</option>
                            <option value="Kelurahan Karangbesuki" <?= set_value('module') == 3 ? "selected" : null?>>Kelurahan Karangbesuki</option>
                        </select>
                        <?= form_error('module','<div class="text-small text-danger">','</div>') ?>
                    </div>
                </div>
                <div class="card-body col-md-6">
                    <div class="form-group">
                        <label for="berkas">File Surat</label>
                        <input type="file" name="berkas" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="keterangan_berkas">Keterangan</label>
                        <input type="text" name="keterangan_berkas" class="form-control" id="keterangan_berkas" placeholder="Keterangan" value="<?= set_value('keterangan_berkas') ?>">
                        <?= form_error('keterangan_berkas','<div class="text-small text-danger">','</div>') ?>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="is_active" class="form-control">
                            <option value="0" <?= set_value('is_active') == 1 ? "selected" : null?>>Tidak Aktif</option>
                            <option value="1" <?= set_value('is_active') == 2 ? "selected" : null?>>Aktif</option>
                        </select>
                        <?= form_error('is_active','<div class="text-small text-danger">','</div>') ?>
                    </div>
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