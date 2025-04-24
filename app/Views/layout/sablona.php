<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komponenty</title>
    <?= $this->include("layout/sablonacss");?>
</head>
<div class="container">
<body>

    <div class="container">
        <?= $this->include('layout/alert') ?>  
        <?= $this->renderSection('content') ?>
    </div>









    <?= $this->renderSection("content"); ?> 
    </div>
</div>
</body>
</html>