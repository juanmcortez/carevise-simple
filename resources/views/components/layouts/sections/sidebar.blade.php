<h1 id="logo">
    <a href="{{ route('dashboard') }}" title="{{ config('app.name', 'Carevise CRM') }}" target="_self">
        <i class="fi fi-rs-message-quote"></i>
    </a>
</h1>
<nav>
    <div id="main-menu-top">
        <x-main-menu-links />
    </div>
    <div id="main-menu-bottom">
        <x-commons.menu-link icon="moon-stars">{{ __('Dark mode') }}</x-commons.menu-link>

        <x-commons.menu-link icon="interrogation">{{ __('Help') }}</x-commons.menu-link>

        <x-commons.menu-link icon="log-out" class="logout">{{ __('Logout') }}</x-commons.menu-link>
    </div>
</nav>
