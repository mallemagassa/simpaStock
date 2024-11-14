<?= $this->extend('layouts/_default/dashboard') ?> 

<?= $this->section('content') ?>

<?php 
  $user = auth()->user();
?>

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
                <form method="post" action="/filterOut" class="flex items-center space-x-2">
                    <label for="start_date" class="font-medium text-gray-700 dark:text-gray-300">Date de début:</label>
                    <input type="hidden" name="shop_id" value="<?= $shop['id'] ?>">
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
                <form method="post" action="/filterOuts">
                    <input type="hidden" name="shop_id" value="<?= $shop['id'] ?>">
                    <button type="submit" name="filter" value="today" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Aujourd'hui</button>
                    <button type="submit" name="filter" value="week" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Cette Semaine</button>
                    <button type="submit" name="filter" value="month" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Ce Mois</button>
                    <button type="submit" name="filter" value="year" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Cette Année</button>
                </form>
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
                            Date de Sortie
                        </th>
                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Montant total d'Inventaire
                        </th>
                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Montant total du vente
                        </th>
                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Bordereaux
                        </th>
                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Action
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
                        
                                </td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?=esc($value['created_at']) ?></td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= number_format(esc($value['amount_total_purchase']), 0, '.', ' ') ?> F CFA</td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= number_format(esc($value['amount_total_sale']), 0, '.', ' ') ?> F CFA</td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <button type="button" 
                                    data-modal-target="stock-muliple-modal" 
                                    data-modal-toggle="stock-muliple-modal"
                                    data-id='<?= esc($value['id']) ?>' 
                                    data-product_out='<?= esc($value['product_out']) ?>' 
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                    </svg>                        
                                </button>
                                </td>
                                <td class="p-4 space-x-2 whitespace-nowrap">
                                            <button id="<?= esc($value['id']) ?>dropdownMenuIconButtonUpdate" data-dropdown-toggle="<?= esc($value['id']) ?>dropdownDotsUpdate" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                                <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                                                </svg>
                                            </button>
            
                                            <!-- Dropdown menu -->
                                            <div id="<?= esc($value['id']) ?>dropdownDotsUpdate" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                                <ul class="flex flex-col items-center gap-4 py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="<?= esc($value['id']) ?>dropdownMenuIconButtonUpdate">
                                                <?php if ($user->can('edit.out')) :?>
                                                    <li>
                                                    <button 
                                                        type="button" 
                                                        id="updateOutButton" 
                                                        data-id="<?=esc($value['id'])?>" 
                                                        data-profit="<?=esc($value['profit'])?>" 
                                                        data-amount_total_sale="<?=esc($value['amount_total_sale'])?>" 
                                                        data-amount_total_purchase="<?=esc($value['amount_total_purchase'])?>" 
                                                        data-product_out="<?=esc($value['product_out'])?>" 
                                                        data-ref="<?=esc($value['ref'])?>" 
                                                        data-observation="<?=esc($value['observation'])?>"  
                                                        data-shop_id="<?=esc($value['shop_id'])?>"  
                                                        data-created_at="<?=esc($value['created_at'])?>"
                                                        data-modal-target="out-muliple-modal-update" 
                                                        data-modal-toggle="out-muliple-modal-update"
                                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                                                        Modifier
                                                    </button>
                                                        
                                                    </li>
                                                <?php endif?>
                                                <?php if ($user->can('delete.out')) :?>
                                                
                                                    <li>
                                                        <button type="button" id="deleteOutButton" data-drawer-target="drawer-delete-out-default" data-drawer-show="drawer-delete-out-default" aria-controls="drawer-delete-out-default" data-id="<?= esc($value['id']) ?>" data-drawer-placement="right" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                            </svg>
                                                            Supprimer
                                                        </button>
                                                    </li>
                                                <?php endif?>
                                            </div>
            
                                        </td>
                            </tr>
                        <?php endforeach; 
                    ?>
                </tbody>

            </table>
            <?= $pager->links('outs','tailwind_pagination') ?>
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
                <a id="builPdf" href="<?= base_url('outs/exports') ?>"  class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800" type="button" >
                    Générer bordereau
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Delete stock Drawer -->
<div id="drawer-delete-out-default" class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform translate-x-full bg-white dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
    <h5 id="drawer-label" class="inline-flex items-center text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">Delete item</h5>
    <button type="button" data-drawer-dismiss="drawer-delete-out-default" aria-controls="drawer-delete-out-default" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Close menu</span>
    </button>
    <svg class="w-10 h-10 mt-8 mb-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
    <h3 class="mb-6 text-lg text-gray-500 dark:text-gray-400">Are you sure you want to delete this Sortie?</h3>
    <!-- Ce bouton sera modifié par le JavaScript -->
    <a href="#" id="confirmDeleteButtonOut" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2.5 text-center mr-2 dark:focus:ring-red-900">
        Oui
    </a>
    <a href="#" class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 border border-gray-200 font-medium inline-flex items-center rounded-lg text-sm px-3 py-2.5 text-center dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700" data-drawer-hide="drawer-delete-out-default">
        Non, Annuler
    </a>
