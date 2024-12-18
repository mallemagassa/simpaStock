<?= $this->extend('layouts/_default/dashboard', $notifications) ?> 

<?= $this->section('content') ?>
<div class="px-4 pt-6">

<?php  

$user = auth()->user();
if ($user->inGroup('boutiquier'))
?>


    <div class="grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-2 2xl:grid-cols-3">
      <?php  if ($user->inGroup('admin', 'gestionnaire')) :?>
      <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
      <div class="w-full">
          <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Produits</h3>
          <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white"><?= sizeof($products) ?></span>
          <!--<p class="flex items-center text-base font-normal text-gray-500 dark:text-gray-400">
            <span class="flex items-center mr-1.5 text-sm text-green-500 dark:text-green-400">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
              </svg>
              12.5% 
            </span>
            Since last month
          </p> -->
        </div>
        <div class="w-full" id="new-products-chart"></div>
      </div>
      
      <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="w-full">
          <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Montant</h3>
          <?php 
            $sum = 0;
            $sum2 = 0;
            foreach ($outs as $value) {
              $sum += abs($value['amount_total_sale']);
              $sum2 += abs($value['profit']);
            }
          ?>
          <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white"><?= number_format(abs(esc($sum)), 0, '.', ' ') ?> F</span>
          <!--<p class="flex items-center text-base font-normal text-gray-500 dark:text-gray-400">
            <span class="flex items-center mr-1.5 text-sm text-green-500 dark:text-green-400">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
              </svg>
              3,4% 
            </span>
            Since last month
          </p>-->
        </div>
        <div class="w-full" id="week-signups-chart"></div>
      </div>

      <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="w-full">
          <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Bénéfice</h3>
          <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white"><?=number_format(abs(esc($sum2)), 0, '.', ' ') ?> F</span>
          <!--<p class="flex items-center text-base font-normal text-gray-500 dark:text-gray-400">
            <span class="flex items-center mr-1.5 text-sm text-green-500 dark:text-green-400">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
              </svg>
              3,4% 
            </span>
            Since last month
          </p>-->
        </div>
        <div class="w-full" id="week-signups-chart2"></div>
      </div>
      <?php  endif?>

      <!--<div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="w-full">
          <h3 class="mb-2 text-base font-normal text-gray-500 dark:text-gray-400">Audience by age</h3>
          <div class="flex items-center mb-2">
            <div class="w-16 text-sm font-medium dark:text-white">50+</div>
            <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
              <div class="bg-primary-600 h-2.5 rounded-full dark:bg-primary-500" style="width: 18%"></div>
            </div>
          </div>
          <div class="flex items-center mb-2">
            <div class="w-16 text-sm font-medium dark:text-white">40+</div>
            <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
              <div class="bg-primary-600 h-2.5 rounded-full dark:bg-primary-500" style="width: 15%"></div>
            </div>
          </div>
          <div class="flex items-center mb-2">
            <div class="w-16 text-sm font-medium dark:text-white">30+</div>
            <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
              <div class="bg-primary-600 h-2.5 rounded-full dark:bg-primary-500" style="width: 60%"></div>
            </div>
          </div>
          <div class="flex items-center mb-2">
            <div class="w-16 text-sm font-medium dark:text-white">20+</div>
            <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
              <div class="bg-primary-600 h-2.5 rounded-full dark:bg-primary-500" style="width: 30%"></div>
            </div>
          </div>
        </div>
        <div id="traffic-channels-chart" class="w-full"></div>
      </div>-->


    </div>


    
   
</div>
<div class="px-4 pt-6 pb-6">
  <?php  if ($user->inGroup('admin', 'gestionnaire', 'boutiquier')) :?>
<div class="grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-2 2xl:grid-cols-3">
  <?php foreach ($shops as $value) : ?>
    <a href="<?= base_url('shop/show/'.esc($value['id'])) ?>" class="flex items-center justify-center p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800 transition-transform transform hover:scale-105">
      <div class="text-center">
        <h3 class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white"><?=esc($value['name'])?></h3>
        <img class="" 
      src="<?= isset($value['logo_shop']) && $value['logo_shop'] ? base_url(esc($value['logo_shop'])) : base_url('assets/images/boutique/shop.png') ?>" 
      alt="<?= esc($value['logo_shop']) ? esc($value['logo_shop']) : 'Image par défaut' ?>">
        <p class="flex items-center justify-center text-base font-normal text-gray-500 dark:text-gray-400">
        <?=esc($value['address'])?>
        </p>
      </div>
    </a>
  <?php endforeach  ?>  
</div>
<?php  endif?>
</div>

<?= $this->endSection() ?>
