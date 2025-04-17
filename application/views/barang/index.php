<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5>Data Barang</h5>
        <a href="<?= base_url('barang/create') ?>" class="btn btn-success">Tambah Barang</a>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($barang as $index => $b): ?>
                <tr>
                    <td><?= $index+1 ?></td>
                    <td><?= $b->nama_barang ?></td>
                    <td><?= $b->nama_kategori ?></td>
                    <td><?= $b->stok ?></td>
                    <td>
                        <a href="<?= base_url('barang/edit/'.$b->id_barang) ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?= base_url('barang/delete/'.$b->id_barang) ?>" 
                           class="btn btn-sm btn-danger" 
                           onclick="return confirm('Yakin hapus?')">Hapus</a>
                           <a href="<?= base_url('peminjaman/pinjam/'.$b->id_barang) ?>" 
                            class="btn btn-sm btn-primary <?= ($b->stok < 1) ? 'disabled' : '' ?>">
                            Pinjam
                            </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>