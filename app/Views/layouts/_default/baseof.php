<!doctype html>
<html lang="en" class="dark">
<?= $this->include('layouts/partials/header.php') ?>

<body class="<?= isset($white_bg) && $white_bg ? 'bg-white dark:bg-gray-900' : 'bg-gray-50 dark:bg-gray-800' ?>">
  <?= $this->include('layouts/partials/skippy.php') ?>

  <?= $this->renderSection('main') ?> 

  <?= $this->include('layouts/partials/scripts.php') ?>
</body>
</html>
