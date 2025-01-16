<?php 

// db connection
include "../lib/connection.php"; 


// update query 
 if ( isset($_POST['b_update']) ) {       

  $bid =$_POST['b_id'];            
  $title =$_POST['b_title']; 
  $icon =$_POST['b_icon'];              
  $desc =$_POST['b_desc'];                
  $link =$_POST['b_link'];              
   

  $update_sql = "UPDATE `banner` SET title ='$title',icon ='$icon',description ='$des', link ='$link'  WHERE id =$bid";  

 
  if ( $conn -> query($update_sql) ) {                                                           
  
     header('Location:banner.php');

  }
  else{

       die( $conn -> error );              

 }

 } else{

 }

// select query 
 if ( isset($_GET['id']) ) {     

 $e_id =$_GET['id'];               

 $select_sql = "SELECT * FROM `banner` WHERE id=$e_id"; 

 $s_sql = $conn -> query($select_sql);                     

 if ($s_sql -> num_rows > 0) {                            
    
      while ($final =   $s_sql -> fetch_assoc() ){        

 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>News24</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="admin.php">News24</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="../index.php" target="_blank">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Website
                            </a>
                            <div class="sb-sidenav-menu-heading">Pages</div>
                            <a class="nav-link" href="cat.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Category
                            </a>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                News
                            </a>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                             <a class="nav-link " href="banner.php">
                     <div class="sb-nav-link-icon"><i class="fa-brands fa-readme"></i></div>
                     Banner
              </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Category</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Update Category</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <h2 class="my-3">Update Category</h2>
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                    <input value="<?php echo $final['id']; ?>" type="hidden" class="form-control" id="b_id" name="b_id" required>
                                    <div class="mb-3">
                                        <label for="b_title" class="form-label">Banner Title</label>
                                        <input type="text" class="form-control b_title" id="b_title" name="b_title" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="b_icon" class="form-label">Banner Icon</label>
                                        <input type="text" class="form-control b_icon" id="b_icon" name="b_icon" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                      <label for="b_desc" class="form-label">Banner Description</label>
                                      <textarea class="form-control b_desc" id="b_desc" rows="3" name="b_desc" required></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="b_link" class="form-label">Banner Link</label>
                                        <input type="text" class="form-control b_link" id="b_link" name="b_link" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <button class="btn btn-success" type="Submit" name="b_update">Update</button>
                                        <button class="btn btn-danger" type="Reset">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Thrill News 2025</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php 

 } 

  }                       
 else {                   
     header('Location:banner.php'); }

 }                       
else{                   

    header('Location:banner.php'); }


 ?>