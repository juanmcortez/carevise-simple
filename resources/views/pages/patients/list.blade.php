{{ __('Patient list') }}
<br />
<br />
@if($patients->isEmpty())
    {{ __('There are no patients available.') }}
@else
    <table>
    @foreach($patients as $patient)
       <tr onclick="window.location='{{ route('patients.detail', ['patient' => $patient->demographic->name_slug]) }}'">
           <td>{{ $patient->demographic->complete_name }}</td>
           <td>{{ $patient->demographic->phone }}</td>
           <td>{{ $patient->demographic->date_of_birth->format('M d, Y') }}</td>
           <td>{{ $patient->pid }}</td>
           <td></td>
       </tr>
    @endforeach
    </table>
    <br />
    <br />
    {!! $patients->links() !!}
@endif
