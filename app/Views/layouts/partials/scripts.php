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

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <script>
 
FilePond.registerPlugin(FilePondPluginFileValidateSize);
FilePond.registerPlugin(FilePondPluginFileValidateType);
FilePond.registerPlugin(FilePondPluginImagePreview);


const inputElements = document.querySelectorAll('input[type="file"]');

inputElements.forEach(inputElement => {
  const pond = FilePond.create(inputElement, {
    acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg'],
    maxFileSize: '2MB',
    labelFileTypeNotAllowed: 'Format non autorisé',
    labelMaxFileSizeExceeded: 'Le fichier est trop volumineux',
    labelMaxFileSize: 'La taille maximale est de 2 Mo',
    labelIdle: 'Choisir une image pour votre Boutique',
    allowImagePreview: true,
    dropOnPage: true,
    dropValidation: true
  });

  FilePond.setOptions({
    server: {
      process: '/shop/tmpUpload',
      revert: '/shop/revert',
      headers: {
        'X-CSRF-TOKEN': '<?= csrf_token() ?>'
      }
    }
  });

  document.querySelectorAll('#updateshopButton').forEach(button => {
    button.addEventListener('click', function() {
      const shopLogo = this.getAttribute('data-logo_shop'); 
      pond.removeFiles();

      if (shopLogo) {
        pond.addFile(shopLogo, {
          type: 'local',
          file: {
            name: shopLogo.split('/').pop(),
            size: 1234, 
            type: 'image/jpeg'
          }
        });
      }
    });
  });
});

    
  </script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>