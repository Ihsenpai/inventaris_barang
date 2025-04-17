<div class="card">
    <div class="card-header"><?= $title ?></div>
    <div class="card-body">
        <form action="<?= base_url('kategori/store') ?>" method="post">
            <div class="mb-3">
                <label>Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>