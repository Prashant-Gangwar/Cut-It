<?php include_once 'includes/header.php' 
//#f4511e
?>

<style>
  #about_page {
      position: relative;
      margin: 0;
  }
  #section1 {padding-top:50px;height:500px;color: #fff; background-color: #1E88E5;}
  #section2 {padding-top:50px;height:500px;color: #fff; background-color: #673ab7;}
  #section3 {padding-top:50px;height:500px;color: #fff; background-color: #ff9800;}
  #section41 {padding-top:50px;height:500px;color: #fff; background-color: #00bcd4;}
  #section42 {padding-top:50px;height:500px;color: #fff; background-color: #009688;}
  </style>

<div data-spy="scroll" data-target=".navbar" data-offset="50">

	<nav class="navbar navbar-inverse navbar-fixed-top" id="about_page">
	  <div class="container-fluid">
	    <div class="navbar-header">
	        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	          <span class="icon-bar"></span>
	          <span class="icon-bar"></span>
	          <span class="icon-bar"></span>
	      </button>
	<!--       <a class="navbar-brand" href="#">WebSiteName</a>
	 -->    </div>
	    <div>
	      <div class="collapse navbar-collapse" id="myNavbar">
	        <ul class="nav navbar-nav">
	          <li><a href="#section1">What is CUT-IT?</a></li>
	          <li><a href="#section2">Features</a></li>
	          <li><a href="#section3">Advantages</a></li>
		      <li><a href="#section3">Our Clients</a></li>
	          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Connect With Us<span class="caret"></span></a>
	            <ul class="dropdown-menu">
	              <li><a href="#section41"><button class=""><i class="fa fa-facebook fa-2x"></button></i><b> Facebook</b></a></li>
	              <li><a href="#section42"><button class=""><i class="fa fa-twitter"></button></i><b> Twitter</b></a></li>
	            </ul>
	          </li>
	        </ul>
	      </div>
	    </div>
	  </div>
	</nav>

	<div id="section1" class="container-fluid">
		<div class="container">
			<h1>Section 1</h1>
			<p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
			<p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
		</div>
	</div>
	<div id="section2" class="container-fluid">
		<div class="container">
			<h1>Section 2</h1>
			<p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
			<p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
		</div>
	</div>
	<div id="section3" class="container-fluid">
		<div class="container">
			<h1>Section 3</h1>
			<p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
			<p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
		</div>
	</div>
	<div id="section41" class="container-fluid">
		<div class="container">
			<h1>Section 4 Susbmenu 1</h1>
			<p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
			<p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
		</div>
	</div>
	<div id="section42" class="container-fluid">
		<div class="container">
			<h1>Section 4 Submenu 2</h1>
			<p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
			<p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
		</div>
	</div>
</div>

<?php include_once 'includes/footer.php' ?>