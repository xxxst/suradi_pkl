<section class="content">
    <div class="card">
        <div class="card-header">
            <h6>Data Surat DISKOMINFO</h6>
        </div>
        <div class="card-body">
            <table id="example3" class="table table-bordered table-striped">
                <thead class="text-center">
                    <tr>
                        <th>No.</th>
                        <th>Nama Surat</th>
                        <th>Klasifikasi</th>
                        <th>Module</th>
                        <th>Nama Surat</th>
                        <th>Action</th>
                </tr>
                </thead>
                <tbody class="text-center">
                <?php $no = 1; foreach($nama_file->result() as $row){?>
                    <tr>
                        <td width="10px"><?php echo $no++; ?></td>
                        <td><?php echo $row->nama_surat; ?></td>
                        <td><?php echo $row->klasifikasi; ?></td>
                        <td><?php echo $row->module; ?></td>
                        <td><?php echo $row->nama_file; ?></td>
                        <td width="30px">
                            <a class="btn btn-success btn-xs btn-flat" href="<?php echo base_url(); ?>managemensurat/download/<?php echo $row->id; ?>">Download</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>