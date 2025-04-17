<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5>Data Kategori</h5>
        <a href="<?= base_url('kategori/create') ?>" class="btn btn-success">Tambah Kategori</a>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($kategori as $index => $k): ?>
                <tr>
                    <td><?= $index+1 ?></td>
                    <td><?= $k->nama_kategori ?></td>
                    <td>
                        <a href="<?= base_url('kategori/edit/'.$k->id_kategori) ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?= base_url('kategori/delete/'.$k->id_kategori) ?>" 
                           class="btn btn-sm btn-danger" 
                           onclick="return confirm('Yakin hapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>