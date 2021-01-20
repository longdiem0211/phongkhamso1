<?php
include './mvc/view/header.php';
include './mvc/view/menu.php';
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="./mvc/view/js/responsiveslides.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		 $(".rslides").responsiveSlides();
	})
</script>



<div id="demo" class="carousel slide" data-ride="carousel">
  		<ul class="carousel-indicators">
    		<li data-target="#demo" data-slide-to="0" class="active"></li>
    		<li data-target="#demo" data-slide-to="1"></li>
    		<li data-target="#demo" data-slide-to="2"></li>
  		</ul>
<center>
  	<div class="carousel-inner"  style="width:90%">
	
    	<div class="carousel-item active">
      		<img src="./mvc/view/image/banner1.jpg" alt="giay" width="100%" height="450">
    	</div>
   		<div class="carousel-item">
      		<img src="./mvc/view/image/banner2.jpg" alt="hinhgiay" width="100%" height="450">
    	</div>
    	<div class="carousel-item">
      		<img src="./mvc/view/image/banner3.jpg" alt="hinhgiay" width="100%" height="450">
    	</div>

  	</div>
 
  
  	<a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  	</a>
  	<a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
 	 </a>
</div>
 </center>



	

<?php
include './mvc/view/content.php';
include './mvc/view/footer.php';
?>