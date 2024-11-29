<x-layouts.carevise>
    {{-- PAGE TITLE --}}
    <x-slot:title>{{ __('Encounter # :enc - :name', ['enc' => $encounter->enc, 'name' => $encounter->patient->demographic->complete_name]) }}</x-slot>
    {{-- PAGE TITLE ICON - OPTIONAL --}}
    <x-slot:titleIcon>file-invoice-dollar</x-slot>
    {{-- PAGE HEADERS - OPTIONAL --}}
    {{--
    <x-slot:subHeaderLeft></x-slot:subHeaderLeft>
    <x-slot:subHeaderRight></x-slot:subHeaderRight>
    --}}

    {{-- PAGE CONTENT --}}
    {{ $encounter }}
    <br />
    <br />
    @if($encounter->charges->isEmpty())
        {{ __('There are no charges for this encounter.') }}
    @else
        @foreach($encounter->charges as $charge)
            {{ $charge }}<br />
            @if($charge->icds->count())
                <br />
                @foreach($charge->icds as $icd)
                    {{ __('ICD: :code | :desc', ['code' => $icd->code, 'desc' => $icd->code_description]) }}<br />
                @endforeach
            @endif
            @if($charge->payments->count())
                <br />
                @foreach($charge->payments as $payment)
                    {{ $payment }}<br />
                @endforeach
            @endif
            <br />
        @endforeach
    @endif
</x-layouts.carevise>
