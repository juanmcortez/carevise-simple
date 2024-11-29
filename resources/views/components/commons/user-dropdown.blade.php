<div class="relative" x-data="{ profileOpen: false }">
    <button @click="profileOpen = !profileOpen" class="flex items-center space-x-3 focus:outline-none bg-light-grey/10 rounded px-3 py-1">
        <div class="w-8 h-8 rounded-full bg-light-fade/10 flex items-center justify-center">
            <i class="fi fi-rs-user text-dark-fade"></i>
        </div>
        <div class="hidden md:block text-left">
            <p class="text-sm font-medium text-dark/70">{{ __('Complete User Name') }}</p>
            <p class="text-xs text-dark/50">{{ __('user-email@address.com') }}</p>
        </div>
        <i x-show="!profileOpen" class="fi fi-rs-angle-down text-xs text-dark-grey"></i>
        <i x-show="profileOpen" class="fi fi-rs-angle-up text-xs text-dark-grey"></i>
    </button>
    <!-- Profile Dropdown -->
    <div x-show="profileOpen"
         @click.away="profileOpen = false"
         class="absolute right-0 mt-5 min-w-56 bg-light rounded shadow p-1 ring-1 ring-dark-grey ring-opacity-10">
        <a href="#" class="block px-4 py-2 text-sm text-dark-fade hover:bg-dark-grey/10">{{ __('Profile') }}</a>
        <a href="#" class="block px-4 py-2 text-sm text-dark-fade hover:bg-dark-grey/10">{{ __('Settings') }}</a>
    </div>
</div>
