<?php

session_start();

if (isset($_SESSION['author'])) {

  if ($_SESSION['author']!=1) {

    header('Location:login.php');
  }
}else{
    if ( isset($_COOKIE['author'])) {

      if ($_COOKIE['author']!=true) {

        header('Location:login.php');
      }
    }else{
      header('Location:login.php');
    }

  
}

// db connection
include "lib/connection.php";

// tech query
$t_sql="SELECT id, title,icon,description FROM `news` WHERE c_id=12 ORDER BY id DESC LIMIT 3";

$t_query=$conn->query( $t_sql);




?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Website Description -->
    <meta name="description" content="MyNews: Corporate Multi Purpose News Blogs Template" />
    <meta name="author" content="Zerin" />

    <!--  Favicons / Title Bar Icon  -->
    <link rel="icon" href="images/favicon/favicon.png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/css/bootstrap.css">
    <link rel="stylesheet" href="vendor/css/style.css">
    <link rel="stylesheet" href="vendor/css/media.css">

    <title>Thrill News</title>
  </head>
  <body class="bg-light">

    <!-- header start -->
    <header>
      <div class="container">
        <!-- nav -->
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container-fluid">
            <!-- logo -->
            <a class="navbar-brand logo" href="index.php"><h1 class="m-0">Thrill News</h1></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <!-- menu -->
            <div class="collapse navbar-collapse menu" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                 <li class="nav-item">
                  <a class="nav-link" href="#">Blog</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Contact</a>
                </li>
               
                <li class="nav-item">
                  <a class="nav-link" href="login.php">Log In</a>
                </li>
              </ul>
              
            </div>
          </div>
        </nav>
        <!-- nav -->
      </div>
    </header>
    <!-- header end -->
    <!-- banner start -->
    <section class="banner">
      <div class="container">
        <div class="row mh_custom align-items-center">
          <div class="col-lg-7">
            <div class="b_content">
              <h1>Lorem ipsum dolor sit amet.</h1>
              <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ex alias repudiandae assumenda impedit voluptatem et repellat delectus reiciendis perspiciatis velit. impedit voluptatem et repellat delectus reiciendis perspiciatis velit.</p>
              <a href="#" class="btn btn-dark">Read More</a>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="b_icon text-center">
              <i class="fa fa-newspaper-o" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- banner end -->
    <!-- category start -->
    <section class="category">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="c_title text-center">
              <h1>Popular Categories</h1>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit. consectetur adipisicing elit. </p>
              <hr class="w-25 m-auto">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg">
            <div class="f_icon text-center">
              <a href="#" class="text-dark">
                <i class="fa fa-rocket" aria-hidden="true"></i>
              </a>
              <h3>tech</h3>
            </div>
          </div>
          <div class="col-lg">
            <div class="f_icon text-center">
              <a href="#" class="text-dark">
                <i class="fa fa-book" aria-hidden="true"></i>
              </a>
              <h3>education</h3>
            </div>
          </div>
          <div class="col-lg">
            <div class="f_icon text-center">
              <a href="#" class="text-dark">
                <i class="fa fa-thermometer-full" aria-hidden="true"></i>
              </a>
              <h3>weather</h3>
            </div>
          </div>
          <div class="col-lg">
            <div class="f_icon text-center">
              <a href="#" class="text-dark">
                <i class="fa fa-user-md" aria-hidden="true"></i>
              </a>
              <h3>health</h3>
            </div>
          </div>
          <div class="col-lg">
            <div class="f_icon text-center">
              <a href="#" class="text-dark">
                <i class="fa fa-university" aria-hidden="true"></i>
              </a>
              <h3>economy</h3>
            </div>
          </div>
          <div class="col-lg">
            <div class="f_icon text-center">
              <a href="#" class="text-dark">
                <i class="fa fa-bicycle" aria-hidden="true"></i>
              </a>
              <h3>sports</h3>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- featcategory end -->
    <!-- tech news start -->
    <section class="tech">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="c_title text-center">
              <h1>Tech News</h1>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit. consectetur adipisicing elit. </p>
              <hr class="w-25 m-auto">
            </div>
          </div>
        </div>
        <div class="row">
          <?php
          if($t_query -> num_rows > 0){ 
           while ($t_final =   $t_query -> fetch_assoc() ){
          ?>
          <div class="col-lg-4">
            <div class="c_news text-center">
              <i class="<?php echo $t_final['icon']; ?>"aria-hidden="true"></i>
              <h2><?php echo $t_final['title']; ?></h2>
              <p> <?php 

              $desc= $t_final['description']; 
                 
                 if(strlen( $desc) > 50 ){
                   
                  echo substr($desc,0,150)." " . "...". "<br>";
                   
                   echo "<a href='details.php?id=".$t_final['id']."' class='text-dark mt-3 d-block'>read more</a>";

                 }else{
                  echo $desc;
                 }
 
              ?>
              </p>
              
            </div>
          </div>
          <?php } ?>
            <?php
          }else{
            ?>
          <div class="col-lg-12">
            <div class="c_news text-center">
              <i class="fa fa-bug" aria-hidden="true"></i>
              <h2>No data to show</h2>
              <p>We are Sorry, there is nothing to show.</p>
              
            </div>
          </div>
          <?php
             }
           ?>
        </div>
      </div>
    </section>
    <!-- tech news end -->
    <!-- health news start -->
    <section class="health">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="c_title text-center">
              <h1>Health News</h1>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit. consectetur adipisicing elit. </p>
              <hr class="w-25 m-auto">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="c_news text-center">
              <i class="fa fa-heartbeat" aria-hidden="true"></i>
              <h2>Lorem ipsum dolor.</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing, elit. Cupiditate, nulla architecto doloremque neque ducimus at esse provident minus, itaque suscipit.</p>
              <a href="#" class="text-dark">read more</a>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="c_news text-center">
              <i class="fa fa-heartbeat" aria-hidden="true"></i>
              <h2>Lorem ipsum dolor.</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing, elit. Cupiditate, nulla architecto doloremque neque ducimus at esse provident minus, itaque suscipit.</p>
              <a href="#" class="text-dark">read more</a>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="c_news text-center">
              <i class="fa fa-heartbeat" aria-hidden="true"></i>
              <h2>Lorem ipsum dolor.</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing, elit. Cupiditate, nulla architecto doloremque neque ducimus at esse provident minus, itaque suscipit.</p>
              <a href="#" class="text-dark">read more</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- health news end -->
    <!-- education news start -->
    <section class="education">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="c_title text-center">
              <h1>Education News</h1>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit. consectetur adipisicing elit. </p>
              <hr class="w-25 m-auto">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="c_news text-center">
              <i class="fa fa-thumbs-up" aria-hidden="true"></i>
              <h2>Lorem ipsum dolor.</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing, elit. Cupiditate, nulla architecto doloremque neque ducimus at esse provident minus, itaque suscipit.</p>
              <a href="#" class="text-dark">read more</a>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="c_news text-center">
              <i class="fa fa-thumbs-up" aria-hidden="true"></i>
              <h2>Lorem ipsum dolor.</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing, elit. Cupiditate, nulla architecto doloremque neque ducimus at esse provident minus, itaque suscipit.</p>
              <a href="#" class="text-dark">read more</a>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="c_news text-center">
              <i class="fa fa-thumbs-up" aria-hidden="true"></i>
              <h2>Lorem ipsum dolor.</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing, elit. Cupiditate, nulla architecto doloremque neque ducimus at esse provident minus, itaque suscipit.</p>
              <a href="#" class="text-dark">read more</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- education news end -->
    <!-- footer start -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <div class="f_text">
              <h2>Thrill News</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit nulla cupiditate adipisci assumenda</p>
              <p>libero qui, nobis consequuntur maiores pariatur magni atque impedit quibusdam officiis vel</p>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="f_text">
              <h2>Useful links</h2>
              <ul class="list-unstyled">
                <li><a href="" class="text-dark">Privacy policy</a></li>
                <li><a href="" class="text-dark">Terms & conditions</a></li>
                <li><a href="" class="text-dark">Privacy policy</a></li>
                <li><a href="" class="text-dark">Terms & conditions</a></li>
                <li><a href="" class="text-dark">Privacy policy</a></li>
                <li><a href="" class="text-dark">Terms & conditions</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="f_text">
              <h2>Contact Info</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit nulla cupiditate adipisci assumenda </p>
              <p>libero qui, nobis consequuntur maiores pariatur magni atque impedit quibusdam officiis vel</p>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="f_text">
              <h2>Join Us</h2>
              <form action="#">
                <div class="mb-3">
                  <label for="formGroupExampleInput" class="form-label">Your Email Address</label>
                  <input type="text" class="form-control" id="formGroupExampleInput" >
                </div>
                <div class="mb-3">
                  <button class="btn btn-dark w-100">Subscribe here</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <p class="text-center m-0 copy"> Thrill News © 2025 All rights reserved.  Lorem ipsum dolor, sit amet.</p>
          </div>
        </div>
        <a href="logout.php">Log out</a>
      </div>

    </footer>
    <!-- footer end -->

    

    
    <!-- JS links -->
    <script src="vendor/js/popper.min.js"></script>
    <script src="vendor/js/bootstrap.min.js"></script>
    <script src="vendor/js/script.js"></script>
  </body>
</html>