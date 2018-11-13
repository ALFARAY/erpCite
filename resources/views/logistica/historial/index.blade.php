@extends ('layouts.admin')
@section ('contenido')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
<div>
  <h1 class="asd">Material N° {{$var}}</h1>
</div>
  <hr class=" my-4">
  {!! $chart->container() !!}
    {!! $chart->script() !!}
@endsection
