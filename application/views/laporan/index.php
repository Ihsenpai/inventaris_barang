<div class="card">
    <div class="card-header">
        Laporan Peminjaman
    </div>
    <div class="card-body">
        <form action="<?= base_url('laporan/filter') ?>" method="post" class="mb-3">
            <div class="row">
                <div class="col-md-5">
                    <input type="date" name="tgl_awal" class="form-control" required>
                </div>
                <div class="col-md-5">
                    <input type="date" name="tgl_akhir" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                </div>
            </div>
        </form>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Tanggal Pinjam</th>
                    <th>Status</th>
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
                        <?php if($p->total_kembali >= $p->jumlah): ?>
                            <span class="badge bg-success">Kembali</span>
                        <?php else: ?>
                            <span class="badge bg-warning">Dipinjam</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>