<header>
    <section class="header-left">
        <h2>
            @isset($titleIcon)
                <i class="fi fi-rs-{{$titleIcon}}"></i><span>{{ $title }}</span>
            @else
                {{ $title }}
            @endisset
        </h2>
    </section>
    <section class="header-center">HDRC</section>
    <section class="header-right">
        <div class="flex items-center space-x-6">
            <!-- Notifications -->
            <button class="relative text-primary hover:text-secondary">
                <i class="fi fi-rs-bell text-xl inline-block w-6 h-6"></i>
                <span class="absolute -top-1.5 -right-1 h-4 w-4 bg-danger rounded-full flex items-center justify-center">
                    <span class="text-xs text-light">3</span>
                </span>
            </button>

            <!-- User Profile -->
            <x-commons.user-dropdown />
        </div>
    </section>
</header>
