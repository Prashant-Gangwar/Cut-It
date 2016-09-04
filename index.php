<?php include_once "includes/header.php"; ?>

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

.carousel-inner > .item > img, .carousel-inner > .item > a > img {
      width: 100%;
      height: 400px;
      max-height: 
      margin: 0px;
}

</style>


<div class="nav">
  
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <hr style="margin:0">
        <!-- Indicators -->
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
 </div>
 <div class="nav">       
    <div class="nav text-center" style="font-size: 2em; background-color: black;" >
    <hr style="margin: 0"><br>
        <div class="container-fluid" style="margin:0">
            
            <div class="form-horizontal">
                    <form class="form-horizontal" >

                        <div class="form-group" >
                           
                            <div class="col-xs-12 col-sm-6">

                                <a href="#login-box" id="login-button">
                                     <button type="button" class="btn-lg btn-primary col-xs-12">Sign In</button>
                                </a>

                            </div>
                              <div class=" col-xs-12 col-sm-6" style="margin-bottom: 5px;" >

                                <a href="#login-box" id="signup-button">
                                    <button type="button" class="btn-lg btn-success col-xs-12">Sign Up</button>
                                </a>

                            </div>
                            <div class="col-sm-12">
                               <a href="#">
                                    <button type="button" class="btn-lg btn-danger col-xs-12"> Continue without Sign Up/Sign In </button>
                                </a>

                            </div>
                        </div>
                    </form>
                </div>


            <br>
        </div>
        <br>
    <hr style="margin: 0">
    </div> 


<?php include_once "includes/footer.php"; ?>