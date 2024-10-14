<?= $this->extend('layouts/_default/main') ?> <!-- Étendre la mise en page de base -->

<?= $this->section('main') ?>
<div class="flex flex-col items-center justify-center px-6 pt-8 mx-auto md:h-screen pt:mt-0 dark:bg-gray-900">
    <a href="" class="flex items-center justify-center mb-8 text-2xl font-semibold lg:mb-10 dark:text-white">
         <img src="<?= base_url('assets/images/logo/logo.png') ?>" class="mr-4 h-11" alt="FlowBite Logo">
        <span></span>   
    </a>
    <!-- Card -->
    <div class="w-full max-w-xl p-6 space-y-8 sm:p-8 bg-white rounded-lg shadow dark:bg-gray-800">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
            Se connecter à la plateforme
        </h2>

        <?php if (session('error') !== null) : ?>
            <div class="alert alert-danger text-gray-900 dark:text-white" role="alert"><?= session('error') ?></div>
            
            <?php elseif (session('errors') !== null) : ?>
                <div class="alert alert-danger text-gray-900 dark:text-white" role="alert">
                    <?php if (is_array(session('errors'))) : ?>
                        <?php foreach (session('errors') as $error) : ?>
                            <?= $error ?>
                            <br>
                        <?php endforeach ?>
                    <?php else : ?>
                        <?= session('errors') ?>
                    <?php endif ?>
                </div>
            <?php endif ?>

            <?php if (session('message') !== null) : ?>
            <div class="alert alert-success text-gray-900 dark:text-white" role="alert"><?= session('message') ?></div>
        <?php endif ?>

        <form class="mt-8 space-y-6" action="<?= url_to('login') ?>" method="post">
            <?= csrf_field() ?>
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre email</label>
                <input type="email" name="email" id="email" inputmode="email" autocomplete="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="name@company.com" required>
            </div>

            <div>
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre mot de passe</label>
                <input type="password" name="password" inputmode="text" autocomplete="current-password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
            </div>
            
            <?php if (setting('Auth.sessionConfig')['allowRemembering']): ?>
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="remember" aria-describedby="remember" name="remember" <?php if (old('remember')): ?> checked<?php endif ?> type="checkbox" class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600" required>
                    </div>
                    <div class="ml-3 text-sm">
                    <label for="remember" class="font-medium text-gray-900 dark:text-white">Se souvenir de moi</label>
                    </div>
                    <?php if (setting('Auth.allowMagicLinkLogins')) : ?>
                        <p class="ml-auto text-sm text-primary-700 hover:underline dark:text-primary-500"><a href="<?= url_to('magic-link') ?>">Mot de passe oubliée</a></p>
                    <?php endif ?>
                </div>
            <?php endif; ?>

            <button type="submit" class="w-full px-5 py-3 text-base font-medium text-center text-white bg-primary-700 rounded-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Connectez-vous à votre compte</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>