{{ __('Patient list') }}
<br />
<br />
@foreach($patients as $patient)
    {{ $patient }}<br />
@endforeach
<br />
<br />
{!! $patients->links() !!}
