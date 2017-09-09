@extends('layouts.app')

@section('title')
{{$data['meta_title'] }}
@endsection


@section('meta_keyword')
{{$data['meta_keyword'] }}
@endsection



@section('content')



<h1><u>{{$data['drink_cat_name'] }} </u></h1>

<div class="row">


<?php $name =$data['slug'] ?>


<?php $i=1; ?>
@foreach ($value as $k => $data)


<div class="col-md-4 col-sm-12 col-xs-12" style=" padding-top:50px; padding-bottom:50px">


<?php
if(isset($data->image)==null) {$url="noimg.jpg";}else{ $url=$data->image[0];}
?>
<img src="{{url('uploads')}}/{{$url}}" class="img img-tumbnail img-responsive" style="width: 100%;height: 280px;" >



  <a href="{{url('drinks-categories')}}/{{$name}}/{{$data->slug}}" class="btn btn-primary btn-block"><h4>{{$data->drinks_name}}</h4></a>

</div>
<?php  


if(($i++)%3==0)
      {
	 echo "<div class='clearfix'></div>";  
	  }
	  else
       {} ?>
        



  @endforeach


</div>
@endsection
		
