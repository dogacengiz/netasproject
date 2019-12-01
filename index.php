<?php include('config/db_connect.php');?>

<!DOCTYPE html>
<html>
    <?php include('templates/header.php');?>
     <!--i used some elements from my friend's project https://github.com/pablohdez98/DAW1-->
     <!-- HOME SECTION -->
     <!--product data are taken from json file using javascript-->

  <section id="home-section">
    <div class="dark-overlay home-inner">
      <h2 class="text-center">Fresh foods from farmer to your home!</h2>
        <div class="row">
          <div class="col-lg-6 col-md-6 mb-4">
            <div class="container">
              <div class="col text-center py-5">
                <h3>favorite vegetables of the season!</h3>
                <p class="lead">We chose the best ones for you!</p>
              </div>
            </div>
            <div class="col-lg-6 mx-auto">
              <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" id="carouselVegetable" role="listbox">
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
                <div class="text-center">
                  <a href="#veg-head-section" class="btn btn-outline-light">Find Out More</a>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-md-6 mb-4 d-none d-md-block">
            <div class="container">
              <div class="col text-center py-5">
                <h3>favorite fruits of the season!</h3>
                <p class="lead">We chose the best ones for you!</p>
              </div>
            </div>
            <div class="col-lg-6 mx-auto">
              <div id="carouselExampleIndicators-2" class="carousel slide my-4" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators-2" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators-2" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators-2" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" id="carouselFruit" role="listbox">
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators-2" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators-2" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
                <div class="text-center">
                  <a href="#fruit-head-section" class="btn btn-outline-light">Find Out More</a>
                </div>
            </div>
          </div>
      </div>
  </section>
  <!--End home section-->

  <!--vegetable header-->
  <section id="veg-head-section">
        <div class="col text-center py-5">
          <h1 class="display-4 font-weight-bold text-success bg-light">VEGETABLES</h1>
        </div>
  </section>
  <!--End vegetable header-->

  <!--Vegetable content-->
  <section id="vegetable-season-section" class="bg-light text-muted py-5">
    <div class="container">
      <div class="col text-center py-5">
        <h2 class="display-4 ">All the vegetables are here</h2>
      </div>
      <div class="row " id="vegProducts"></div>
    </div>
    </div>
      <div class="text-center">
        <button id="vegLoad" type="submit" class="btn btn-outline-dark">Find Out More</button>
      </div>
  </section>
  <!--End vegetable content-->

  <!--Fruit header-->
  <section id="fruit-head-section">
        <div class="col text-center py-5">
          <h1 class="display-4 font-weight-bold text-warning bg-light">FRUITS</h1>
        </div>
  </section>
  <!--End fruit header-->

  <!--Fruits content-->
  <section id="fruit-season-section" class="bg-light text-muted py-5 col-lg-12">
    <div class="container py-5">
      <div class="col text-center py-5">
        <h2 class="display-4">All the fruits are here</h2>
      </div>
      <div class="row" id="fruitProducts"></div>
    </div>
      <div class="text-center mb-5">
        <button id="fruitLoad" type="submit" class="btn btn-outline-dark mb-5">Find Out More</button>
      </div>
 
</section>
  <!--End fruit content-->

    <?php include('templates/footer.php');?>

  <script src="js/index.js"></script>
</body>
</html>