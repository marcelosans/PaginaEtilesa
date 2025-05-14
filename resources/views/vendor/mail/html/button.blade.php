@props([
    'url',
    'color' => 'purple', // Cambiado de 'primary' a 'purple' como valor por defecto
    'align' => 'center',
])
<table class="action" align="{{ $align }}" width="100%" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td align="{{ $align }}">
<table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td align="{{ $align }}">
<table border="0" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td>
<a href="{{ $url }}" 
   class="button" 
   target="_blank" 
   rel="noopener" 
   style="background-color: #6f42c1; color: #ffffff; padding: 10px 18px; border-radius: 4px; text-decoration: none; display: inline-block;">
    {{ $slot }}
</a>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>