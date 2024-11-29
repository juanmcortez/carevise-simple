@props([
    'route' => 'dashboard',
    'icon' => null,
    'active' => '',
    'target' => '_self',
    'class' => null,
])
<div @class(['group menu-link', $class])
     x-data="{ tooltipVisible: false }"
     @mouseenter="tooltipVisible = true"
     @mouseleave="tooltipVisible = false">
    <a href="{{ route($route) }}"
       class="{{ request()->routeIs($route) ? 'active' : 'regular' }}"
       target="{{ $target }}">
        @if($icon)
            <i class="fi fi-rs-{{ $icon }}"></i>
        @else
            {{ $slot }}
        @endif
    </a>
    @if($slot && $icon)
    <div x-show="tooltipVisible" class="tooltip">{{ $slot }}</div>
    @endif
</div>
