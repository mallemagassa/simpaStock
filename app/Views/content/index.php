<?= $this->extend('layouts/_default/dashboard', $notifications) ?> 

<?= $this->section('content') ?>
<div class="px-4 pt-6">


    <div class="grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-2 2xl:grid-cols-3">
      <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="w-full">
          <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">New products</h3>
          <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">2,340</span>
          <p class="flex items-center text-base font-normal text-gray-500 dark:text-gray-400">
            <span class="flex items-center mr-1.5 text-sm text-green-500 dark:text-green-400">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
              </svg>
              12.5% 
            </span>
            Since last month
          </p>
        </div>
        <div class="w-full" id="new-products-chart"></div>
      </div>
      <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="w-full">
          <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Users</h3>
          <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">2,340</span>
          <p class="flex items-center text-base font-normal text-gray-500 dark:text-gray-400">
            <span class="flex items-center mr-1.5 text-sm text-green-500 dark:text-green-400">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
              </svg>
              3,4% 
            </span>
            Since last month
          </p>
        </div>
        <div class="w-full" id="week-signups-chart"></div>
      </div>
      <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
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
      </div>
    </div>


    
   
</div>
<div class="px-4 pt-6 pb-6">
<div class="grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-2 2xl:grid-cols-3">
  <a href="#" class="flex items-center justify-center p-4 bg-white w-[5rem] border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800 transition-transform transform hover:scale-105">
    <div class="text-center">
      <h3 class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">Name boutique</h3>
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="rgb(26, 86, 219)" class="size-6 mx-auto">
        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
      </svg>
      <p class="flex items-center justify-center text-base font-normal text-gray-500 dark:text-gray-400">
        Address
      </p>
    </div>
  </a>
</div>

</div>

<?= $this->endSection() ?>
