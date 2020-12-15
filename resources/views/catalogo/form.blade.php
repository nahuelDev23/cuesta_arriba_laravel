{{$title}}
<form action="{{$route}}" method="POST" enctype="multipart/form-data">
@csrf
@isset($update)
    @method("PUT")
@endisset
{{__("nombre")}}
<input type="text"  name="nombre">    
{{__("precio")}}
<input type="text"  name="precio" > 
{{__("partada")}}
<input type="file" name="portada" >  
{{__("imagenes")}}
<input type="file" name="imagenes[]" multiple>    
<button type="submit">{{$textButton}}</button>
</form>