<div class="card">
    <div class="card-header">
        <?= $title ?>
    </div>
    <div class="card-body">
        <form action="<?= base_url('barang/store') ?>" method="post">
            <div class="mb-3">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Kategori</label>
                <select name="id_kategori" class="form-select" required>
                    <option value="">Pilih Kategori</option>
                    <?php foreach($kategori as $k): ?>
                    <option value="<?= $k->id_kategori ?>"><?= $k->nama_kategori ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label>Stok</label>
                <input type="number" name="stok" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>