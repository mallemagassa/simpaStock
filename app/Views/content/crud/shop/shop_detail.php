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



            <table  class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="checkbox-all" aria-describedby="checkbox-1" type="checkbox" class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-all" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Bénefice
                        </th>
                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Montant total du vente
                        </th>
                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Montant total d'achat
                        </th>
                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Bordereaux
                        </th>
                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Date de Sortie
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
                                <!--<td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    <div class="text-base font-semibold text-gray-900 dark:text-white"><?php 
                                        // $filteredProducts = array_filter($products, fn($product) => $product['id'] === $value['product_id']);
                                        // $filteredProducts = array_values($filteredProducts);
                                        
                                        // $filteredStocks = array_filter($stocks, fn($stock) => $stock['product_id'] === $value['product_id']);
                                        // $filteredStocks = array_values($filteredStocks);
                                        
                                        // echo($filteredProducts[0]['name']);
                                    ?></div> -->
                                </td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= esc($value['profit']) ?></td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= number_format(esc($value['amount_total_sale']), 0, '.', ' ') ?> F CFA</td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= number_format(esc($value['amount_total_purchase']), 0, '.', ' ') ?> F CFA</td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <button type="button" 
                                    data-modal-target="stock-muliple-modal" 
                                    data-modal-toggle="stock-muliple-modal"
                                    data-product_out='<?= esc($value['product_out']) ?>' 
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                    </svg>                        
                                </button>
                                </td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?=esc($value['created_at']) ?></td>
                            </tr>
                        <?php endforeach; 
                    ?>
                </tbody>

            </table>

            </div>
        </div>
    </div>
</div>


<!-- Out Stock Multiple Modal -->
<div class="fixed left-0 right-0 z-50 flex items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full" id="stock-muliple-modal">
    <div class="relative w-full h-full max-w-2xl px-4 md:h-auto">
        <div class="relative bg-white rounded-lg shadow-lg dark:bg-gray-800">
            <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Borderau
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white" data-modal-toggle="stock-muliple-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>

            <div class="p-6 space-y-6">
                <form id="repeaterForm" id="invoice" action="<?= base_url('stock/out') ?>" method="post" class="space-y-4">
                    <div id="repeater-container">
                        
                    </div>

                    <div class="flex flex-col w-full mb-4 p-4 bg-white dark:bg-gray-800 rounded-lg shadow-md">
                        <div>
                            <label for="amout_total_sale" class="block mb-2 w-full text-sm font-medium text-gray-900 dark:text-white">
                                Le Montant Total du Vente :
                            </label>
                            <input type="text" value="" disabled name="amout_total_sale" value="<?= old('amout_total_sale') ?>" id="amout_total_sale"
                                class="bg-gray-50 border <?= session('errors.amout_total_sale') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Le montant total est">
                        </div>
                    </div>

                </form>
                <button onclick="printInvoice()">Imprimer Borderau</button>
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
                                '<td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">' + out.quantity + '</td>' +
                                '<td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">' + numberFormat(out.purchase_price) + ' F CFA</td>' +
                                '<td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">' + numberFormat(out.sale_price) + ' F CFA</td>' +
                                '<td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">' + numberFormat(out.amount_total) + ' F CFA</td>' +
                                '<td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">' + numberFormat(out.profit) + ' F CFA</td>' +
                                '<td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">' + numberFormat(out.created_at) + '</td>' +
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
                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">${out.quantity}</td>
                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">${out.purchase_price} F CFA</td>
                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">${out.sale_price} F CFA</td>
                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">${out.amount_total} F CFA</td>
                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">${out.profit} F CFA</td>
                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">${out.created_at}</td>
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


document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('stock-muliple-modal');

    const buttons = document.querySelectorAll('[data-modal-toggle="stock-muliple-modal"]');
    buttons.forEach(button => {
        button.addEventListener('click', function () {
            // Récupérer les données du produit
            const productDataString = this.getAttribute('data-product_out').trim();
            console.log('Valeur de data-product_out:', productDataString);

            let productData;
            try {
                productData = JSON.parse(productDataString);
                console.log('Parsed productData:', productData);
            } catch (error) {
                console.error('Erreur lors du parsing des données produit:', error);
                return;
            }

            // Initialisation de la somme
            let sum = 0;

            if (Array.isArray(productData)) {
                // Remplacer le contenu au lieu de l'ajouter
                $('#repeater-container').html('');  // Vider le contenu avant de le remplir

                productData.forEach((product) => {
                    // Conversion de `amount_total` en nombre
                    const amount = parseFloat(product.amount_total) || 0;
                    sum += amount;

                    $('#repeater-container').append(` 
                        <div data-repeater-item class="member-group flex gap-4 mb-4 p-4 bg-white dark:bg-gray-800 rounded-lg shadow-md">
                            <?= csrf_field() ?>
                            <input disabled type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                            
                            <div class="w-1/2">
                                <label for="stock_id-create" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Produit:</label>
                                <select disabled id="stock_id-create" name="waybill[0][stock_id]" class="bg-gray-50 border <?= session('errors.stock_id') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 product-select">
                                    <option value="${product.stock_id}">${product.product_name}</option>
                                </select>
                            </div>

                            <div class="w-1/2">
                                <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantité :</label>
                                <input disabled type="number" name="waybill[0][quantity]" value="${product.quantity}" id="quantity" class="bg-gray-50 border <?= session('errors.quantity') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="2999" required>
                            </div>

                            <div class="w-1/2">
                                <label for="amount_total" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Montant :</label>
                                <input disabled id="amount_total" type="number" name="waybill[0][amount_total]" value="${product.amount_total}" class="bg-gray-50 border <?= session('errors.amount_total') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="2999" required>
                            </div>
                        </div>
                    `);
                });

                // Affichage de la somme calculée dans l'élément avec l'ID #amout_total_sale
                $('#amout_total_sale').val(sum);
                console.log('Somme totale:', sum); // Vérification de la somme
            } else {
                console.error('Les données produit ne sont pas un tableau.', productData);
            }
        });
    });
});


function printInvoice() {
    const printContent = document.getElementById('invoice').innerHTML;
    const originalContent = document.body.innerHTML;

    // Remplacer le contenu de la page par le contenu à imprimer
    document.body.innerHTML = printContent;

    // Afficher la boîte de dialogue d'impression
    window.print();

    // Restaurer le contenu d'origine
    document.body.innerHTML = originalContent;
    window.location.reload(); // Rafraîchir pour rétablir les événements et styles
}

</script>

<?= $this->endSection() ?>