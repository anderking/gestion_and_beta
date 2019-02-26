@component('mail::message')
# Solicitud de documentos UCLA

Código de la solicitud:
{{ $uuid->uuid }}

Usted ha solicitado los siguientes documentos:


<!-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent
!-->

<div >
<ul class="list-group">

<!-- Por ahora un if para cada documento, si viene en el request (si es seleccionado por el usuario)
    se mostrará-->
@if($documentos['1'])

<li class="list-group-item">
<H3>{{substr($documentos['1'], 0 , strrpos($documentos['1'], "-"))}}</H3> <H4> costo: </H4> <span>{{substr(strrchr($documentos['1'], "-"), 1)}}</span>
</li>
@endif
@if($documentos['2'])
<li class="list-group-item">
<H3>{{substr($documentos['2'], 0 , strrpos($documentos['2'], "-"))}}</H3> <H4> costo: </H4><span>{{substr(strrchr($documentos['2'], "-"), 1)}}</span>
</li>
@endif
@if($documentos['3'])
<li class="list-group-item">
<H3>{{substr($documentos['3'], 0 , strrpos($documentos['3'], "-"))}}</H3> <H4> costo: </H4><span>{{substr(strrchr($documentos['3'], "-"), 1)}}</span>
</li>
@endif
@if($documentos['4'])
<li class="list-group-item">
<<H3>{{substr($documentos['4'], 0 , strrpos($documentos['4'], "-"))}}</H3> <H4> costo: </H4> <span>{{substr(strrchr($documentos['4'], "-"), 1)}}</span>
</li>
@endif
@if($documentos['5'])
<li class="list-group-item">
<H3>{{substr($documentos['5'], 0 , strrpos($documentos['5'], "-"))}}</H3><H4> costo: </H4> <span>{{substr(strrchr($documentos['5'], "-"), 1)}}</span>
</li>
@endif
@if($documentos['6'])
<li class="list-group-item">
<H3>{{substr($documentos['6'], 0 , strrpos($documentos['6'], "-"))}}</H3> <H4> costo: </H4> <span>{{substr(strrchr($documentos['6'], "-"), 1)}}</span>
</li>
@endif
@if($documentos['7'])
<li class="list-group-item">
<H3>{{substr($documentos['7'], 0 , strrpos($documentos['7'], "-"))}}</H3> <H4> costo: </H4> <span>{{substr(strrchr($documentos['7'], "-"), 1)}}</span>
@endif

</ul>
</div>

Gracias por usar nuestro servicio,<br>
{{ config('app.name') }}
@endcomponent
