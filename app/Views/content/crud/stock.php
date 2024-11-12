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
                      <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500" aria-current="page">stocks</span>
                    </div>
                  </li>
                </ol>
            </nav>
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Toutes les stocks</h1>
        </div>
        
    </div>
</div>



<div class="border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800">
    <ul class="flex justify-center flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
        <li class="me-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="stock-tab" data-tabs-target="#stock" type="button" role="tab" aria-controls="stock" aria-selected="false">Stock</button>
        </li>
        <li class="me-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="out-tab" data-tabs-target="#out" type="button" role="tab" aria-controls="out" aria-selected="false">Sortie</button>
        </li>
        
        <!--<li class="me-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Settings</button>
        </li>
        <li role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab" aria-controls="contacts" aria-selected="false">Contacts</button>
        </li>-->
    </ul>
</div>

<div id="default-tab-content">
    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="stock" role="tabpanel" aria-labelledby="stock-tab">
        <div class="flex flex-col">

        <div class="p-4 bg-white block sm:flex items-center my-4 justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
            <div class="w-full mb-1">
                <div class="items-center justify-end block sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700">
                    <a href="<?= base_url('stock/exportToPDF') ?>"  class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button" >
                        exports pdf
                    </a>
                    <a href="<?= base_url('stock/exports') ?>"  class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button" >
                        exports excel
                    </a>
                    <button id="createstockButton" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" type="button" data-drawer-target="drawer-create-stock-default" data-drawer-show="drawer-create-stock-default" aria-controls="drawer-create-stock-default" data-drawer-placement="right">
                        Ajouter
                    </button>

                    <button type="button"  data-modal-target="stock-muliple-modal" data-modal-toggle="stock-muliple-modal" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                        Sortie
                    </button>
                </div>

                <div class="items-end justify-end block mt-4 sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700">
                    <?php if (session()->getFlashdata('errors')): ?>
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                            <strong class="font-bold">Erreur de validation:</strong>
                            <ul class="mt-2 list-disc list-inside">
                                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach ?>
                            </ul>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.remove();">
                                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M14.348 5.652a1 1 0 010 1.415L11.414 10l2.934 2.933a1 1 0 01-1.415 1.415L10 11.414l-2.933 2.934a1 1 0 01-1.415-1.415L8.586 10 5.652 7.067a1 1 0 011.415-1.415L10 8.586l2.933-2.934a1 1 0 011.415 0z"/>
                                </svg>
                            </span>
                        </div>
                    <?php endif; ?>


                    <?php if (session()->has('success')): ?>
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Succès!</strong>
                            <span class="block sm:inline"><?= session('success'); ?></span>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.remove();">
                                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M14.348 5.652a1 1 0 010 1.415L11.414 10l2.934 2.933a1 1 0 01-1.415 1.415L10 11.414l-2.933 2.934a1 1 0 01-1.415-1.415L8.586 10 5.652 7.067a1 1 0 011.415-1.415L10 8.586l2.933-2.934a1 1 0 011.415 0z"/></svg>
                            </span>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->has('error')): ?>
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Erreur!</strong>
                            <span class="block sm:inline"><?= session('error'); ?></span>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.remove();">
                                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M14.348 5.652a1 1 0 010 1.415L11.414 10l2.934 2.933a1 1 0 01-1.415 1.415L10 11.414l-2.933 2.934a1 1 0 01-1.415-1.415L8.586 10 5.652 7.067a1 1 0 011.415-1.415L10 8.586l2.933-2.934a1 1 0 011.415 0z"/></svg>
                            </span>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
            
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden shadow">
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
                                        Montant Inv
                                    </th>
                                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        Prix Vente
                                    </th>
                                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        Montant Vte
                                    </th>
                                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        Niveau Critique
                                    </th>
                                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        Date Creation
                                    </th>
                                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                <?php foreach ($stocks as $value) : ?>
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="w-4 p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-<?=esc($value['id']) ?>" aria-describedby="checkbox-1" type="checkbox"
                                                class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-<?=esc($value['id']) ?>" class="sr-only">checkbox</label>
                                        </div>
                                    </td>
                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?=esc( $value['product_name']) ?></td>
                                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        <div class="text-base font-semibold text-gray-900 dark:text-white"><?=esc($value['quantity'])?></div>
                                    </td>
                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?=number_format(esc($value['purchase_price']), 0, '.', ' ') ?> F CFA</td>
                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?=number_format(abs(esc($value['purchase_price'])) * abs(esc($value['quantity'])), 0, '.', ' ') ?> F CFA</td>
                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?=number_format(esc($value['sale_price']), 0, '.', ' ') ?> F CFA </td>
                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?=number_format(abs(esc($value['sale_price'])) * abs(esc($value['quantity'])), 0, '.', ' ') ?> F CFA</td>
                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?=esc($value['critique']) ?></td>
                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <?= esc(date('d/m/Y', strtotime($value['created_at']))) ?>
                                    </td>
        
                                    <td class="p-4 space-x-2 whitespace-nowrap">
                                        <button id="<?= esc($value['id']) ?>dropdownMenuIconButton" data-dropdown-toggle="<?= esc($value['id']) ?>dropdownDots" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                            <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                                            </svg>
                                        </button>
        
                                        <!-- Dropdown menu -->
                                        <div id="<?= esc($value['id']) ?>dropdownDots" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                            <ul class="flex flex-col items-center gap-4 py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="<?= esc($value['id']) ?>dropdownMenuIconButton">
                                            <li>
                                                <button type="button" data-id="<?=esc($value['id'])?>" data-modal-target="in-stock-modal" data-modal-toggle="in-stock-modal" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                    Entrée
                                                </button>
                                            </li>
                                            <li>
                                                <button type="button" id="updatestockButton" data-id="<?=esc($value['id'])?>" data-purchase_price="<?=esc($value['purchase_price'])?>" data-sale_price="<?=esc($value['sale_price'])?>" data-quantity="<?=esc($value['quantity'])?>" data-critique="<?=esc($value['critique'])?>" data-product_id="<?=esc($value['product_id'])?>" data-created_at="<?=esc($value['created_at'])?>" 
                                                    data-drawer-target="drawer-update-stock-default" data-drawer-show="drawer-update-stock-default" aria-controls="drawer-update-stock-default" data-drawer-placement="right" 
                                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                                                    Modifier
                                                </button>
                                            </li>
                                            <li>
                                                <button type="button" id="deletestockButton" data-drawer-target="drawer-delete-stock-default" data-drawer-show="drawer-delete-stock-default" aria-controls="drawer-delete-stock-default" data-id="<?= esc($value['id']) ?>" data-drawer-placement="right" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    Supprimer
                                                </button>
                                            </li>
                                        </div>
        
                                    </td>
                                </tr>
                                <?php endforeach  ?>                    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="out" role="tabpanel" aria-labelledby="out-tab">
        <div class="flex flex-col">
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden shadow">

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
                                    Date de Sortie
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Montant total du vente
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Montant total d'achat
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Bénéfice
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Bordereaux
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
                                        <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?=esc($value['created_at']) ?></td>
                                        <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= number_format(esc($value['amount_total_sale']), 0, '.', ' ') ?> F CFA</td>
                                        <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= number_format(esc($value['amount_total_purchase']), 0, '.', ' ') ?> F CFA</td>
                                        <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= number_format(esc($value['profit']), 0, '.', ' ') ?> F CFA</td>
                                        <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <button type="button" 
                                            data-modal-target="stock-muliple-modal-b" 
                                            data-modal-toggle="stock-muliple-modal-b"
                                            data-id='<?= esc($value['id']) ?>' 
                                            data-product_out='<?= esc($value['product_out']) ?>' 
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                            </svg>                        
                                        </button>
                                        </td>
                                    </tr>
                                <?php endforeach; 
                            ?>
                        </tbody>

                    </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel" aria-labelledby="settings-tab">
        <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Settings tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
    </div>
    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
        <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Contacts tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
    </div>
