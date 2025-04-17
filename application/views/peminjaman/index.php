<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5>Data Peminjaman</h5>
        <a href="<?= base_url('barang') ?>" class="btn btn-primary">Pinjam Barang</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Tanggal Pinjam</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($peminjaman as $index => $p): ?>
                <tr>
                    <td><?= $index+1 ?></td>
                    <td><?= $p->nama_barang ?></td>
                    <td><?= $p->jumlah ?></td>
                    <td><?= date('d/m/Y', strtotime($p->tanggal_peminjaman)) ?></td>
                    <td>
                        <?php if($p->status == 'dikembalikan'): ?>
                            <span class="badge bg-success">Kembali</span>
                        <?php else: ?>
                            <span class="badge bg-warning">Dipinjam</span>
                        <?php endif; ?>
                    </td>

                    <td>
                        <?php if($p->status == 'dipinjam'): ?>
                            <a href="<?= base_url('pengembalian/kembali/'.$p->id_peminjaman) ?>" 
                            class="btn btn-sm btn-success" 
                            onclick="return confirm('Konfirmasi pengembalian?')">
                                Kembali
                            </a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>