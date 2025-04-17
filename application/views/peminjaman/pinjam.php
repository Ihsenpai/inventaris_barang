<div class="card">
    <div class="card-header"><?= $title ?></div>
    <div class="card-body">
        <form action="<?= base_url('peminjaman/store') ?>" method="post">
            <input type="hidden" name="id_barang" value="<?= $barang->id_barang ?>">
            
            <div class="mb-3">
                <label>Nama Barang</label>
                <input type="text" class="form-control" value="<?= $barang->nama_barang ?>" readonly>
            </div>
            
            <div class="mb-3">
                <label>Stok Tersedia</label>
                <input type="number" class="form-control" value="<?= $barang->stok ?>" readonly>
            </div>
            
            <div class="mb-3">
                <label>Jumlah Pinjam</label>
                <input type="number" name="jumlah" class="form-control" 
                       max="<?= $barang->stok ?>" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Proses Pinjam</button>
        </form>
    </div>
</div>