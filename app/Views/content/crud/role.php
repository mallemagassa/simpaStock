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
                      <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500" aria-current="page">Rôles</span>
                    </div>
                  </li>
                </ol>
            </nav>
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Toutes les Rôles</h1>
        </div>
        <div class="items-end justify-end block sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700">
            <!--<div class="flex items-center mb-4 sm:mb-0">
                <form class="sm:pr-3" action="#" method="GET">
                    <label for="Roles-search" class="sr-only">Recherche</label>
                    <div class="relative w-48 mt-1 sm:w-64 xl:w-96">
                        <input type="text" name="email" id="Roles-search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search for Roles">
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
            <?php if ($user->can('create.role')) :?>
                <button id="createRoleButton" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800" type="button" data-drawer-target="drawer-create-Role-default" data-drawer-show="drawer-create-Role-default" aria-controls="drawer-create-Role-default" data-drawer-placement="right">
                    Ajouter
                </button>
            <?php endif ?>
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
                                Nom
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                Description
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                    <?php if ($user->can('delete.role')) :?>
                        <?php foreach ($roles as $value) : ?>
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-<?=$value['id'] ?>" aria-describedby="checkbox-1" type="checkbox"
                                        class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-<?=$value['id'] ?>" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                <div class="text-base font-semibold text-gray-900 dark:text-white"><?=$value['name'] ?></div>
                            </td>
                            <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                <div class="text-base font-semibold text-gray-900 dark:text-white"><?=$value['description'] ?></div>
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
                                    <?php if ($user->can('edit.role')) :?>
                                    <li>
                                        <button type="button" id="updateRoleButton" 
                                            data-id="<?=$value['id']?>" 
                                            data-name="<?= htmlspecialchars($value['name'], ENT_QUOTES) ?>" 
                                            data-description="<?= htmlspecialchars($value['description'], ENT_QUOTES) ?>" 
                                            data-permissions='<?= json_encode($value['permissions'], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>'
                                            data-drawer-target="drawer-update-Role-default" 
                                            data-drawer-show="drawer-update-Role-default" 
                                            aria-controls="drawer-update-Role-default" 
                                            data-drawer-placement="right" 
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                            
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                                            </svg>
                                            Modifier
                                        </button>
                                    </li>
                                    <?php endif ?>
                                    <?php if ($user->can('delete.role')) :?>
                                    <li>
                                        <button type="button" id="deleteRoleButton" data-drawer-target="drawer-delete-Role-default" data-drawer-show="drawer-delete-Role-default" aria-controls="drawer-delete-Role-default" data-id="<?= $value['id'] ?>" data-drawer-placement="right" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
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
                        <?php endforeach  ?>  
                    <?php endif ?>                  
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Edit Role Drawer -->
<div id="drawer-update-Role-default" class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform <?= session('errors') ? 'translate-x-0' : 'translate-x-full' ?> bg-white dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
    <h5 id="drawer-label" class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">Modifier le Role</h5>
    <button type="button" data-drawer-dismiss="drawer-update-Role-default" aria-controls="drawer-update-Role-default" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Fermer le menu</span>
    </button>
    
    <form  method="POST" id="edit-role-form">
        <?= csrf_field() ?>

        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
        <input type="hidden" name="Role_id" id="Role_id">

        <div class="space-y-4">
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom de la rôle:</label>
                <input type="text" name="name" value="<?= old('name') ?>" id="name" class="bg-gray-50 border <?= session('errors.name') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nom du produit" required>
                <?php if (session('errors.name')): ?>
                 <span class="text-red-500 text-xs"><?= session('errors.name') ?></span>
                <?php endif ?>
            </div>
            <div>
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description:</label>
                <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border <?= session('errors.description') ? 'border-red-500' : 'border-gray-300' ?> focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter product description"><?= old('description') ?></textarea>
                <?php if (session('errors.description')): ?>
                    <span class="text-red-500 text-xs"><?= session('errors.description') ?></span>
                <?php endif ?>
            </div>
           
            <input type="hidden" id="selectedPermissionsEdit" name="permissions">
    
            <button type="button" data-modal-target="edit-permission-modal" data-modal-toggle="edit-permission-modal" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                </svg>
                Autorisation
            </button>
        </div>


        
        <div class="bottom-0 left-0 flex justify-center w-full pb-4 space-x-4 md:px-4 md:absolute">
            <button type="submit" class="text-white w-full justify-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Mettre à jour</button>
            <button type="button" data-drawer-dismiss="drawer-update-Role-default" aria-controls="drawer-update-Role-default" class="inline-flex w-full justify-center text-gray-500 items-center bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                <svg aria-hidden="true" class="w-5 h-5 -ml-1 sm:mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 9l6 6 6-6"></path></svg>
                <span class="sr-only">Close</span> 
                Annuler
            </button>
        </div>
    </div>
    </form>
