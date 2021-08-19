<section class="content">
    <form action="<?=site_url('proses/upload')?>" method="POST" enctype="multipart/form-data">
    <div>
        <label>Foto</label>
        <br>
        <input type="file" name="foto">
    </div>
    <div style="margin-top: 1rem">
        <button type="submit">Upload</button>
    </div>
    </form>
</section>