</div>



<div class="sticky bottom-0 right-0 items-center w-full p-4 bg-white border-t border-gray-200 sm:flex sm:justify-between dark:bg-gray-800 dark:border-gray-700">
    <div class="flex items-center mb-4 sm:mb-0">
        <a href="#" class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
        </a>
        <a href="#" class="inline-flex justify-center p-1 mr-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        </a>
        <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Showing <span class="font-semibold text-gray-900 dark:text-white">1-20</span> of <span class="font-semibold text-gray-900 dark:text-white">2290</span></span>
    </div>
    <div class="flex items-center space-x-3">
        <a href="#" class="inline-flex items-center justify-center flex-1 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
            <svg class="w-5 h-5 mr-1 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            Previous
        </a>
        <a href="#" class="inline-flex items-center justify-center flex-1 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
            Next
            <svg class="w-5 h-5 ml-1 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        </a>
    </div>
</div>


<!-- Edit stock Drawer -->
<div id="drawer-update-stock-default" class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform <?= session('errors') ? 'translate-x-0' : 'translate-x-full' ?> bg-white dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
    <h5 id="drawer-label" class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">Update stock</h5>
    <button type="button" data-drawer-dismiss="drawer-update-stock-default" aria-controls="drawer-update-stock-default" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Fermer le menu</span>
    </button>
    
    <form action="<?= base_url('stock/update') ?>" method="POST">
        <?= csrf_field() ?>

        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
        <input type="hidden" name="stock_id" id="stock_id">

        <div class="space-y-4">

        <div>
            <label for="purchase_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prix d'achat:</label>
            <input type="number" name="purchase_price" value="<?= old('purchase_price') ?>" id="purchase_price" 
            class="bg-gray-50 border <?= session('errors.purchase_price') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
            placeholder="<?= number_format(2999, 0, '.', ' ') ?> FCFA" required
            >
            <?php if (session('errors.purchase_price')): ?>
                <span class="text-red-500 text-xs"><?= session('errors.purchase_price') ?></span>
            <?php endif ?>
        </div>

        <div>
            <label for="sale_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prix de vente:</label>
            <input type="text" name="sale_price" value="<?= old('sale_price') ?>" id="sale_price" 
            class="bg-gray-50 border <?= session('errors.sale_price') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
            placeholder="<?= number_format(2999, 0, '.', ' ') ?> FCFA" 
            required >

            <?php if (session('errors.sale_price')): ?>
                <span class="text-red-500 text-xs"><?= session('errors.sale_price') ?></span>
            <?php endif ?>
        </div>

        <div>
            <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantité:</label>
            <input type="number" name="quantity" value="<?= old('quantity') ?>" id="quantity" class="bg-gray-50 border <?= session('errors.quantity') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="2999" required>
            <?php if (session('errors.quantity')): ?>
                <span class="text-red-500 text-xs"><?= session('errors.quantity') ?></span>
            <?php endif ?>
        </div>

            <div>
                <label for="critique" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Niveau Critique:</label>
                <input type="number" name="critique" value="<?= old('critique') ?>" id="critique" class="bg-gray-50 border <?= session('errors.critique') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="2999" required>
                <?php if (session('errors.critique')): ?>
                    <span class="text-red-500 text-xs"><?= session('errors.critique') ?></span>
                <?php endif ?>
            </div>




            <div>
                <label class="block text-gray-700 dark:text-gray-400 text-md font-bold mb-2" for="pair">
                    Produit:
                </label>
                <select 
                   id="product-update" name="product_id"
                    class="selectpicker2 bg-gray-50 border <?= session('errors.product_id') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" style="width: 100%" 
                    data-placeholder="Selectionner les produits"
                    data-allow-clear="false"
                    title="Selectionner produit...">
                    <?php foreach ($products as $product): ?>
                        <option value="<?= esc($product['id']) ?>" <?= old('product_id') == esc($product['id']) ? 'selected' : '' ?>> <?= esc($product['name'])?> </option>
                    <?php endforeach ?>
                </select>
                <?php if (session('errors.product_id')): ?>
                    <span class="text-red-500 text-xs"><?= session('errors.product_id') ?></span>
                <?php endif ?>
            </div>

            <div>
                <label for="createdAt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date de la Creation:</label>
                <div class="relative max-w-sm">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                    </svg>
                </div>
                <input 
                    value="<?= old('created_at', isset($value['created_at']) ? $value['created_at'] : '') ?>"
                    name="created_at" 
                    id="created_at" 
                    datepicker 
                    datepicker-format="yyyy-mm-dd" 
                    type="text" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                    placeholder="Sélectionner la date de création"
                    readonly
                >

                </div>

                <?php if (session('errors.created_at')): ?>
                    <span class="text-red-500 text-xs"><?= session('errors.created_at') ?></span>
                <?php endif ?>
            </div>
        </div>

        
        <div class="bottom-0 left-0 flex justify-center w-full pb-4 space-x-4 md:px-4 md:absolute">
            <button type="submit" class="text-white w-full justify-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Mettre à jour</button>
            <button type="button" data-drawer-dismiss="drawer-update-stock-default" aria-controls="drawer-update-stock-default" class="inline-flex w-full justify-center text-gray-500 items-center bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                <svg aria-hidden="true" class="w-5 h-5 -ml-1 sm:mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 9l6 6 6-6"></path></svg>
                <span class="sr-only">Close</span> 
                Annuler
            </button>
        </div>
    </div>
    </form>