</div>



<!-- Delete Role Drawer -->
<div id="drawer-delete-Role-default" class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform translate-x-full bg-white dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
    <h5 id="drawer-label" class="inline-flex items-center text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">Delete item</h5>
    <button type="button" data-drawer-dismiss="drawer-delete-Role-default" aria-controls="drawer-delete-Role-default" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Close menu</span>
    </button>
    <svg class="w-10 h-10 mt-8 mb-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
    <h3 class="mb-6 text-lg text-gray-500 dark:text-gray-400">Êtes-vous sûr de vouloir supprimer cette Roleé ?</h3>
    <!-- Ce bouton sera modifié par le JavaScript -->
    <a href="#" id="confirmDeleteButton" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2.5 text-center mr-2 dark:focus:ring-red-900">
        Oui
    </a>
    <a href="#" class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 border border-gray-200 font-medium inline-flex items-center rounded-lg text-sm px-3 py-2.5 text-center dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700" data-drawer-hide="drawer-delete-Role-default">
        Non, Annuler
    </a>
</div>


<!-- Add Role Drawer -->
<div id="drawer-create-Role-default" class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform <?= session('errors') ? 'translate-x-0' : 'translate-x-full' ?> bg-white dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
    <h5 id="drawer-label" class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">New Role</h5>
    <button type="button" data-drawer-dismiss="drawer-create-Role-default" aria-controls="drawer-create-Role-default" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Fermer le menu</span>
    </button>
    
    <form action="<?= base_url('roles/store') ?>" method="POST" id="roleForm">
        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

        <div class="space-y-4">
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom du Role :</label>
                <input type="text" name="name" value="<?= old('name') ?>" id="name" class="bg-gray-50 border <?= session('errors.name') ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type Role name" required>
                <?php if (session('errors.name')): ?>
                    <span class="text-red-500 text-xs"><?= session('errors.name') ?></span>
                <?php endif ?>
            </div>

            <div>
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description:</label>
                <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border <?= session('errors.description') ? 'border-red-500' : 'border-gray-300' ?> focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter product description"><?= old('description') ?></textarea>
                <?php if (session('errors.description')): ?>
                    <span class="text-red-500 text-xs"><?= session('errors.description') ?></span>
                <?php endif ?>
            </div>

            <!--<div>
                <label class="block text-gray-700 dark:text-gray-400 text-md font-bold mb-2" for="pair">
                Permissions:
                </label>
                <select
                    name="permissions[]"
                    class="js-example-basic-multiple bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  
                    data-placeholder="électionnez des options..."
                    data-allow-clear="false"
                    multiple="multiple"
                    title="Sélectionnez Permissions..." 
                    style="width: 100%;">
                    <?php foreach ($permissions as $permission): ?>
                        <option value="<?= esc($permission['id']) ?>"><?= esc($permission['name']) ?></option>
                    <?php endforeach ?>
                </select>
            </div>-->

            <button type="button" data-modal-target="add-permission-modal" data-modal-toggle="add-permission-modal" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">

                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                </svg>
                Autorisation
            </button>

            <input type="hidden" id="selectedPermissionsAdd" name="permissionsAdd">

            <div class="bottom-0 left-0 flex justify-center w-full pb-4 space-x-4 md:px-4 md:absolute">
                <button type="submit" class="text-white w-full justify-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Créer</button>
                <button type="button" data-drawer-dismiss="drawer-create-Role-default" aria-controls="drawer-create-Role-default" class="inline-flex w-full justify-center text-gray-500 items-center bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                    <svg aria-hidden="true" class="w-5 h-5 -ml-1 sm:mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    Annuler
                </button>
            </div>
        </div>
    </form>
</div>