</div>

<!-- Out Borderau update Multiple Modal -->
<div class="fixed left-0 right-0 z-50 flex items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full" id="out-muliple-modal-update">
    <div class="relative w-full h-full max-w-2xl px-4 md:h-auto">
        <div class="relative bg-white rounded-lg shadow-lg dark:bg-gray-800">
            <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Borderau
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white" data-modal-toggle="out-muliple-modal-update">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>

            <!-- Corps du modal -->
            <div class="p-6 space-y-6">
                <form id="repeaterFormUpdate" method="post" class="space-y-4">

                    <div class="flex gap-4 mb-4 p-4 bg-white dark:bg-gray-800 rounded-lg shadow-md">
                        
                            <!-- Champ Boutique -->
                            <div class="w-1/2">
                                <label for="shop-create" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Boutique:</label>
                                <select id="shop_id_update" name="shop_id" class="bg-gray-50 border <?= session('errors.shop_id') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                                        id="created_at_update"
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

                    <div id="repeater-container-update">
                        <!-- Groupe de out -->
                        <div data-repeater-item class="member-group flex gap-4 mb-4 p-2 bg-white dark:bg-gray-800 rounded-lg shadow-md relative">
                            

                        </div>
                    </div>


                    <div class="flex justify-center mx-auto w-10 mb-4 p-4 bg-white dark:bg-gray-800 rounded-lg shadow-md">
                        <button id="add-member-update" type="button" class="text-green-500 hover:text-green-700 font-bold">
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
                            <input 
                                type="text" 
                                name="observation" 
                                value="<?= old('observation') ?>" 
                                id="observationUpdate"
                                class="bg-gray-50 border <?= session('errors.observation') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="L'Observation">
                            <input 
                                type="hidden" 
                                name="ref" 
                                value="<?= old('observation') ?>" 
                                id="ref"
                                class="bg-gray-50 border <?= session('errors.ref') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               >
                        </div>
                    </div>

                    <div class="flex flex-col w-full mb-4 p-4 bg-white dark:bg-gray-800 rounded-lg shadow-md">
                        
                        <div>
                            <label for="amount_total_sale_update" class="block mb-2 w-full text-sm font-medium text-gray-900 dark:text-white">
                                Le Montant Total du Vente :
                            </label>
                            <input type="text" value="" disabled name="amount_total_sale" value="<?= old('amount_total_sale_update') ?>" id="amount_total_sale_update"
                                class="bg-gray-50 border <?= session('errors.amout_total_sale') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Le montant total est">
                        </div>


                        <div>
                            <label for="amount_total_purchase_update" class="block mb-2  w-full text-sm font-medium text-gray-900 dark:text-white">
                                Le Montant Total d'Inventaire :
                            </label>
                            <input type="text" value="" disabled name="amount_total_purchase" value="<?= old('amount_total_purchase_update') ?>" id="amount_total_purchase_update"
                                class="bg-gray-50 border <?= session('errors.amount_total_purchase_update') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Le montant total est">
                        </div>

                        <div>
                            <label for="profit" class="block mb-2 w-full text-sm font-medium text-gray-900 dark:text-white">
                                Le Beninfice :
                            </label>
                            <input type="text" value="" disabled name="profit" value="<?= old('profit') ?>" id="profitUpdate"
                                class="bg-gray-50 border <?= session('errors.profit') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Le montant total est">
                        </div>


                    </div>

                    <!-- Boutons Ajouter et Soumettre -->
                    <div class="flex justify-between mt-4">
                        <button  type="submit" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Valider</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<script>
    

