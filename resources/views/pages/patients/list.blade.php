{{ __('Patient list') }}
<br />
<br />
@empty($patients)
    {{ __('There are no patients available.') }}
@else
    @foreach($patients as $patient)
        {{ $patient }}<br />
    @endforeach
    <br />
    <br />
    {!! $patients->links() !!}
@endempty
