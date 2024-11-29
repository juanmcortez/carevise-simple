<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ (empty($title) ? '' : $title . ' - ') . config('app.name', 'Carevise CRM') }}</title>

    <style>
        [x-cloak] { display: none !important; }
    </style>

    @vite(['resources/css/carevise.css', 'resources/js/carevise.js'])

</head>
<body>
    <div id="app-holder" x-data="{ sidebarOpen: false }" x-cloak>
        {{-- SIDEBAR --}}
        <aside x-bind:class="{'translate-x-0': sidebarOpen, '-translate-x-16': !sidebarOpen}">
            <x-layouts.sections.sidebar />
        </aside>

        {{-- MAIN --}}
        <main x-bind:class="{'pl-20': sidebarOpen, 'pl-4': !sidebarOpen}">
            {{-- HEADER --}}
            <x-layouts.sections.header :title="$title ?? config('app.name', 'Carevise CRM')" :titleIcon="$titleIcon ?? null" />

            {{-- CONTENT --}}
            <div id="content">
                {{-- CONTENT HEADER --}}
                @if(isset($subHeaderRight) || isset($subHeaderLeft))
                <x-layouts.sections.content-header :right="$subHeaderRight ?? null" :left="$subHeaderLeft ?? null" />
                @endif

                {{-- CONTENT BLOCK --}}
                <div id="content-block">
                    @if ($slot->isEmpty())
                        {{ __('There is no content available in this page.') }}
                    @else
                        {!! $slot !!}
                    @endif
                </div>

                {{-- FOOTER --}}
                <x-layouts.sections.footer />
            </div>
        </main>
    </div>
</body>
</html>
