<?php if (!empty($alert->message)): ?>
    <div class="mt-3 alert alert-<?= esc($alert->class) ?> alert-dismissible fade show" role="alert">
        <?= esc($alert->message) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