<!-- edit-permission-modal -->
<div class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full" id="edit-permission-modal">
    <div class="relative w-full h-full max-w-2xl px-4 md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
            <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700">
                <h3 class="text-xl font-semibold dark:text-white">Autorisation Utilisateur</h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white" data-modal-toggle="edit-permission-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                </button>
            </div>
                <div class="p-6 space-y-6">
            <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Module Page
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Afficher
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Creer
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Modifier
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Supprimer
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Sortie
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Entree
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="flex items-center gap-2">
                                        <label for="green-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Management</label>
                                        <input id="main-checkbox-edit" name="" type="checkbox" value="" class="child-checkbox-edit checkbox-edit w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </th>
                            </tr>

                            <tr>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Produits
                                </th>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="show_product" type="checkbox" value="show.product" class="child-checkbox-edit checkbox-edit w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="create_product" type="checkbox" value="create.product" class="child-checkbox-edit checkbox-edit w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="edit_product" type="checkbox" value="edit.product" class="child-checkbox-edit checkbox-edit w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="delete_product" type="checkbox" value="delete.product" class="child-checkbox child-checkbox-edit checkbox-edit w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Utilisateurs
                                </th>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="show_user" type="checkbox" value="show.user" class="child-checkbox-edit checkbox-edit w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="create_user" type="checkbox" value="create.user" class="child-checkbox-edit checkbox-edit w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="edit_user" type="checkbox" value="edit.user" class="child-checkbox-edit checkbox-edit w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="delete_user" type="checkbox" value="delete.user" class="child-checkbox child-checkbox-edit checkbox-edit w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>

                            </tr>


                            <tr>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Stocks
                                </th>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="show_stock" type="checkbox" value="show.stock" class="child-checkbox-edit checkbox-edit w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="create_stock" type="checkbox" value="create.stock" class="child-checkbox-edit checkbox-edit w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="edit_stock" type="checkbox" value="edit.stock" class="child-checkbox-edit checkbox-edit w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="delete_stock" type="checkbox" value="delete.stock" class="child-checkbox child-checkbox-edit checkbox-edit w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="out_stock" type="checkbox" value="out.stock" class="child-checkbox-edit checkbox-edit w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="in_stock" type="checkbox" value="in.stock" class="child-checkbox-edit checkbox-edit w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>

                            </tr>

                            <tr>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Unitées
                                </th>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="show_unit" type="checkbox" value="show.unit" class="child-checkbox-edit checkbox-edit w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="create_unit" type="checkbox" value="create.unit" class="child-checkbox-edit checkbox-edit w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="edit_unit" type="checkbox" value="edit.unit" class="child-checkbox-edit checkbox-edit w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="delete_unit" type="checkbox" value="delete.unit" class="child-checkbox-edit checkbox-edit w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Boutiques
                                </th>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="show_shop" type="checkbox" value="show.shop" class="child-checkbox-edit checkbox-edit w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="create_shop" type="checkbox" value="create.shop" class="child-checkbox-edit checkbox-edit w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="edit_shop" type="checkbox" value="edit.shop" class="child-checkbox-edit checkbox-edit w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="delete_shop" type="checkbox" value="delete.shop" class="child-checkbox-edit checkbox-edit w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Sorties
                                </th>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="show_out" type="checkbox" value="show.out" class="child-checkbox-edit checkbox-edit w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="create_out" type="checkbox" value="create.out" class="child-checkbox-edit checkbox-edit w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="edit_out" type="checkbox" value="edit.out" class="child-checkbox-edit checkbox-edit w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="delete_out" type="checkbox" value="delete.out" class="child-checkbox-edit checkbox-edit w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Rapports
                                </th>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="show_report" type="checkbox" value="show.report" class="child-checkbox-edit checkbox-edit w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="create_report" type="checkbox" value="create.report" class="child-checkbox-edit checkbox-edit w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="edit_report" type="checkbox" value="edit.report" class="child-checkbox-edit checkbox-edit w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="delete_report" type="checkbox" value="delete.report" class="child-checkbox-edit checkbox-edit w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                            </tr>

                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Prémètre
                                </th>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="show_role" type="checkbox" value="show.role" class="checkbox-edit w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="create_role" type="checkbox" value="create.role" class="checkbox-edit w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="edit_role" type="checkbox" value="edit.role" class="checkbox-edit w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="delete_role" type="checkbox" value="delete.role" class="checkbox-edit w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-700">
                <button data-modal-toggle="edit-permission-modal" type="submit" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Appliquer</button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- add-permission-modal -->
