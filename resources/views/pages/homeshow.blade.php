@extends('layouts.app')

@section('title')
{{$pdata['meta_title'] }}
@endsection


@section('meta_keyword')
{{$pdata['meta_keyword'] }}
@endsection

@section('content')



<center><h1><b><u>{{$pdata['drinks_name']}}</u></b></h1></center>







<div class="row" style="margin: 10px">

  <div class="btn-group btn-group-justified">
  <div class="btn-group">
    <button type="button" class="btn btn-primary" onclick="oc(2)"> Product name</button>
  </div>
  <div class="btn-group">
    <button type="button" class="btn btn-primary" onclick="oc(1)">Details</button>
  </div>
 
</div>
	   
  </div>
 


<div class="col-md-6 col-sm-12 col-xs-12" style=" padding-top:50px">


<?php
if(isset($pdata['drinks_image'])) {$url=$pdata['drinks_image'];}else{ $url="noimage.jpg";}
?>
<img src="{{url($url)}}" class="img img-tumbnail img-responsive" style="width: 260px" >

</div>

<div id="aa" class="col-md-6 col-sm-12 col-xs-12" style=" padding-top:50px; padding-bottom:60px" >
{!! $pdata['drinks_name']!!} 

</div>

<!-- /////////////////////////////display   script /////////////////////////////////////////-->


<div id="aa1" class="col-md-6 col-sm-12 col-xs-12" style=" padding-top:50px; display: none; padding-bottom:60px" >

{!! $pdata['details']!!} 
	

</div>


</div>
<script type="text/javascript">
	function oc(a)
	{
      switch(a)
      {
      	case 1:

		document.getElementById('aa1').style.display="block";
		document.getElementById('aa').style.display="none";
		break;

		case 2:
		document.getElementById('aa1').style.display="none";
		document.getElementById('aa').style.display="block";
		

	  }
	}
</script>
 
@endsection