</div>



<!-- Delete stock Drawer -->
<div id="drawer-delete-stock-default" class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform translate-x-full bg-white dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
    <h5 id="drawer-label" class="inline-flex items-center text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">Delete item</h5>
    <button type="button" data-drawer-dismiss="drawer-delete-stock-default" aria-controls="drawer-delete-stock-default" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Close menu</span>
    </button>
    <svg class="w-10 h-10 mt-8 mb-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
    <h3 class="mb-6 text-lg text-gray-500 dark:text-gray-400">Are you sure you want to delete this stock?</h3>
    <!-- Ce bouton sera modifié par le JavaScript -->
    <a href="#" id="confirmDeleteButton" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2.5 text-center mr-2 dark:focus:ring-red-900">
        Oui
    </a>
    <a href="#" class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 border border-gray-200 font-medium inline-flex items-center rounded-lg text-sm px-3 py-2.5 text-center dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700" data-drawer-hide="drawer-delete-stock-default">
        Non, Annuler
    </a>
</div>


<!-- Add stock Drawer -->
<div id="drawer-create-stock-default" class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform <?= session('errors') ? 'translate-x-0' : 'translate-x-full' ?> bg-white dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
    <h5 id="drawer-label" class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">New stock</h5>
    <button type="button" data-drawer-dismiss="drawer-create-stock-default" aria-controls="drawer-create-stock-default" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Fermer le menu</span>
    </button>
    
    <form action="<?= base_url('stock/store') ?>" method="POST">
        <?= csrf_field() ?>
        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

        <div class="space-y-4">
             
        <div>
                <label for="purchase_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prix d'achat:</label>
                <input type="text" name="purchase_price" value="<?= old('purchase_price') ?>" id="purchase_price" 
                    class="bg-gray-50 border <?= session('errors.purchase_price') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                    placeholder="<?= number_format(2999, 0, '.', ' ') ?> FCFA" 
                    required oninput="formatPrice(this)" onblur="removeFormatting(this)">
                <?php if (session('errors.purchase_price')): ?>
                    <span class="text-red-500 text-xs"><?= session('errors.purchase_price') ?></span>
                <?php endif ?>
            </div>
            
            <div>
                <label for="sale_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prix de vente:</label>
                <input type="number" name="sale_price" value="<?= old('sale_price') ?>" id="sale_price" 
                    class="bg-gray-50 border <?= session('errors.sale_price') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                    placeholder="2 999 FCFA" 
                    required oninput="formatPrice(this)"  onblur="removeFormatting(this)">

                <?php if (session('errors.sale_price')): ?>
                    <span class="text-red-500 text-xs"><?= session('errors.sale_price') ?></span>
                <?php endif ?>
            </div>

            <div>
                <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantité:</label>
                <input type="number" name="quantity" value="<?= old('quantity') ?>" id="quantity" class="bg-gray-50 border <?= session('errors.quantity') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="2999" required>
                <?php if (session('errors.quantity')): ?>
                    <span class="text-red-500 text-xs"><?= session('errors.quantity') ?></span>
                <?php endif ?>
            </div>
            
            <div>
                <label for="critique" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Niveau Critique:</label>
                <input type="number" name="critique" value="<?= old('critique') ?>" id="critique" class="bg-gray-50 border <?= session('errors.critique') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="2999" required>
                <?php if (session('errors.critique')): ?>
                    <span class="text-red-500 text-xs"><?= session('errors.critique') ?></span>
                <?php endif ?>
            </div>

           <div>
                <label class="block text-gray-700 dark:text-gray-400 text-md font-bold mb-2" for="pair">
                    Produit:
                </label>
                <select 
                   id="product-create" name="product_id"
                    class="selectpicker bg-gray-50 border <?= session('errors.product_id') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" style="width: 100%" 
                    data-placeholder="Selectionner les produits"
                    data-allow-clear="false"
                    title="Selectionner produit...">
                    <?php $first = true;?>
                    <?php foreach ($products as $product): ?>
                        <option value="<?= $product['id'] ?>" <?= $first ? 'selected' : '' ?>><?= $product['name'] ?></option>
                        <?php $first = false; ?>
                    <?php endforeach ?>
                </select>
                <?php if (session('errors.product_id')): ?>
                    <span class="text-red-500 text-xs"><?= session('errors.product_id') ?></span>
                <?php endif ?>
            </div>
            
            <div>
                <label for="createdAt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date de la Creation:</label>
                <div class="relative max-w-sm">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                    </svg>
                </div>
                <input 
                    value="<?= old('created_at') ?>"
                    name="created_at" 
                    id="datepicker-format" 
                    datepicker 
                    datepicker-format="yyyy-mm-dd" 
                    type="text" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                    placeholder="Sélectionner la date de création"
                    readonly
                >
                </div>

                <?php if (session('errors.created_at')): ?>
                    <span class="text-red-500 text-xs"><?= session('errors.created_at') ?></span>
                <?php endif ?>
            </div>

            <div class="bottom-0 left-0 flex justify-center w-full pb-4 space-x-4 md:px-4 md:absolute">
                <button type="submit" class="text-white w-full justify-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Créer</button>
                <button type="button" data-drawer-dismiss="drawer-create-stock-default" aria-controls="drawer-create-stock-default" class="inline-flex w-full justify-center text-gray-500 items-center bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                    <svg aria-hidden="true" class="w-5 h-5 -ml-1 sm:mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    Annuler
                </button>
            </div>
        </div>
    </form>


    
