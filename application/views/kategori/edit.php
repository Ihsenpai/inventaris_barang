<div class="card">
    <div class="card-header"><?= $title ?></div>
    <div class="card-body">
        <form action="<?= base_url('kategori/update/'.$kategori->id_kategori) ?>" method="post">
            <div class="mb-3">
                <label>Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control" 
                       value="<?= $kategori->nama_kategori ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>