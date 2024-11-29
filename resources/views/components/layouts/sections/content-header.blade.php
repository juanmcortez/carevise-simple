@props([
    'left' => false,
    'right' => false,
])
<div id="content-header">
    @if($left)
    <section class="content-header-left">
        {{ $left }}
    </section>
    @endif

    @if($right)
    <section class="content-header-right">
        {{ $right }}
        <a href="#" class="flex justify-center items-center bg-light border border-dark/20 rounded p-2 leading-5 hover:bg-light-fade/20 hover:text-dark-fade hover:border-light-grey transition-all duration-150 ease-in">
            <i class="fi fi-rs-print leading-3"></i>
        </a>
        <a href="#" class="flex justify-center items-center bg-light border border-dark/20 rounded p-2 leading-5 hover:bg-light-fade/20 hover:text-dark-fade hover:border-light-grey transition-all duration-150 ease-in">
            <i class="fi fi-rs-file-pdf leading-3"></i>
        </a>
        <a href="#" class="flex justify-center items-center bg-light border border-dark/20 rounded p-2 leading-5 hover:bg-light-fade/20 hover:text-dark-fade hover:border-light-grey transition-all duration-150 ease-in">
            <i class="fi fi-rs-file-download leading-3"></i>
        </a>
    </section>
    @endif
</div>
