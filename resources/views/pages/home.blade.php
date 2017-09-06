@extends('layouts.app')

     @section('slide')


  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->

    <ol class="carousel-indicators">
      <!-- <li data-target="#myCarousel" data-slide-to="0" class="active"></li> -->

  <?php $k=(0); ?>

       @foreach ($sliderimage as $k => $value)
  <?php  
          $actives=($k==0)?"active":"";   ?>
 <li data-target="#myCarousel" data-slide-to="<?php echo $k ?>" class="<?php echo  $actives ?>"></li> 
	
       	 @endforeach
      
    </ol>
   


    <!-- Wrapper for slides -->
    <div class="carousel-inner" >
   
     
       <?php $i=0; ?>
       @foreach ($sliderimage as $k => $value)
  <?php  $actives=($k==0)?"active":"";   ?>

   <div class='item <?php echo $actives ?>'>  
	 

     
     <img src="{{$value->slider_image}}" class="img-responsive" alt="Los Angeles" style="width:100%; height: 100%">
     
      </div>
      @endforeach

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

@endsection







@section('home')




<div class="row">





<?php $i=1; ?>
@foreach ($homevalue as $k => $homedata)


<div class="col-md-4 col-sm-12 col-xs-12" style=" padding-top:50px; padding-bottom:50px">


<?php
if(isset($homedata->drinks_image)==null) {$url="noimg.jpg";}else{ $url=$homedata->drinks_image;}
?>
<img src="{{url($url)}}" class="img img-tumbnail img-responsive" >



  <a href="{{url('home')}}/{{$homedata->slug}}" class="btn btn-primary btn-block"><h4>{{$homedata->drinks_name}}</h4></a>

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