document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('stock-muliple-modal');

    const buttons = document.querySelectorAll('[data-modal-toggle="stock-muliple-modal"]');
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
            $('#repeater-container').html('');  

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

            $('#builPdf').attr('href', `<?= base_url('outs/exports') ?>/${id}`); // Mettez à jour l'URL
        } else {
            console.error('Les données produit ne sont pas un tableau.', productData);
        }
    });
});

});


document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('#deleteOutButton');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const stockId = this.getAttribute('data-id');

            const confirmDeleteButton = document.querySelector('#confirmDeleteButtonOut');
            confirmDeleteButton.setAttribute('href', `/outs/delete/${stockId}`);
        });
    });
});




document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('#updateOutButton').forEach(button => {
        button.addEventListener('click', function () {
            const outId = button.getAttribute('data-id');
            const profit = button.getAttribute('data-profit');
            const amountTotalSale = button.getAttribute('data-amount_total_sale');
            const amountTotalPurchase = button.getAttribute('data-amount_total_purchase');
            const productOut = button.getAttribute('data-product_out');
            const observation = button.getAttribute('data-observation');
            const shopId = button.getAttribute('data-shop_id');
            const created_at = button.getAttribute('data-created_at');
            const ref = button.getAttribute('data-ref');

            // Injecter l'ID dans l'action du formulaire pour la Sortie
            document.querySelector('#repeaterFormUpdate').action = `<?= base_url('outs/update/') ?>${outId}`;
            
            document.getElementById('profitUpdate').value = profit;
            document.getElementById('amount_total_sale_update').value = amountTotalSale;
            document.getElementById('amount_total_purchase_update').value = amountTotalPurchase;
            document.getElementById('observationUpdate').value = observation;
            document.getElementById('shop_id_update').value = shopId;
            document.getElementById('created_at_update').value = created_at;
            document.getElementById('ref').value = ref;

            const addButton = document.getElementById('add-member-update');
            let repeaterIndex = 0;

            // Fonction pour ajouter un produit dans le conteneur repeater
            function addProductItem(product) {
                const template = `
                    <div data-repeater-item class="member-group flex gap-4 mb-4 p-2 bg-white dark:bg-gray-800 rounded-lg shadow-md relative">
                        <div class="w-1/2">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Produit:</label>
                            <select 
                                name="waybill[${repeaterIndex}][stock_id]" 
                                class="product-select-update bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" 
                                data-placeholder="Selectionner les produits">
                                <?php foreach ($stocksOuts as $stock): ?>
                                    <option ${product.stock_id == "<?= $stock['id'] ?>" ? "selected" : ""} 
                                            value="<?= $stock['id'] ?>" 
                                            data-product_name="<?= $stock['product_name'] ?>" 
                                            data-purchase_price="<?= $stock['purchase_price'] ?>"  
                                            data-sale_price="<?= $stock['sale_price'] ?>">
                                        <?= $stock['product_name'] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="w-1/2">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantité :</label>
                            <input id="quantityUpdate" type="number" name="waybill[${repeaterIndex}][quantity]" value="${product.quantity}" 
                                class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" 
                                placeholder="Quantité" required>
                        </div>
                        <div class="w-1/2">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Montant :</label>
                            <input id="amount_total_update" type="number" name="waybill[${repeaterIndex}][amount_total]" disabled value="${product.amount_total}" 
                                class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" 
                                placeholder="Montant total" required>
                            <input id="Pprofit_update" type="hidden" name="waybill[${repeaterIndex}][Pprofit]" value="<?= old('Pprofit') ?>" id="Pprofit" class="bg-gray-50 border <?= session('errors.Pprofit') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="2999" required>
                            <input id="product_name_update" type="hidden" name="waybill[${repeaterIndex}][product_name]" value="<?= old('product_name') ?>" id="product_name" class="bg-gray-50 border <?= session('errors.product_name') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="2999" required>
                        </div>
                        <button type="button" class="remove-item absolute top-0 right-0 text-red-500 hover:text-red-700 font-bold">X</button>
                    </div>
                `;
                $('#repeater-container-update').append(template);
                repeaterIndex++;
            }

            // Charger les données produits initiales
            const productDataString = button.getAttribute('data-product_out')?.trim();
            if (productDataString) {
                try {
                    const productData = JSON.parse(productDataString);
                    $('#repeater-container-update').html('');  // Réinitialiser le conteneur
                    repeaterIndex = 0;

                    productData.forEach((product) => {
                        addProductItem(product);
                    });
                } catch (error) {
                    console.error('Erreur lors du parsing des données produit:', error);
                }
            }

            // Ajouter un nouvel élément à la demande de l'utilisateur
            addButton.addEventListener('click', () => {
                addProductItem({ stock_id: "", product_name: "Produit", quantity: "", amount_total: "" });
            });

            // Écoute les changements sur les sélecteurs de produits et les champs de quantité
            $(document).on('input', '#quantityUpdate, .product-select-update', function() {
                calculateAmounts();
            });
            calculateAmounts();

            function calculateAmounts() {
                let totalSale = 0;
                let totalPurchase = 0;

                $('#repeater-container-update .member-group').each(function() {
                    // Récupérer la quantité, les prix et le nom du produit sélectionné
                    const quantity = $(this).find('#quantityUpdate').val();
                    const salePrice = $(this).find('.product-select-update option:selected').data('sale_price');
                    const purchasePrice = $(this).find('.product-select-update option:selected').data('purchase_price');
                    const productName = $(this).find('.product-select-update option:selected').data('product_name');
                    
                    // Utiliser la valeur par défaut de `amount_total_update` si `quantity` est vide
                    let amountTotal = quantity ? (quantity * salePrice) : $(this).find('#amount_total_update').val();

                    // Mettre à jour le montant total et le profit
                    $(this).find('#amount_total_update').val(amountTotal);
                    $(this).find('#Pprofit_update').val((salePrice - purchasePrice) * (quantity || 1));
                    $(this).find('#product_name_update').val(productName);

                    // Calculer les totaux
                    totalSale += parseFloat(amountTotal || 0);
                    if (quantity && purchasePrice) {
                        totalPurchase += quantity * purchasePrice;
                    }
                });

                // Mettre à jour les champs de total
                $('#amount_total_sale_update').val(totalSale);
                $('#amount_total_purchase_update').val(totalPurchase);
                $('#profitUpdate').val(totalSale - totalPurchase);
            }



            // Supprimer un élément lorsqu'on clique sur le bouton "remove"
            $(document).on('click', '.remove-item', function () {
                $(this).closest('[data-repeater-item]').remove();
                calculateAmounts();
            });
        });
    });
});


$('#repeaterFormUpdate').on('submit', function() {
    $('#amount_total_sale_update, #amount_total_purchase_update, #profitUpdate, #amount_total_update').prop('disabled', false);
});

</script>

<?= $this->endSection() ?>