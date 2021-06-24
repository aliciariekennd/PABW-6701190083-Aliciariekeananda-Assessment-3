<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Data
                </div>
                <div class="card-body">
                    <form action="<?= base_url('/'.$data['artikel_id'].'/update') ?>" method="post">
                        <input type="hidden" name="artikel_id" value="<?= $data['artikel_id'] ?>" />
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" class="form-control" placeholder="Judul" required value="<?= $data['judul'] ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label for="konten">Konten</label>
                            <textarea name="konten" class="form-control" cols="30" rows="10"
                                placeholder="Konten"><?= $data['konten'] ?></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-sm btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>