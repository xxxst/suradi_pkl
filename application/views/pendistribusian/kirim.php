<section class="content">
    <div class="container fluid">
        <div class="content md-3">
            <div class="animated fadein">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <strong>Kirim Surat</strong>
                        </div>
                        <div class="float-right">
                            <a href="<?=site_url('pendistribusian')?>" class="btn btn-secondary btn-xs"><i class="fas fa-undo"></i> Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-md-4 offset-md-4">
                            <form action="<?=site_url('pendistribusian/proseskirim')?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group <?=form_error('nama_surat')?'has-error': null?>">
                                <label for="nama_surat">Nama Surat</label>
                                <input type="hidden" name="id" value="<?=$row->id?>">
                                <input type="text" name="nama_surat" class="form-control" id="nama_surat" placeholder="Nama Surat" value="<?= $row->nama_surat ?>" required>
                                <?= form_error('nama_surat','<div class="text-small text-danger">','</div>') ?>
                            </div>
                            <div class="form-group <?=form_error('nomorsurat')?'has-error': null?>">
                                <label for="nomorsurat">Nomor Surat</label>
                                <input type="text" name="nomorsurat" class="form-control" disabled id="nomorsurat" placeholder="" required value="<?php echo $row->klasifikasi; ?>/<?php echo $row->nomorurut == 0 ?"<b>Pending</b>" : "$row->nomorurut"; ?>/<?php echo $row->module== "Diskominfo" ?"35.73.04.1007" : "$row->nomorurut"; ?>/<?= date('Y') ?>">
                                <?= form_error('nomorsurat','<div class="text-small text-danger">','</div>') ?>
                            </div>
                            <div class="form-group <?=form_error('module')?'has-error': null?>">
                                <label for="module">Pengirim</label>
                                <input type="text" name="module" class="form-control" id="module" placeholder="Module" required value="<?= $row->module ?>">
                                <?= form_error('module','<div class="text-small text-danger">','</div>') ?>
                            </div>
                            <div class="form-group <?=form_error('tujuan')?'has-error': null?>">
                                <label for="tujuan">Tujuan</label>
                                <input type="text" name="tujuan" class="form-control" id="tujuan" placeholder="tujuan" required value="<?= $row->tujuan ?>">
                                <?= form_error('tujuan','<div class="text-small text-danger">','</div>') ?>
                            </div>
                            <button type="submit" name="<?=$page?>"  onclick="return confirm ('Apakah anda yakin verifikasi data?')" class="btn btn-success btn-sm">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>