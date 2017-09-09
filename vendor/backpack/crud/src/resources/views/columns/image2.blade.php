
<td>
<?php
if(isset($entry->{$column['name']}[0] )==null) {$url="noimg.png";}
else{ $url= $entry->{$column['name']}[0];}
?>  
<img src="{{ url('uploads') }}/{{ $url }}"  style="height: 80px; border-radius: 3px;" />
  
</td>