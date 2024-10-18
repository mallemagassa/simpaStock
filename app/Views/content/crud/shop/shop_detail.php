<?= $this->extend('layouts/_default/dashboard') ?> 

<?= $this->section('content') ?>


<div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
    <div class="w-full mb-1">
        <div class="mb-4">
            <nav class="flex mb-5" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                  <li class="inline-flex items-center">
                    <a href="#" class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                      <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                      Accueil
                    </a>
                  </li>
                  <li>
                    <div class="flex items-center">
                      <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                      <a href="#" class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">E-commerce</a>
                    </div>
                  </li>
                  <li>
                    <div class="flex items-center">
                      <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                      <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500" aria-current="page">Boutique</span>
                    </div>
                  </li>
                </ol>
            </nav>
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">La Boutique de <?=esc($shop['respon'])?></h1>
        </div>

    </div>
</div>


<div class="p-4 bg-white block border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
    <div class="grid w-full max-w-5xl mx-auto grid-cols-1 gap-4 mt-4 xl:grid-cols-2 2xl:grid-cols-3">
        <div class="w-full mb-1">
            
        </div>
        <div class="w-full mb-1">
            <div class="text-center">
                <h3 class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white"><?= esc($shop['name']) ?></h3>
                <img class="" 
                     src="<?= isset($shop['logo_shop']) && $shop['logo_shop'] ? base_url(esc($shop['logo_shop'])) : base_url('assets/images/boutique/shop.png') ?>" 
                     alt="<?= esc($shop['logo_shop']) ? esc($shop['logo_shop']) : 'Image par défaut' ?>">
                <p class="flex items-center justify-center text-base font-normal text-gray-500 dark:text-gray-400">
                    <?= esc($shop['address']) ?>
                </p>
            </div>
        </div>
        <div class="w-full mb-1">
            
        </div>
    </div>
</div>



<div class="flex flex-col">
    <div class="overflow-x-auto">
        <div class="inline-block min-w-full align-middle">
            <div class="overflow-hidden shadow">
                <!-- Formulaire de filtrage -->
            <div class="mb-4">
                <form id="filterForm" class="flex md:justify-center flex-wrap items-center space-x-4 p-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <!-- Label et Sélection pour le filtre -->
                    <div class="flex flex-col">
                        <label for="period" class="text-sm font-medium text-gray-900 dark:text-gray-300">Filtrer par:</label>
                        <select name="period" id="period" class="w-full p-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="today">Aujourd'hui</option>
                            <option value="this_week">Cette semaine</option>
                            <option value="this_month">Ce mois-ci</option>
                            <option value="this_year">Cette année</option>
                        </select>
                    </div>

                    <!-- Label et Input pour la date de début -->
                    <div class="flex flex-col">
                        <label for="start_date" class="text-sm font-medium text-gray-900 dark:text-gray-300">Date de début:</label>
                        <input type="date" name="start_date" id="start_date" class="w-full p-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>

                    <!-- Bouton Filtrer -->
                    
                    <button type="submit" class="relative mt-6 inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                        <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                            Valider la Filtre
                        </span>
                    </button>
                </form>

            </div>

            <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="checkbox-all" aria-describedby="checkbox-1" type="checkbox" class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-all" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Produit
                        </th>
                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Prix Achat
                        </th>
                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Prix Vente
                        </th>
                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Montant total
                        </th>
                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Bénefice
                        </th>
                    </tr>
                </thead>
                <tbody id="outsBody" class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                    <?php 
                    // Filtrer les $outs en fonction de la date si des paramètres de filtre sont présents
                    if (isset($_GET['period']) && isset($_GET['start_date'])) {
                        $period = $_GET['period'];
                        $startDate = new DateTime($_GET['start_date']);
                        $filteredOuts = array_filter($outs, function($out) use ($period, $startDate) {
                            $createdAt = new DateTime($out['created_at']);
                            switch ($period) {
                                case 'today':
                                    return $createdAt->format('Y-m-d') === $startDate->format('Y-m-d');
                                case 'this_week':
                                    return $createdAt >= $startDate && $createdAt <= (clone $startDate)->modify('+6 days');
                                case 'this_month':
                                    return $createdAt->format('Y-m') === $startDate->format('Y-m');
                                case 'this_year':
                                    return $createdAt->format('Y') === $startDate->format('Y');
                                default:
                                    return true;
                            }
                        });
                    } else {
                        $filteredOuts = $outs; // Affiche tout par défaut
                    }

                    foreach ($filteredOuts as $value) : ?>
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-<?= esc($value['id']) ?>" aria-describedby="checkbox-1" type="checkbox"
                                        class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-<?= esc($value['id']) ?>" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                <div class="text-base font-semibold text-gray-900 dark:text-white"><?php 
                                    $filteredProducts = array_filter($products, fn($product) => $product['id'] === $value['product_id']);
                                    $filteredProducts = array_values($filteredProducts);
                                    echo($filteredProducts[0]['name']);
                                ?></div>
                            </td>
                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= number_format(esc($filteredProducts[0]['purchase_price']), 0, '.', ' ') ?> F CFA</td>
                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= number_format(esc($filteredProducts[0]['sale_price']), 0, '.', ' ') ?> F CFA</td>
                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= number_format(esc($filteredProducts[0]['sale_price']) + esc($filteredProducts[0]['purchase_price']), 0, '.', ' ') ?> F CFA</td>
                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= number_format(esc($filteredProducts[0]['sale_price']) - esc($filteredProducts[0]['purchase_price']), 0, '.', ' ') ?> F CFA</td>
                        </tr>
                    <?php endforeach ?>               
                </tbody>
            </table>

            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {
    // Gestion du formulaire de filtrage
    $('#filterForm').on('submit', function(e) {
        e.preventDefault();

        // Récupérer les valeurs du formulaire
        var period = $('#period').val();
        var startDate = $('#start_date').val();

        // Effectuer la requête AJAX
        $.ajax({
            url: '/filterOut',
            method: 'POST',
            data: {
                period: period,
                start_date: startDate
            },
            success: function(response) {
                    console.log(response); // Ajoutez ceci pour voir la réponse dans la console
                    $('#productsBody').empty();

                    // Assurez-vous que response est un tableau
                    if (Array.isArray(response)) {
                        response.forEach(function(product) {
                            $('#productsBody').append(
                                '<tr>' +
                                    '<td>' + product.name + '</td>' +
                                    '<td>' + numberFormat(product.purchase_price) + ' F CFA</td>' +
                                    '<td>' + numberFormat(product.sale_price) + ' F CFA</td>' +
                                    '<td>' + product.created_at + '</td>' +
                                '</tr>'
                            );
                        });
                    } else {
                        console.error("La réponse n'est pas un tableau");
                    }
                }
        });
    });

    // Fonction pour formater les nombres
    function numberFormat(number) {
        return new Intl.NumberFormat('fr-FR', { minimumFractionDigits: 0 }).format(number);
    }
});
</script>

<?= $this->endSection() ?>