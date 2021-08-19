<section class="content">
    <div class="card">
        <div class="card-header">
            <a href="<?=base_url('managemenuser/halamantambahuser')?>" class="btn btn-success btn-flat btn-xs"><i class="fas fa-plus"></i> Tambah User</a>
        </div>
        <div class="card-body">
            <table id="example3" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php $id=1; foreach($row->result() as $key => $data){ ?>
                        <tr>
                            <td width="5px"><?= $id++ ?></td>
                            <td width="200px"><?= $data->username ?></td>
                            <td><?= $data->nama ?></td>
                            <td><?= $data->nip ?></td>
                            <td width="80px">
                                <form action="<?=site_url('managemenuser/deleteuser')?>" method="POST">
                                <a href="<?=site_url('managemenuser/halamantedituser/'.$data->id) ?>" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a>
                                    <input type="hidden" name="id" value="<?=$data->id?>">
                                    <button class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>