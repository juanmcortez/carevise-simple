{{ __(':name details', ['name' => $patient->demographic->complete_name ?? 'PID ' . $patient->pid]) }}
<br />
<br />
{{ $patient }}<br />
{{ $patient->demographic }}<br />
{{ $patient->demographic->address }}<br />
{{ $patient->demographic->phone }}<br />
{{ $patient->demographic->cellphone }}<br />
{{ $patient->demographic->emailAddress }}
<br />
<br />
@if($patient->invoices->isEmpty())
    {{ __('There are no invoices available for this patient.') }}
@else
    @foreach($patient->invoices as $invoice)
        {{ $invoice }}
        <br />
    @endforeach
@endif