</div>


<!-- in Stock Modal -->
<div class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full" id="in-stock-modal">
    <div class="relative w-full h-full max-w-2xl px-4 md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700">
                <h3 class="text-xl font-semibold dark:text-white">
                    Entrée Stock
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white" data-modal-toggle="in-stock-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <form action="" method="POST">
                    <?= csrf_field() ?>
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                    <div>
                        <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre de quantité Entrée :</label>
                        <input type="number" name="quantity" value="<?= old('quantity') ?>" id="quantity" class="bg-gray-50 border <?= session('errors.quantity') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="2999" required>
                        <?php if (session('errors.quantity')): ?>
                            <span class="text-red-500 text-xs"><?= session('errors.quantity') ?></span>
                        <?php endif ?>
                    </div>

                </div>
                <!-- Modal footer -->
                <div class="items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-700">
                    <button class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" type="submit">Valider Entrée</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Out Stock Multiple Modal -->
<div class="fixed left-0 right-0 z-50 flex items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full" id="stock-muliple-modal">
    <div class="relative w-full h-full max-w-2xl px-4 md:h-auto">
        <!-- Contenu du modal -->
        <div class="relative max-h-[85vh] overflow-y-auto bg-white rounded-lg shadow-lg dark:bg-gray-800">
            <!-- En-tête du modal -->
            <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Sortie de Stock
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white" data-modal-toggle="stock-muliple-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            <!-- Corps du modal -->
            <div class="p-6 space-y-6">
                <form id="repeaterForm" action="<?= base_url('stock/out') ?>" method="post" class="space-y-4">

                    <div class="flex gap-4 mb-4 p-4 bg-white dark:bg-gray-800 rounded-lg shadow-md">
                        
                            <!-- Champ Boutique -->
                            <div class="w-1/2">
                                <label for="shop-create" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Boutique:</label>
                                <select id="shop-create" name="shop_id" class="bg-gray-50 border <?= session('errors.shop_id') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <?php foreach ($shops as $shop): ?>
                                        <option value="<?= $shop['id'] ?>"><?= $shop['name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?php if (session('errors.shop_id')): ?>
                                    <span class="text-red-500 text-xs"><?= session('errors.shop_id') ?></span>
                                <?php endif ?>
                            </div>

                            <!-- Champ Date -->
                            <div class="w-1/2">
                                <label for="createdAt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date de la sortie:</label>
                                <div class="relative max-w-sm">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                        </svg>
                                    </div>
                                    <input 
                                        value="<?= old('created_at') ?>"
                                        name="created_at_out" 
                                        id="datepicker-format-0"
                                        datepicker 
                                        datepicker-format="yyyy-mm-dd" 
                                        type="text" 
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                        placeholder="Sélectionner la date de création"
                                        required
                                    >

                                </div>
                                <?php if (session('errors.created_at')): ?>
                                    <span class="text-red-500 text-xs"><?= session('errors.created_at') ?></span>
                                <?php endif ?>
                            </div>

                    </div>

                    <div id="repeater-container">
                        <!-- Groupe de out -->
                        <div data-repeater-item class="member-group flex gap-4 mb-4 p-2 bg-white dark:bg-gray-800 rounded-lg shadow-md relative">
                            <?= csrf_field() ?>

                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                            
                            <div class="w-1/2">
                                <label for="stock_id-create" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Produit:</label>
                                

                                <select 
                                        id="product-select" name="waybill[0][stock_id]" class="bg-gray-50 border <?= session('errors.stock_id') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 product-select" style="width: 100%" 
                                        data-placeholder="Selectionner les produits"
                                        data-allow-clear="false"
                                        title="Selectionner produit...">
                                        <?php $first = true;?>
                                        <?php foreach ($stocks as $stock): ?>
                                            <option value="<?= $stock['id'] ?>" data-product_name="<?= $stock['product_name'] ?>" data-purchase_price="<?= $stock['purchase_price'] ?>"  data-sale_price="<?= $stock['sale_price'] ?>"><?= $stock['product_name'] ?></option>
                                            <?php $first = false; ?>
                                        <?php endforeach ?>
                                    </select>
                                
                                
                               <!-- <select id="stock_id-create" name="waybill[0][stock_id]" class="bg-gray-50 border <?= session('errors.stock_id') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 product-select">
                                    <?php foreach ($stocks as $stock): ?>
                                        <option value="<?= $stock['id'] ?>" data-product_name="<?= $stock['product_name'] ?>" data-purchase_price="<?= $stock['purchase_price'] ?>"  data-sale_price="<?= $stock['sale_price'] ?>"><?= $stock['product_name'] ?></option>
                                    <?php endforeach ?>
                                </select>-->
                                <?php if (session('errors.stock_id')): ?>
                                    <span class="text-red-500 text-xs"><?= session('errors.stock_id') ?></span>
                                <?php endif ?>
                            </div>

                            <!-- Champ Quantité -->
                            <div class="w-1/2">
                                <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantité :</label>
                                <input type="number" name="waybill[0][quantity]" value="<?= old('quantity') ?>" id="quantity" class="bg-gray-50 border <?= session('errors.quantity') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="2999" required>
                                <?php if (session('errors.quantity')): ?>
                                    <span class="text-red-500 text-xs"><?= session('errors.quantity') ?></span>
                                <?php endif ?>
                            </div>

                            <!-- Champ  Montant -->
                            <div class="w-1/2">
                                <label for="amount_total" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Montant :</label>
                                <input id="amount_total" type="number" name="waybill[0][amount_total]" disabled value="<?= old('amount_total') ?>" id="amount_total" class="bg-gray-50 border <?= session('errors.amount_total') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="2999" required>
                                <input id="Pprofit" type="hidden" name="waybill[0][Pprofit]" value="<?= old('Pprofit') ?>" id="Pprofit" class="bg-gray-50 border <?= session('errors.Pprofit') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="2999" required>
                                <input id="product_name" type="hidden" name="waybill[0][product_name]" value="<?= old('product_name') ?>" id="product_name" class="bg-gray-50 border <?= session('errors.product_name') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="2999" required>
                                <?php if (session('errors.amount_total')): ?>
                                    <span class="text-red-500 text-xs"><?= session('errors.amount_total') ?></span>
                                <?php endif ?>
                            </div>
                            <!-- Bouton Supprimer -->
                            <button type="button" class="remove-item absolute top-0 right-0 text-red-500 hover:text-red-700 font-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9L14.394 18m-4.788 0L9.26 9m9.968-3.21a48.13 48.13 0 0 1 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>

                        </div>
                    </div>


                    <div class="flex justify-center mx-auto w-10 mb-4 p-4 bg-white dark:bg-gray-800 rounded-lg shadow-md">
                        <button id="add-member" type="button" class="text-green-500 hover:text-green-700 font-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </button>
                    </div>


                    <div class="flex flex-col w-full mb-4 p-4 bg-white dark:bg-gray-800 rounded-lg shadow-md">
                        <div>
                            <label for="observation" class="block mb-2 w-full text-sm font-medium text-gray-900 dark:text-white">
                                Observation :
                            </label>
                            <input type="text" name="observation" value="<?= old('observation') ?>" id="observation"
                                class="bg-gray-50 border <?= session('errors.observation') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="L'Observation">
                        </div>
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


                        <div>
                            <label for="amout_total_purchase" class="block mb-2  w-full text-sm font-medium text-gray-900 dark:text-white">
                                Le Montant Total d'achat :
                            </label>
                            <input type="text" value="" disabled name="amout_total_purchase" value="<?= old('amout_total_purchase') ?>" id="amout_total_purchase"
                                class="bg-gray-50 border <?= session('errors.amout_total_purchase') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Le montant total est">
                        </div>

                        <div>
                            <label for="profit" class="block mb-2 w-full text-sm font-medium text-gray-900 dark:text-white">
                                Le Beninfice :
                            </label>
                            <input type="text" value="" disabled name="profit" value="<?= old('profit') ?>" id="profit"
                                class="bg-gray-50 border <?= session('errors.profit') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Le montant total est">
                        </div>


                    </div>

                    <!-- Boutons Ajouter et Soumettre -->
                    <div class="flex justify-between mt-4">
                        <button  id="add-member" type="submit" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Valider</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<!-- Out Stock Multiple Modal -->
<div class="fixed left-0 right-0 z-50 flex items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full" id="stock-muliple-modal-b">
    <div class="relative w-full h-full max-w-2xl px-4 md:h-auto">
        <div class="relative bg-white rounded-lg shadow-lg dark:bg-gray-800">
            <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Borderau
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white" data-modal-toggle="stock-muliple-modal-b">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>

            <div class="p-6 space-y-6">
                <form id="repeaterForm" id="invoice" action="<?= base_url('stock/out') ?>" method="post" class="space-y-4">
                    <div id="repeater-container-b">
                        
                    </div>

                    <div class="flex flex-col w-full mb-4 p-4 bg-white dark:bg-gray-800 rounded-lg shadow-md">
                        <div>
                            <label for="amout_total_sale" class="block mb-2 w-full text-sm font-medium text-gray-900 dark:text-white">
                                Le Montant Total du Vente :
                            </label>
                            <input type="text" value="" disabled name="amout_total_sale" value="<?= old('amout_total_sale') ?>" id="amout_total_sale-b"
                                class="bg-gray-50 border <?= session('errors.amout_total_sale') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Le montant total est">
                        </div>
                    </div>

                </form>
                <a id="builPdf" href="<?= base_url('shop/exports') ?>"  class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800" type="button" >
                    Générer bordereau
                </a>
            </div>
        </div>
    </div>
</div>



<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('#updatestockButton').forEach(button => {
        button.addEventListener('click', function () {
            const stockId = button.getAttribute('data-id');
            const stockPurchasePrice = button.getAttribute('data-quantity');
            const stockSalePrice = button.getAttribute('data-critique');
            const stockproductId = button.getAttribute('data-product_id');
            const productPurchasePrice = button.getAttribute('data-purchase_price');
            const productSalePrice = button.getAttribute('data-sale_price');
            const created_at = button.getAttribute('data-created_at');
            
            console.log(created_at);
            
            // Set values in the form
            document.getElementById('purchase_price').value = productPurchasePrice;
            document.getElementById('sale_price').value = productSalePrice;
            document.getElementById('stock_id').value = stockId;
            document.getElementById('quantity').value = stockPurchasePrice;
            document.getElementById('critique').value = stockSalePrice;
            document.getElementById('product_id').value = stockproductId;
            document.getElementById('created_at').value = created_at;
        });
    });
});


