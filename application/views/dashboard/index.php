<div class="row">
    <div class="col-md-3">
        <div class="card text-bg-primary mb-3">
        <div class="card-header">Total Barang</div>
        <div class="card-body">
            <h5 class="card-title"><?= $total_barang ?></h5>
    </div>
</div>
    </div>
    
    <div class="col-md-3">
        <div class="card text-bg-success mb-3">
            <div class="card-header">Kategori</div>
            <div class="card-body">
                <h5 class="card-title"><?= $total_kategori ?></h5>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card text-bg-warning mb-3">
            <div class="card-header">Peminjaman Aktif</div>
            <div class="card-body">
                <h5 class="card-title"><?= $total_peminjaman ?></h5>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card text-bg-danger mb-3">
            <div class="card-header">Pengembalian</div>
            <div class="card-body">
                <h5 class="card-title"><?= $total_pengembalian ?></h5>
            </div>
        </div>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header">Barang Terakhir Ditambahkan</div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($barang_terakhir as $b): ?>
                <tr>
                    <td><?= $b->nama_barang ?></td>
                    <td><?= $b->nama_kategori ?></td>
                    <td><?= $b->stok ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>