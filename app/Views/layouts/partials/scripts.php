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
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script type="text/javascript">
            $(document).ready(function() {
                $('.selectpicker').select2();
            });
   </script>

  <script type="text/javascript">
        $(document).ready(function() {
            $('#product-update').select2();
        });
    </script>


  <script>
    
    const dataTable = new simpleDatatables.DataTable("#default-table");
    const customData = {
      "headings": [
          "Name",
          "Company",
          "Date",
      ],
      "data": [
          [
              "Flowbite",
              "Bergside",
              "05/23/2023",
          ],
          [
              "Next.js",
              "Vercel",
              "03/12/2024",
        ]
      ],
  };

if (document.getElementById("default-table") && typeof simpleDatatables.DataTable !== 'undefined') {
    const dataTable = new simpleDatatables.DataTable("#default-table", {

        searchable: true,
        sortable: true,
        numeric: true,
        paging: true, // enable or disable pagination
        perPage: 10, // set the number of rows per page
        perPageSelect: [5, 10, 20, 50], // set the number of rows per page options
        firstLast: true, // enable or disable the first and last buttons
        nextPrev: true, // enable or disable the next and previous buttons
        //caption: "Flowbite is an open-source library",
        classes: {
            active: "bg-primary-500 text-white", // style actif pour pagination ou sélection
            bottom: "flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-800", // zone de pagination et informations
            container: "w-full overflow-hidden shadow-lg rounded-lg", // conteneur principal de la table
            cursor: "cursor-pointer", // style de curseur
            dropdown: "relative", // conteneur du menu déroulant
            ellipsis: "truncate", // pour les textes longs
            empty: "text-center text-gray-500 dark:text-gray-400 py-4", // style lorsqu’il n'y a pas de données
            headercontainer: "bg-gray-100 dark:bg-gray-700 p-2", // conteneur de l’en-tête
            info: "text-sm text-gray-600 dark:text-gray-400 p-2", // style des informations de pagination
            input: "w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100", // champ de recherche
            loading: "text-center text-gray-500 dark:text-gray-400 py-4", // texte de chargement
            pagination: "flex items-center space-x-1", // conteneur des boutons de pagination
            paginationList: "flex space-x-1", // liste de pagination
            search: "flex justify-end p-2", // conteneur de la barre de recherche
            selector: "w-20 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100", // sélecteur de page
            sorter: "text-gray-600 dark:text-gray-300 cursor-pointer", // icône de tri
            table: "min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600", // tableau principal
            top: "flex flex-col", // section supérieure
            wrapper: "overflow-x-auto", // co
            th: "p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400",
            tr: "hover:bg-gray-100 dark:hover:bg-gray-700",
            td: "text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400",
        },
        footer: true,
        header: true,
        labels: {
            placeholder: "Rechercher...",
            perPage: "{select} éléments par page",
            noRows: "Aucun résultat trouvé",
            info: "Affichage de {start} à {end} sur {rows} éléments",
        },
        scrollY: "300px",
        data: customData
    });
}


 
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