document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('#deletestockButton');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const stockId = this.getAttribute('data-id');

            const confirmDeleteButton = document.querySelector('#confirmDeleteButton');
            confirmDeleteButton.setAttribute('href', `/stock/delete/${stockId}`);
        });
    });
});

// Pour Entrée
document.querySelectorAll('[data-modal-target="in-stock-modal"]').forEach(button => {
    button.addEventListener('click', function() {
        const stockId = this.getAttribute('data-id');
        // Injecter l'ID dans l'action du formulaire pour l'Entrée
        document.querySelector('#in-stock-modal form').action = `<?= base_url('stock/in/') ?>${stockId}`;
    });
});

// Pour Sortie
document.querySelectorAll('[data-modal-target="out-stock-modal"]').forEach(button => {
    button.addEventListener('click', function() {
        const stockId = this.getAttribute('data-id');
        // Injecter l'ID dans l'action du formulaire pour la Sortie
        document.querySelector('#out-stock-modal form').action = `<?= base_url('stock/out/') ?>${stockId}`;
    });
});

function formatPrice(input) {
    // Retire tous les caractères qui ne sont pas des chiffres pour garder uniquement la valeur brute
    let value = input.value.replace(/\D/g, '');

    // Formate le nombre avec un séparateur de milliers insécable
    if (value) {
        value = new Intl.NumberFormat('fr-FR').format(value); // Format avec espace insécable
    }

    // Met à jour la valeur affichée de l'input avec le format désiré
    input.value = value;
}

