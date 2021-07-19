<a href="{{ route('busoperators.show', $busoperator) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="View Bus Operator"> <i class="mdi mdi-eye"></i></a>

<a href="{{ route('busoperators.edit', $busoperator) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Edit Bus Operator"> <i class="mdi mdi-square-edit-outline"></i></a>

<a href="{{ route('busoperators.destroy', $busoperator) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Delete Bus Operator"
onclick="event.preventDefault();document.getElementById('remove-page-form_{{ $busoperator->id }}').submit();"> <i class="mdi mdi-delete"></i></a>

<form id="remove-page-form_{{ $busoperator->id }}" action="{{ route('busoperators.destroy', $busoperator) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>