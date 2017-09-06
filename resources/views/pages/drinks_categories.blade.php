@extends('layouts.app')

@section('title')
drinks category
@endsection


@section('meta_keyword')
drinks category all type drinks
@endsection

@section('content')


<h1><u>Drinks Categories</u></h1>
<div class="row">




<?php $i=1; ?>
@foreach ($val as $k => $data)




<div class="col-md-4 col-sm-12 col-xs-12" style=" padding-top:50px; padding-bottom:50px">


<?php
if(isset($data->image)==null) {$url="noimg.jpg";}else{ $url=$data->image;}
?>
<img src="{{url($url)}}" class="img img-tumbnail img-responsive" >


 
  <a href="{{url('drinks-categories')}}/{{$data->slug}}" class="btn btn-primary btn-block"><h4>{{$data->drink_cat_name}}</h4></a>



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
		
