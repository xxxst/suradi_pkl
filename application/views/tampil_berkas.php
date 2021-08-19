<html>
    <head>
        <title></title>
    </head>
    <body>
        <h3><center>Tampil Berkas</center></h3>
        <hr/>
        <a href="<?php echo base_url(); ?>index.php/upload/create">Tambah Berkas</a>
        <hr/>
        <table border="1" width="75%" style="text-align:center;">
            <tr>
                <th>No</th>
                <th>Image</th>
                <th>Keterangan</th>
                <th>Action</th>
            </tr>
            <?php 
                $no = 1;
                foreach($berkas->result() as $row)
                {
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><img width="100 " src="<?php echo base_url(); ?>uploads/<?php echo $row->nama_berkas; ?>"/></td>
                        <td><?php echo $row->keterangan_berkas; ?></td>
                        <td><a href="<?php echo base_url(); ?>index.php/upload/download/<?php echo $row->kd_berkas; ?>">Download</a></td>
                    </tr>
                    <?php
                }
            ?>
        </table>
    </body>
</html>