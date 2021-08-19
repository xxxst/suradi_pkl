<form action="<?=base_url('naskahkeluar/tambahinputnaskahkeluar')?>" method="POST">
    <div class="form-group">
        <label>Tanggal Naskah</label>
        <input type="date" name="tglnaskah" class="form-control">
        <?= form_error('tglnaskah','<div class="text-small text-danger">','</div>') ?>
    </div>
    <div class="form-group">
        <label>Penandatanganan</label>
        <input type="text" name="penandatanganan" class="form-control">
        <?= form_error('tglnaskah','<div class="text-small text-danger">','</div>') ?>
    </div>
    <div class="form-group">
        <label>Klasifikasi</label>
        <input type="text" name="klasifikasi" class="form-control">
        <?= form_error('tglnaskah','<div class="text-small text-danger">','</div>') ?>
    </div>
    <div class="form-group">
        <label>Jenis Naskah</label>
        <input type="text" name="jenisnaskah" class="form-control">
        <?= form_error('tglnaskah','<div class="text-small text-danger">','</div>') ?>
    </div>
    <div class="form-group">
        <label>Tujuan Surat</label>
        <input type="text" name="tujuansurat" class="form-control">
        <?= form_error('tglnaskah','<div class="text-small text-danger">','</div>') ?>
    </div>
    <div class="form-group">
        <label>Keterangan</label>
        <input type="text" name="keterangan" class="form-control">
        <?= form_error('tglnaskah','<div class="text-small text-danger">','</div>') ?>
    </div>
    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
    <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
</form>