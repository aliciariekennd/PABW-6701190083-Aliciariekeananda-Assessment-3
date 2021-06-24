<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="ScreenOrientation" content="autoRotate:disabled">
    <meta name="<?= csrf_token() ?>" content="<?= csrf_hash() ?>">
    <title>CRUD</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/datatables.min.css') ?>">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
</head>

<body>
    <?= $this->renderSection('content') ?>
    <!-- Jquery JS -->
    <!-- Bootstrap JS -->
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <!-- Datatables JS -->
    <script src="<?= base_url('assets/js/datatables.min.js') ?>"></script>
</body>

</html>