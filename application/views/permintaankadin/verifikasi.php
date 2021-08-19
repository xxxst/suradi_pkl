<section class="content">
    <div class="container fluid">
        <div class="content md-3">
            <div class="animated fadein">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <strong>Silahkan Verifikasi Surat Ini</strong>
                        </div>
                        <div class="float-right">
                            <a href="<?=site_url('permintaankadin')?>" class="btn btn-secondary btn-xs"><i class="fas fa-undo"></i> Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-md-4 offset-md-4">
                            <form action="<?=site_url('permintaankadin/prosesverifikasi')?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group <?=form_error('nama_surat')?'has-error': null?>">
                                <label for="nama_surat">Nama Surat</label>
                                <input type="hidden" name="id" value="<?=$row->id?>">
                                <input type="text" name="nama_surat" class="form-control" id="nama_surat" placeholder="Nama Surat" value="<?= $row->nama_surat ?>" required>
                                <?= form_error('nama_surat','<div class="text-small text-danger">','</div>') ?>
                            </div>
                            <div class="form-group <?=form_error('penandatanganan')?'has-error': null?>">
                                <label for="penandatanganan">Penandatanganan</label>
                                <input type="text" name="penandatanganan" class="form-control" disabled id="penandatanganan" placeholder="Penandatanganan" required value="<?= $row->penandatanganan ?>">
                                <?= form_error('penandatanganan','<div class="text-small text-danger">','</div>') ?>
                            </div>
                            <div class="form-group <?=form_error('verifikator4')?'has-error': null?>">
                                <label for="verifikator4">Verifikasi</label>
                                <select name="verifikator4" id="verifikator1" class="form-control" required>
                                    <option value="">- Pilih -</option>
                                    <option value="0" <?= $row->verifikator4=='0'?'selected': ''?>>Belum Terverifikasi</option>
                                    <option value="1" <?= $row->verifikator4=='1'?'selected': ''?>>Terverifikasi</option>
                                </select>
                                <?= form_error('keterangan','<div class="text-small text-danger">','</div>') ?>
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