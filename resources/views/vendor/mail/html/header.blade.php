<tr>
<td class="header">
<a href="" style="display: inline-block;">
@if (trim($slot) === 'CONTRATMX')
<img src="{{ asset('img/logo3.png') }}" class="logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
