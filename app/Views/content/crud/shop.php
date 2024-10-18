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
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Toutes les Boutique</h1>
        </div>

        <div class="items-center justify-end block sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700">
            <!--<div class="flex items-center mb-4 sm:mb-0">
                <form class="sm:pr-3" action="#" method="GET">
                    <label for="shops-search" class="sr-only">Search</label>
                    <div class="relative w-48 mt-1 sm:w-64 xl:w-96">
                        <input type="text" name="email" id="shops-search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search for shops">
                    </div>
                </form>
                <div class="flex items-center w-full sm:justify-end">
                    <div class="flex pl-2 space-x-1">
                        <a href="#" class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>
                        </a>
                        <a href="#" class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                        </a>
                        <a href="#" class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                        </a>
                        <a href="#" class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path></svg>
                        </a>
                    </div>
                </div>
            </div> -->
            <button id="createshopButton" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800" type="button" data-drawer-target="drawer-create-shop-default" data-drawer-show="drawer-create-shop-default" aria-controls="drawer-create-shop-default" data-drawer-placement="right">
                Ajouter
            </button>
        </div>



        <div class="items-end justify-end block sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700">
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
<div class="flex flex-col">
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
                                image
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                Nom
                            </th>
                            
                          
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                    <?php foreach ($shops as $value) : ?>
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">
                                <td onclick="window.location.href='<?= base_url('shop/show/' . esc($value['id'])) ?>'" class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-<?=esc($value['id']) ?>" aria-describedby="checkbox-1" type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-<?=esc($value['id']) ?>" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <td onclick="window.location.href='<?= base_url('shop/show/' . esc($value['id'])) ?>'" class="flex items-center p-4 mr-12 space-x-6 whitespace-nowrap">
                                    <img class="w-10 h-10 rounded-full" 
                                        src="<?= isset($value['logo_shop']) && $value['logo_shop'] ? base_url(esc($value['logo_shop'])) : base_url('assets/images/boutique/shop.png') ?>" 
                                        alt="<?= esc($value['logo_shop']) ? esc($value['logo_shop']) : 'Image par défaut' ?>">

                                    <div class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                        <div class="text-base font-semibold text-gray-900 dark:text-white"><?=esc($value['respon']) ?></div>
                                        <div class="text-sm font-normal text-gray-500 dark:text-gray-400"><?=esc($value['address']) ?></div>
                                    </div>
                                </td>
                                <td onclick="window.location.href='<?= base_url('shop/show/' . esc($value['id'])) ?>'" class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    <div class="text-base font-semibold text-gray-900 dark:text-white"><?=$value['name'] ?></div>
                                </td>
                            
                            <td class="p-4 space-x-2 whitespace-nowrap">
                                <button type="button" id="updateshopButton" data-id="<?=esc($value['id'])?>" data-name="<?=esc($value['name'])?>" data-respon="<?=esc($value['respon'])?>" data-address="<?=esc($value['address'])?>" data-logo_shop="<?=esc($value['logo_shop'])?>"
                                        data-drawer-target="drawer-update-shop-default" data-drawer-show="drawer-update-shop-default" aria-controls="drawer-update-shop-default" data-drawer-placement="right" 
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                                    </svg>
                                    Modifier
                                </button>

                                <button type="button" id="deleteshopButton" data-drawer-target="drawer-delete-shop-default" data-drawer-show="drawer-delete-shop-default" aria-controls="drawer-delete-shop-default" data-id="<?= esc($value['id']) ?>" data-drawer-placement="right" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    Supprimer
                                </button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    
                    </tbody>
                </table>
            </div>
        </div>
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
            <svg class="w-5 h-5 mr-1 -ml-1"" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            Previous
        </a>
        <a href="#" class="inline-flex items-center justify-center flex-1 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
            Next
            <svg class="w-5 h-5 ml-1 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        </a>
    </div>
</div>

<!-- Edit shop Drawer -->
<div id="drawer-update-shop-default" class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform <?= session('errors') ? 'translate-x-0' : 'translate-x-full' ?> bg-white dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
    <h5 id="drawer-label" class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">Update shop</h5>
    <button type="button" data-modal-toggle="edit-shop-modal" data-drawer-dismiss="drawer-update-shop-default" aria-controls="drawer-update-shop-default" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Fermer le menu</span>
    </button>
    
    <form action="<?= base_url('shop/update/') ?>" method="POST" id="edit-shop-form">
        <?= csrf_field() ?>

        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
        <input type="hidden" name="shop_id" id="shop_id">

        <div class="space-y-4">
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom de la Boutique:</label>
                <input type="text" name="name" value="<?= old('name') ?>" id="name" class="bg-gray-50 border <?= session('errors.name') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nom du Boutique" required>
                <?php if (session('errors.name')): ?>
                    <span class="text-red-500 text-xs"><?= session('errors.name') ?></span>
                <?php endif ?>
            </div>

            <div>
                <label for="respon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Résponsable de la Boutique:</label>
                <input type="text" name="respon" value="<?= old('respon') ?>" id="respon" class="bg-gray-50 border <?= session('errors.respon') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required>
                <?php if (session('errors.respon')): ?>
                    <span class="text-red-500 text-xs"><?= session('errors.respon') ?></span>
                <?php endif ?>
            </div>

            <div>
                <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adresse de la Boutique:</label>
                <input type="text" name="address" value="<?= old('address') ?>" id="address" class="bg-gray-50 border <?= session('errors.address') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required>
                <?php if (session('errors.address')): ?>
                    <span class="text-red-500 text-xs"><?= session('errors.address') ?></span>
                <?php endif ?>
            </div>

            <div>
                <input type="file" id="logo_shop" name="logo_shop" class="filepond" accept="image/*">
                <?php if (session('errors.logo_shop')): ?>
                    <span class="text-red-500 text-xs"><?= session('errors.logo_shop') ?></span>
                <?php endif ?>
            </div>

           
        </div>

        
        <div class="bottom-0 left-0 flex justify-center w-full pb-4 space-x-4 md:px-4 md:absolute">
            <button type="submit" class="text-white w-full justify-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Mettre à jour</button>
            <button type="button" data-drawer-dismiss="drawer-update-shop-default" aria-controls="drawer-update-shop-default" class="inline-flex w-full justify-center text-gray-500 items-center bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                <svg aria-hidden="true" class="w-5 h-5 -ml-1 sm:mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 9l6 6 6-6"></path></svg>
                <span class="sr-only">Close</span> 
                Annuler
            </button>
        </div>
    </div>
    </form>
