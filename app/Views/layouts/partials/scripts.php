<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="<?= base_url('/assets/js/') ?>/app.bundle.js"></script>
<script src="<?= base_url('/assets/js/') ?>/index.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/datepicker.min.js"></script>
 <!-- FilePond JS -->
 <script src="<?= base_url('node_modules/filepond/dist/filepond.min.js') ?>"></script>
  <script src="<?= base_url('node_modules/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js') ?>"></script>
  <script src="<?= base_url('node_modules/filepond-plugin-file-rename/dist/filepond-plugin-file-rename.js') ?>"></script>
  <script src="<?= base_url('node_modules/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js') ?>"></script>
  <script src="<?= base_url('node_modules/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js') ?>"></script>

  <script>

  FilePond.registerPlugin(FilePondPluginFileValidateSize);
  FilePond.registerPlugin(FilePondPluginFileValidateType);
  FilePond.registerPlugin(FilePondPluginImagePreview);

    const inputElement = document.querySelector('input[type="file"]');


    const pond = FilePond.create(inputElement, {
      acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg'], // Types acceptés
      maxFileSize: '2MB', // Taille maximale des fichiers
      labelFileTypeNotAllowed: 'Format non autorisé',
      labelMaxFileSizeExceeded: 'Le fichier est trop volumineux',
      labelMaxFileSize: 'La taille maximale est de 2 Mo',
      labelIdle: 'Choisir une image pour votre Boutique',
      allowImagePreview: true,
      // instantUpload: false
      // allowProcess:true
      dropOnPage:true,
      dropValidation:true
    });

    FilePond.setOptions({
      server: {
        process: '/shop/tmpUpload',
        revert: '/revert',
        header:{
          'X-CSRF-TOKEN': '<?= csrf_field() ?>'
        }
      }
    });
    
  </script>