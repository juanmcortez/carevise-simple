{{ __('Encounter #:number details', ['number' => $encounter->enc]) }}
<br />
<br />
{{ $encounter }}
<br />
<br />
@if($encounter->charges->isEmpty())
    {{ __('There are no charges for this encounter.') }}
@else
    @foreach($encounter->charges as $charge)
        {{ $charge }}<br />
        @if($charge->icds->count())
            @foreach($charge->icds as $icd)
                {{ __('ICD: :code | :desc', ['code' => $icd->code, 'desc' => $icd->code_description]) }}<br />
            @endforeach
        @endif
        <br />
    @endforeach
@endif
