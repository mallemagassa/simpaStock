<?= $this->extend('layouts/_default/baseof') ?> <!-- Étendre la mise en page de base -->

<?= $this->section('main') ?>
<?php if (isset($navigation) && $navigation): ?>
  <?= $this->include('layouts/partials/navbar-main') ?> <!-- Inclure la barre de navigation principale -->
<?php endif; ?>

<main class="bg-gray-50 dark:bg-gray-900">
  <?= $this->renderSection('content') ?> <!-- Contenu spécifique de la page -->
</main>

<?php if (isset($footer) && $footer): ?>
  <?= $this->include('layouts/partials/footer-main') ?> <!-- Inclure le pied de page principal -->
<?php endif; ?>
<?= $this->endSection() ?>
