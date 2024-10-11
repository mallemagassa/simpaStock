<?= $this->extend('layouts/_default/baseof') ?>

<?= $this->section('main') ?>
<?= $this->include('layouts/partials/navbar-dashboard') ?> <!-- Inclure la barre de navigation du tableau de bord -->

<div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
  <?= $this->include('layouts/partials/sidebar') ?> <!-- Inclure la barre latérale -->

  <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
    <main>
      <?= $this->renderSection('content') ?> <!-- Contenu spécifique du tableau de bord -->
    </main>

    <?php if (isset($footer) && $footer): ?>
      <?= $this->include('layouts/partials/footer-dashboard') ?> <!-- Inclure le pied de page du tableau de bord -->
    <?php endif; ?>
  </div>
</div>
<?= $this->endSection() ?>


