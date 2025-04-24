<?=$this->extend("layout/sablona");?>
<?=$this->section("content");?>

<div class="container mt-5">
    <h2 class="text-center">Seznam typů komponent</h2>
    <a href="<?= base_url('index.php/taby') ?>" class="btn btn-primary btn-lg">Taby</a>
    <div class="row">
        <?php foreach ($komponenty as $komponent): ?>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">
                        <?= anchor('komponenty/' . $komponent->url, esc($komponent->typKomponent), ['class' => 'text-decoration-none']) ?>
                    </h5>
                    <a href="<?= base_url('index.php/kategorie/editovat/' . $komponent->idKomponent) ?>" class="btn btn-warning btn-sm">Editovat</a>
                    
                    <!-- Tlačítko pro otevření modálního okna -->
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $komponent->idKomponent ?>">
                        Smazat
                    </button>

                    <!-- Modální okno -->
                    <div class="modal fade" id="deleteModal<?= $komponent->idKomponent ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $komponent->idKomponent ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel<?= $komponent->idKomponent ?>">Potvrzení smazání</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Zavřít"></button>
                                </div>
                                <div class="modal-body">
                                    Opravdu chcete smazat tuto kategorii a všechny její komponenty?
                                </div>
                                <div class="modal-footer">
                                    <form action="<?= base_url('index.php/kategorie/smazat/' . esc($komponent->idKomponent)) ?>" method="post">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger">Smazat</button>
                                    </form>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zrušit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <div class="text-center mt-4">
            <a href="<?= base_url("index.php/kategorie/pridat") ?>" class="btn btn-sm btn-primary">Přidat novou kategorii</a>
        </div>
    </div>
</div>

<?=$this->endSection();?>