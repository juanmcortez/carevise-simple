{{ __('Patient list') }}
<br />
<br />
@if($patients->isEmpty())
    {{ __('There are no patients available.') }}
@else
    @foreach($patients as $patient)
        <a href="{{ route('patients.detail', ['patient' => $patient->demographic->emailAddress->email]) }}" target="_self">
            {{ $patient }}
        </a>
        <br />
    @endforeach
    <br />
    <br />
    {!! $patients->links() !!}
@endif