<div class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full" id="add-permission-modal">
    <div class="relative w-full h-full max-w-2xl px-4 md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
            <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700">
                <h3 class="text-xl font-semibold dark:text-white">Autorisation Utilisateur</h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white" data-modal-toggle="add-permission-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                </button>
            </div>
                <div class="p-6 space-y-6">
            <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Module Page
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Afficher
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Creer
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Modifier
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Supprimer
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Sortie
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Entree
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="flex items-center gap-2">
                                        <label for="green-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Management</label>
                                        <input id="main-checkbox-add" name="" type="checkbox" value="" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </th>
                            </tr>

                            <tr>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Produits
                                </th>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="show_product" type="checkbox" value="show.product" class="child-checkbox-add checkbox-add w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="create_product" type="checkbox" value="create.product" class="child-checkbox-add checkbox-add w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="edit_product" type="checkbox" value="edit.product" class="child-checkbox-add checkbox-add w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="delete_product" type="checkbox" value="delete.product" class="child-checkbox-add checkbox-add w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Utilisateurs
                                </th>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="show_user" type="checkbox" value="show.user" class="child-checkbox-add checkbox-add w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="create_user" type="checkbox" value="create.user" class="child-checkbox-add checkbox-add w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="edit_user" type="checkbox" value="edit.user" class="child-checkbox-add checkbox-add w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="delete_user" type="checkbox" value="delete.user" class="child-checkbox-add checkbox-add w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>

                            </tr>


                            <tr>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Stocks
                                </th>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="show_stock" type="checkbox" value="show.stock" class="child-checkbox-add checkbox-add w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="create_stock" type="checkbox" value="create.stock" class="child-checkbox-add checkbox-add w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="edit_stock" type="checkbox" value="edit.stock" class="child-checkbox-add checkbox-add w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="delete_stock" type="checkbox" value="delete.stock" class="child-checkbox-add checkbox-add w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="out_stock" type="checkbox" value="out.stock" class="child-checkbox-add checkbox-add w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="in_stock" type="checkbox" value="in.stock" class="child-checkbox-add checkbox-add w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>

                            </tr>

                            <tr>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Unitées
                                </th>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="show_unit" type="checkbox" value="show.unit" class="child-checkbox-add checkbox-add w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="create_unit" type="checkbox" value="create.unit" class="child-checkbox-add checkbox-add w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="edit_unit" type="checkbox" value="edit.unit" class="child-checkbox-add checkbox-add w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="delete_unit" type="checkbox" value="delete.unit" class="child-checkbox-add checkbox-add w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Boutiques
                                </th>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="show_shop" type="checkbox" value="show.shop" class="child-checkbox-add checkbox-add w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="create_shop" type="checkbox" value="create.shop" class="child-checkbox-add checkbox-add w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="edit_shop" type="checkbox" value="edit.shop" class="child-checkbox-add checkbox-add w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="delete_shop" type="checkbox" value="delete.shop" class="child-checkbox-add checkbox-add w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Rapports
                                </th>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="show_report" type="checkbox" value="show.report" class="child-checkbox-add checkbox-add w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="create_report" type="checkbox" value="create.report" class="child-checkbox-add checkbox-add w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="edit_report" type="checkbox" value="edit.report" class="child-checkbox-add checkbox-add w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="delete_report" type="checkbox" value="delete.report" class="child-checkbox-add checkbox-add w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                            </tr>

                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Prémètre
                                </th>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="show_role" type="checkbox" value="show.role" class="checkbox-add w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="create_role" type="checkbox" value="create.role" class="checkbox-add w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="edit_role" type="checkbox" value="edit.role" class="checkbox-add w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center me-4">
                                        <input name="delete_role" type="checkbox" value="delete.role" class="checkbox-add w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-700">
                    <button data-modal-toggle="add-permission-modal" type="submit" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Appliquer</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

document.addEventListener('DOMContentLoaded', function () {
    // Sélectionner tous les boutons d'édition de rôle
    const editPermissionButtons = document.querySelectorAll('#updateRoleButton');

    editPermissionButtons.forEach(button => {
        button.addEventListener('click', function () {
            const permissions = JSON.parse(this.getAttribute('data-permissions'));

            // Décocher toutes les cases au départ
            document.querySelectorAll('#edit-permission-modal input[type="checkbox"]').forEach(checkbox => {
                checkbox.checked = false;
            });

            // Cocher les permissions existantes pour le rôle
            permissions.forEach(permission => {

                console.error(permission.name);
                
                const checkbox = document.querySelector(`#edit-permission-modal input[value="${permission.name}"]`);
                if (checkbox) {
                    checkbox.checked = true;
                }
            });
        });
    });
});