</div>



<!-- Delete shop Drawer -->
<div id="drawer-delete-shop-default" class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform translate-x-full bg-white dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
    <h5 id="drawer-label" class="inline-flex items-center text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">Delete item</h5>
    <button type="button" data-drawer-dismiss="drawer-delete-shop-default" aria-controls="drawer-delete-shop-default" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Fermer menu</span>
    </button>
    <svg class="w-10 h-10 mt-8 mb-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
    <h3 class="mb-6 text-lg text-gray-500 dark:text-gray-400">Are you sure you want to delete this shop?</h3>
    <!-- Ce bouton sera modifié par le JavaScript -->
    <a href="#" id="confirmDeleteButton" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2.5 text-center mr-2 dark:focus:ring-red-900">
        Oui
    </a>
    <a href="#" class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 border border-gray-200 font-medium inline-flex items-center rounded-lg text-sm px-3 py-2.5 text-center dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700" data-drawer-hide="drawer-delete-shop-default">
        Non, Annuler
    </a>
</div>


<!-- Add shop Drawer -->
<div id="drawer-create-shop-default" class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform <?= session('errors') ? 'translate-x-0' : 'translate-x-full' ?> bg-white dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
    <h5 id="drawer-label" class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">New shop</h5>
    <button type="button" data-drawer-dismiss="drawer-create-shop-default" aria-controls="drawer-create-shop-default" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Fermer menu</span>
    </button>
    
    <form action="<?= base_url('shop/store') ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

        <div class="space-y-4">
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom du Boutique:</label>
                <input type="text" name="name" value="<?= old('name') ?>" id="name" class="bg-gray-50 border <?= session('errors.name') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type shop name" required>
                <?php if (session('errors.name')): ?>
                    <span class="text-red-500 text-xs"><?= session('errors.name') ?></span>
                <?php endif ?>
            </div>
            
            <div>
                <label for="respon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Résponsable de la Boutique:</label>
                <input type="text" name="respon" value="<?= old('respon') ?>" id="respon" class="bg-gray-50 border <?= session('errors.respon') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required>
                <?php if (session('errors.respon')): ?>
                    <span class="text-red-500 text-xs"><?= session('errors.respon') ?></span>
                <?php endif ?>
            </div>
            
            <div>
                <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adresse de la Boutique:</label>
                <input type="text" name="address" value="<?= old('address') ?>" id="address" class="bg-gray-50 border <?= session('errors.address') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required>
                <?php if (session('errors.address')): ?>
                    <span class="text-red-500 text-xs"><?= session('errors.address') ?></span>
                <?php endif ?>
            </div>
            
            <div>
                <input type="file" name="logo_shop" class="filepond" accept="image/*">
                <?php if (session('errors.logo_shop')): ?>
                    <span class="text-red-500 text-xs"><?= session('errors.logo_shop') ?></span>
                <?php endif ?>
            </div>
            
            
            <div class="bottom-0 left-0 flex justify-center w-full pb-4 space-x-4 md:px-4 md:absolute">
                <button id="confirm-button" type="submit" class="text-white w-full justify-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Créer</button>
                <button type="button" data-drawer-dismiss="drawer-create-shop-default" aria-controls="drawer-create-shop-default" class="inline-flex w-full justify-center text-gray-500 items-center bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                    <svg aria-hidden="true" class="w-5 h-5 -ml-1 sm:mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    Annuler
                </button>
            </div>
        </div>
    </form>

</div>

<script>



document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('#deleteshopButton');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const shopId = this.getAttribute('data-id');

            const confirmDeleteButton = document.querySelector('#confirmDeleteButton');
            confirmDeleteButton.setAttribute('href', `/shop/delete/${shopId}`);
        });
    });
});

document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('#updateshopButton').forEach(button => {
            button.addEventListener('click', function() {
                const shopId = this.getAttribute('data-id');
                const shopName = this.getAttribute('data-name');
                const shopRespon = this.getAttribute('data-respon');
                const shopAddress = this.getAttribute('data-address');
                const shopLogo = this.getAttribute('data-logo_shop');

                document.getElementById('shop_id').value = shopId;
                document.getElementById('name').value = shopName;
                document.getElementById('respon').value = shopRespon;
                document.getElementById('address').value = shopAddress;
                document.getElementById('logo_shop').value = shopLogo;

                document.getElementById('edit-shop-form').setAttribute('action', '<?= base_url('shop/update/') ?>' + shopId);
            });
        });
    });


</script>


<?= $this->endSection() ?>