function removeFormatting(input) {
    // Remet la valeur sans séparateurs de milliers
    input.value = input.value.replace(/\s/g, '');
}

function getCurrentTime() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
        return `${hours}:${minutes}:${seconds}`;
    }

    // Ajout de l'événement pour le champ de date
    document.getElementById('datepicker-format').addEventListener('change', function() {
        // Récupération de la date sélectionnée
        const selectedDate = this.value;
        // Ajout de l'heure actuelle
        this.value = `${selectedDate} ${getCurrentTime()}`;
    });

</script>

<script>

$('#repeaterForm').on('submit', function() {
    $('#amout_total_sale, #amout_total_purchase, #profit, #amount_total').prop('disabled', false);
});



// $(document).ready(function() {
//     let memberIndex = 1;

//     $('.product-select').select2();

//     $('#add-member').click(function() {
//         const newMember = $('#repeater-container .member-group:first').clone();

//         // Réinitialiser les valeurs des nouveaux champs
//         newMember.find('input[type="number"]').val('');
//         newMember.find('select').val('');

//         // Mettre à jour les attributs "name" pour rendre chaque champ unique
//         newMember.find('input, select').each(function() {
//             const nameAttr = $(this).attr('name');
//             if (nameAttr) {
//                 const updatedName = nameAttr.replace(/\[0\]/, `[${memberIndex}]`);
//                 $(this).attr('name', updatedName);
//             }
//         });