document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('#updateRoleButton').forEach(button => {
        button.addEventListener('click', function () {
            const form = document.getElementById('edit-role-form');
            const RoleId = button.getAttribute('data-id');
            form.action = `<?=base_url('roles/update/')?>${RoleId}`;
            const Rolename = button.getAttribute('data-name');
            const Roledescription = button.getAttribute('data-description');
            const Rolepermissions = JSON.parse(button.getAttribute('data-permissions')); // Parse as JSON

            document.getElementById('name').value = Rolename;
            document.getElementById('description').value = Roledescription;
            document.getElementById('Role_id').value = RoleId;

            // Mettez à jour les permissions
            const permissionsArray = Rolepermissions; // Already an array of objects
            console.log(permissionsArray);

            var s2 = $("#selectPermissionUpdate").select2();

            permissionsArray.forEach(function(permission){
                const permissionId = permission.id;
                const permissionName = permission.name;

                // Vérifiez si l'option avec cet ID existe déjà, sinon ajoutez-la
                if (!s2.find('option[value="' + permissionId + '"]').length) {
                    console.log(permission);
                    s2.append($('<option>').val(permissionId).text(permissionName));
                }
            });

            // Sélectionnez les permissions par leur ID
            s2.val(permissionsArray.map(p => p.id)).trigger("change"); 

            modal.classList.remove('hidden');
        });
    });
});


document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('#deleteRoleButton');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const RoleId = this.getAttribute('data-id');

            const confirmDeleteButton = document.querySelector('#confirmDeleteButton');
            confirmDeleteButton.setAttribute('href', `/roles/delete/${RoleId}`);
        });
    });
});


 // Récupérer la case principale
const mainCheckboxEdit = document.getElementById("main-checkbox-edit");

const childCheckboxesEdit = document.querySelectorAll(".child-checkbox-edit");

// Ajouter un événement pour cocher/décocher toutes les cases enfant en fonction de la case principale
mainCheckboxEdit.addEventListener("change", function() {
    childCheckboxesEdit.forEach(checkbox => {
        checkbox.checked = mainCheckboxEdit.checked;
    });
});


const mainCheckboxAdd = document.getElementById("main-checkbox-add");

const childCheckboxesAdd = document.querySelectorAll(".child-checkbox-add");

// Ajouter un événement pour cocher/décocher toutes les cases enfant en fonction de la case principale
mainCheckboxAdd.addEventListener("change", function() {
    childCheckboxesAdd.forEach(checkbox => {
        checkbox.checked = mainCheckboxAdd.checked;
    });
});


document.addEventListener('DOMContentLoaded', function () {
    // Bouton "Appliquer" dans le modal
    document.querySelector('#edit-permission-modal button[type="submit"]').addEventListener('click', function (e) {
        e.preventDefault();

        // Récupérer toutes les cases à cocher sélectionnées
        const selectedPermissions = Array.from(document.querySelectorAll('#edit-permission-modal input.checkbox-edit:checked'))
            .map(checkbox => checkbox.value);

        // Ajouter les autorisations sélectionnées au champ caché du drawer
        document.getElementById('selectedPermissionsEdit').value = selectedPermissions.join(',');

        // Fermer le modal
        document.getElementById('edit-permission-modal').classList.add('hidden');
    });
});

document.addEventListener('DOMContentLoaded', function () {
    // Bouton "Appliquer" dans le modal
    document.querySelector('#add-permission-modal button[type="submit"]').addEventListener('click', function (e) {
        e.preventDefault();

        // Récupérer toutes les cases à cocher sélectionnées
        const selectedPermissionsAdd = Array.from(document.querySelectorAll('#add-permission-modal input.checkbox-add:checked'))
            .map(checkbox => checkbox.value);

        // Ajouter les autorisations sélectionnées au champ caché du drawer
        document.getElementById('selectedPermissionsAdd').value = selectedPermissionsAdd.join(',');

        // Fermer le modal
        document.getElementById('add-permission-modal').classList.add('hidden');
    });
});


</script>


<?= $this->endSection() ?>

