<?= $this->extend('layout/sablona') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h2>Úprava typu komponenty</h2>

    <form action="<?= base_url('index.php/kategorie/aktualizovat') ?>" method="post">
        <input type="hidden" name="idKomponent" value="<?= $komponent->idKomponent ?>">

        <div class="mb-3">
            <label for="typKomponent" class="form-label">Název typu komponenty</label>
            <input type="text" name="typKomponent" id="typKomponent" class="form-control" value="<?= esc($komponent->typKomponent) ?>" required>
        </div>

        <div class="mb-3">
            <label for="url" class="form-label">URL</label>
            <input type="text" name="url" id="url" class="form-control" value="<?= esc($komponent->url) ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Uložit změny</button>
    </form>
</div>

<?= $this->endSection() ?>