//         $('#repeater-container').append(newMember);

//         $('.product-select').select2();

//         $('.product-select').last().next().next().remove()
//         memberIndex++;
//     });

//     // Écoute les changements sur les sélecteurs de produits et les champs de quantité
//     $(document).on('input', 'input[name^="waybill["][name$="[quantity]"], .product-select', function() {
//         calculateAmounts();
//     });

//     function calculateAmounts() {
//         let totalSale = 0;
//         let totalPurchase = 0;

//         $('#repeater-container .member-group').each(function() {
//             const quantity = $(this).find('input[name$="[quantity]"]').val();
//             const salePrice = $(this).find('.product-select option:selected').data('sale_price');
//             const purchasePrice = $(this).find('.product-select option:selected').data('purchase_price');
//             const productName = $(this).find('.product-select option:selected').data('product_name');

//             if (quantity && salePrice) {
//                 const amountTotal = quantity * salePrice;
//                 $(this).find('input[name$="[amount_total]"]').val(amountTotal);
//                 $(this).find('input[name$="[Pprofit]"]').val((salePrice - purchasePrice) * quantity);
//                 $(this).find('input[name$="[product_name]"]').val(productName);
//                 totalSale += amountTotal;
//             }

//             if (quantity && purchasePrice) {
//                 const amountTotalPurchase = quantity * purchasePrice;
//                 totalPurchase += amountTotalPurchase;
//             }
//         });

