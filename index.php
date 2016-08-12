<?php 

include_once "includes/header.php";


?>


<!-- <div class="container">
  <div class="jumbotron">
    <h1>Bootstrap Tutorial</h1> 
    <p>Bootstrap is the most popular HTML, CSS, and JS framework for developing
    responsive, mobile-first projects on the web.</p> 
  </div>
  <p>This is some text.</p> 
  <p>This is another text.</p> 
</div
 -->
<style>
.cover_image {
    position: relative;
    background: white url("images/cover_image.png") center center no-repeat;
    width: 100%;
    height: 100%;
    max-width: 2048px;
    max-height: 2048px;
    background-size: cover;
    overflow: hidden;
}
/*.jumbotron .container {
position: relative;
top:100px;
}*/
</style>

<!-- 	<br>
	<div class="jumbotron cover_image" style="margin: 0px;">
	  <div class="container" style="color: #E64A19;">
		  		
		  	<b>
				<h1 >Welcome</h1>
				<h1 style="padding-left: 100px; font-size: 30px; ">To</h1>
				<h1 >CUT IT</h1><br><br><br><br><br><br><br><br><br>



				<h1 style="font-size: 40px;">URL Shortener & QR Code Generator</h1>
				
				< <p><b>Join CUT-IT, World's Fastest Growing URL Shortener and Link Management Site.</b></p>
			</b>
			<h1 style="font-size: 40px;">URL Shortener & QR Code Generator</h1> 
		</div>

	</div>
	<br> --> 
	<!-- <div class="container">
	  <p>This is some text.</p>
	  <p>This is another text.</p><br><br><br>
	</div> -->

  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 80%;
      height: 60%;
      margin: auto;
  }
  </style>
</head>


<div class="nav">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="images/autumn1.jpg" alt="Chania" width="460" height="345">
        <div class="carousel-caption">
          <h3>Chania</h3>
          <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
        </div>
      </div>

      <div class="item">
        <img src="images/autumn2.jpg" alt="Chania" width="460" height="345">
        <div class="carousel-caption">
          <h3>Chania</h3>
          <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
        </div>
      </div>
    
      <div class="item">
        <img src="images/autumn3.jpg" alt="Flower" width="460" height="345">
        <div class="carousel-caption">
          <h3>Flowers</h3>
          <p>Beatiful flowers in Kolymbari, Crete.</p>
        </div>
      </div>

      <div class="item">
        <img src="images/autumn4.jpg" alt="Flower" width="460" height="345">
        <div class="carousel-caption">
          <h3>Flowers</h3>
          <p>Beatiful flowers in Kolymbari, Crete.</p>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div> <br>

<?php include_once "includes/footer.php"; ?>