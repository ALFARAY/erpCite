{!! Form::open(array('url'=>'logistica/kardex','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="form-group">
  <div class="input-group ">
    <input type="text" class="form-control col-md-4" name="searchtext" placeholder="Codigo de material" value="{{$searchtext}}">
    <span class="input-group-btn">
      <button type="submit" class="bttn-jelly bttn-md bttn-primary">Buscar</button>
    </span>
  </div>
</div>
{{Form::close()}}