//         $('#amout_total_sale').val(totalSale);
//         $('#amout_total_purchase').val(totalPurchase);
//         $('#profit').val(totalSale - totalPurchase);
//     }

//     $(document).on('click', '.remove-item', function() {
//         if ($('#repeater-container .member-group').length > 1) {
//             $(this).closest('.member-group').remove();
//             calculateAmounts(); // Recalculer les montants après suppression
//         } else {
//             alert("Vous devez avoir au moins un membre.");
//         }
//     });
// });


$(document).ready(function() {
    let memberIndex = 1;

    // Initialisation de select2 pour les sélecteurs existants
    $('#product-select').select2();

    $('#add-member').click(function() {
        const newMember = $('#repeater-container .member-group:first').clone();

        // Réinitialiser les valeurs des nouveaux champs
        newMember.find('input[type="number"]').val('');
        newMember.find('select').val('');

        // Mettre à jour les attributs "name" et "id" pour rendre chaque champ unique
        newMember.find('input, select').each(function() {
            const nameAttr = $(this).attr('name');
            if (nameAttr) {
                const updatedName = nameAttr.replace(/\[0\]/, `[${memberIndex}]`);
                $(this).attr('name', updatedName);
            }
            // Mettre à jour l'ID du select pour le rendre unique
            if ($(this).hasClass('product-select')) {
                $(this).attr('id', `product-select-${memberIndex}`);
            }
        });

        $('#repeater-container').append(newMember);

        // Réinitialiser select2 pour tous les selects (nouveau et existant)
        $(`#product-select-${memberIndex}`).select2();

       $(`#product-select-${memberIndex}`).last().next().next().remove()

        memberIndex++;
    });

    // Écoute les changements sur les sélecteurs de produits et les champs de quantité
    $(document).on('input', 'input[name^="waybill["][name$="[quantity]"], .product-select', function() {
        calculateAmounts();
    });

    function calculateAmounts() {
        let totalSale = 0;
        let totalPurchase = 0;

        $('#repeater-container .member-group').each(function() {
            const quantity = $(this).find('input[name$="[quantity]"]').val();
            const salePrice = $(this).find('.product-select option:selected').data('sale_price');
            const purchasePrice = $(this).find('.product-select option:selected').data('purchase_price');
            const productName = $(this).find('.product-select option:selected').data('product_name');

            if (quantity && salePrice) {
                const amountTotal = quantity * salePrice;
                $(this).find('input[name$="[amount_total]"]').val(amountTotal);
                $(this).find('input[name$="[Pprofit]"]').val((salePrice - purchasePrice) * quantity);
                $(this).find('input[name$="[product_name]"]').val(productName);
                totalSale += amountTotal;
            }

            if (quantity && purchasePrice) {
                const amountTotalPurchase = quantity * purchasePrice;
                totalPurchase += amountTotalPurchase;
            }
        });

        $('#amout_total_sale').val(totalSale);
        $('#amout_total_purchase').val(totalPurchase);
        $('#profit').val(totalSale - totalPurchase);
    }

    $(document).on('click', '.remove-item', function() {
        if ($('#repeater-container .member-group').length > 1) {
            $(this).closest('.member-group').remove();
            calculateAmounts(); // Recalculer les montants après suppression
        } else {
            alert("Vous devez avoir au moins un membre.");
        }
    });
});



document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('stock-muliple-modal-b');

    const buttons = document.querySelectorAll('[data-modal-toggle="stock-muliple-modal-b"]');
    buttons.forEach(button => {
    button.addEventListener('click', function () {
        // Récupérer les données du produit
        const productDataString = this.getAttribute('data-product_out').trim();
        const id = this.getAttribute('data-id').trim();
        console.log('Valeur de data-product_out:', productDataString);

        let productData;
        try {
            productData = JSON.parse(productDataString);
            console.log('Parsed productData:', productData);
        } catch (error) {
            console.error('Erreur lors du parsing des données produit:', error);
            return;
        }

        // Initialisation de la somme et du tableau pour stock_id
        let sum = 0;

        if (Array.isArray(productData)) {
            // Vider le contenu avant de le remplir
            $('#repeater-container-b').html('');  

            productData.forEach((product) => {
                // Conversion de `amount_total` en nombre
                const amount = parseFloat(product.amount_total) || 0;
                sum += amount;

                $('#repeater-container-b').append(` 
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
            $('#amout_total_sale-b').val(sum);
            console.log('Somme totale:', sum); // Vérification de la somme

            $('#builPdf').attr('href', `<?= base_url('shop/exports') ?>/${id}`); // Mettez à jour l'URL
        } else {
            console.error('Les données produit ne sont pas un tableau.', productData);
        }
    });
});

});


</script>
<?= $this->endSection() ?>




