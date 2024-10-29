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
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">La Boutique de <?=esc($shop['firstname'])?> <?=esc($shop['lastname'])?></h1>
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

            <div class="flex justify-end mx-4 my-4">
                <form id="filterForm" class="flex items-center space-x-2">
                    <label for="start_date" class="font-medium text-gray-700 dark:text-gray-300">Date de début:</label>
                    <input 
                        type="date" 
                        id="start_date" 
                        name="start_date" 
                        required 
                        class="border border-gray-300 rounded-md shadow-sm p-2 focus:outline-none focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:focus:ring-primary-500"
                    >
                    <button 
                        type="submit" 
                        class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800 my-2"
                    >
                        Filtrer
                    </button>
                </form>
            </div>

            <div class="flex justify-center my-4">
                <button id="filterToday" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Aujourd'hui</button>
                <button id="filterWeek" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Cette Semaine</button>
                <button id="filterMonth" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Ce Mois</button>
                <button id="filterYear" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Cette Année</button>
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
                            Quantité
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
                    foreach ($outs as $value) : ?>
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
                                    
                                    $filteredStocks = array_filter($stocks, fn($stock) => $stock['id'] === $value['product_id']);
                                    $filteredStocks = array_values($filteredStocks);
                                    
                                    echo($filteredProducts[0]['name']);
                                ?></div>
                            </td>
                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= esc($value['quantity']) ?></td>
                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= number_format(esc($filteredStocks[0]['purchase_price']), 0, '.', ' ') ?> F CFA</td>
                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= number_format(esc($filteredStocks[0]['sale_price']), 0, '.', ' ') ?> F CFA</td>
                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= number_format(esc($value['amount_total']), 0, '.', ' ') ?> F CFA</td>
                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= number_format(esc($value['profit']), 0, '.', ' ') ?> F CFA</td>
                        </tr>
                    <?php endforeach; 
                ?>
            </tbody>

            </table>

            </div>
        </div>
    </div>
</div>


<script>
    
    $(document).ready(function() {
    $('#filterForm').on('submit', function(e) {
        e.preventDefault();
        
        var startDate = $('#start_date').val();

        $.ajax({
            url: '/filterOut',
            method: 'POST',
            data: {
                start_date: startDate
            },
            success: function(response) {
                $('#outsBody').empty();

                if (Array.isArray(response) && response.length > 0) {
                    response.forEach(function(out) {
                        $('#outsBody').append(
                            '<tr class="hover:bg-gray-100 dark:hover:bg-gray-700">' +
                                '<td class="w-4 p-4">' +
                                    '<div class="flex items-center">' +
                                        '<input id="checkbox-' + out.id + '" aria-describedby="checkbox-1" type="checkbox" class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">' +
                                        '<label for="checkbox-' + out.id + '" class="sr-only">checkbox</label>' +
                                    '</div>' +
                                '</td>' +
                                '<td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">' +
                                    '<div class="text-base font-semibold text-gray-900 dark:text-white">' + out.name + '</div>' +
                                '</td>' +
                                '<td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">' + numberFormat(out.purchase_price) + ' F CFA</td>' +
                                '<td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">' + numberFormat(out.sale_price) + ' F CFA</td>' +
                                '<td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">' + out.quantity + '</td>' +
                                '<td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">' + numberFormat(out.amount_total) + ' F CFA</td>' +
                                '<td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">' + numberFormat(out.profit) + ' F CFA</td>' +
                            '</tr>'
                        );
                    });
                } else {
                    $('#outsBody').append(
                        "<tr><td colspan='7' class='p-4 text-center text-gray-500 dark:text-gray-400'>Aucun enregistrement trouvé.</td></tr>"
                    );
                }
            },
            error: function(xhr, status, error) {
                console.error("Erreur AJAX: " + error);
            }
        });
    });
});

function numberFormat(number) {
    return new Intl.NumberFormat('fr-FR', { minimumFractionDigits: 0 }).format(number);
}


$(document).ready(function() {
    $('#filterToday, #filterWeek, #filterMonth, #filterYear').click(function() {
        const filterType = $(this).attr('id').replace('filter', '').toLowerCase();

        $.ajax({
            url: '/filterOuts',  // Assurez-vous que l'URL est correcte
            type: 'POST',
            data: { filter: filterType },
            dataType: 'json',
            success: function(data) {
                $('#outsBody').empty();
                data.forEach(function(out) {
                    $('#outsBody').append(`
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-${out.id}" type="checkbox" class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                                </div>
                            </td>
                            <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                <div class="text-base font-semibold text-gray-900 dark:text-white">${out.product_name}</div>
                            </td>
                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">${out.purchase_price} F CFA</td>
                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">${out.sale_price} F CFA</td>
                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">${out.quantity}</td>
                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">${out.amount_total} F CFA</td>
                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">${out.profit} F CFA</td>
                        </tr>
                    `);
                });
            },
            error: function(xhr, status, error) {
                console.error('Erreur de récupération des données:', error);
            }
        });
    });
});



</script>

<?= $this->endSection() ?>