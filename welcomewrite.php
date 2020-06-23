<?php
    session_start();
    $logusername=$_GET['username'];
    $db = mysqli_connect("localhost","root","root","blogdb") or die("couldnot connect");

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Mini Blog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700|Playfair+Display:400,700,900" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

    <html>
        <div class="alert alert-info">
            <strong>WELCOME</strong> <?php echo strtoupper($logusername) ?>
            </div>
    </html>

  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar" role="banner">
      <div class="container-fluid">
        <div class="row align-items-center">

          <div class="col-12 search-form-wrap js-search-form">
            <form method="get" action="#">
              <input type="text" id="s" class="form-control" placeholder="Search...">
              <button class="search-btn" type="submit"><span class="icon-search"></span></button>
            </form>
          </div>

          <div class="col-4 site-logo">
            <!-- <a href="index.html" class="text-black h2 mb-0">Mini Blog</a> -->
            <p class="text-black h2 mb-0">THE CURVED HEART </p>
          </div>

          <div class="col-8 text-right">
            <nav class="site-navigation" role="navigation">
              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block mb-0">
                <li><a href="index.html">Home</a></li>
                <li><a href="index.html">Literature</a></li>
                <li><a href="category.html">Camera</a></li>
                <li><a href="category.html">Food</a></li>
                <li><a href="category.html">Tech</a></li>
                <li><a href="logout.php">Logout</a></li>
                <li class="d-none d-lg-inline-block"><a href="#" class="js-search-toggle"><span class="icon-search"></span></a></li>
              </ul>
            </nav>
            <a href="#" class="site-menu-toggle js-menu-toggle text-black d-inline-block d-lg-none"><span class="icon-menu h3"></span></a></div>
          </div>

      </div>
    </header>

    <body>


    <a href="contact.php?username=<?php echo $_GET['username'];?>" name="newpostbutton" class="btn btn-info"> New Post </a>

    <style>
      .btn-info {
        margin-left: 20px;
      }
    </style>


    <!-- <div id="my" class="my">
            <form method="POST" class="aboutform">

                About yourself:  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <input type="text" name="about" class="aboutyou" required value="Hi! My name is "><br>
                <br>
                <!--  echo isset($_POST['about']) ? $_POST['about']: '' ?> -->
                <!-- <input type="submit" value="SUBMIT" class="donet" name="description-submit" onclick="goToAboutForm()">
                <input type="submit" value="BACK" class="goback" onclick="goToAboutForm()" onclick="reloadalert()">
                <br>
                <br>
                 <p> "If your description already exists, it will be updated if you type again."</p>
            </form>
        </div> -->


    </body>



<?php
   $rows=-1;
   $check=-1;
   $sql=mysqli_query($db,"Select userID from users where username = '$logusername'");
   $rows=mysqli_num_rows($sql);
   while($fetch=mysqli_fetch_array($sql)){
        $uid=$fetch['userID'];
   }
   if($rows>0) {
        $res=mysqli_query($db,"Select * from posts where userID='$uid'");
      if (!$res) {
        printf("Error:", mysqli_error($db));
        exit();
      }
      
      $check=mysqli_num_rows($res);
      if($check>0){
        echo "<br>";
      

      //  echo "<table>";
      //  echo "<tr>";
          ?> <div class="site-section bg-white">
          <div class="container">
            <div class="row">
            <?php
          while($row=mysqli_fetch_array($res))
          { 
          $postsubstr=substr($row['Post'],0,50);  
            ?> 
                <div class="col-lg-4 mb-4">
                  <div class="entry2">
                    <a href="single.html"> <?php echo '<img src= "data:image/jpeg;base64,'.base64_encode( $row['Images']).'" alt="Image" class="img-fluid rounded" width="300" height="200" class="img-responsive" /> '?> </a>
                    <div class="excerpt">
                      <?php if ($row['Category']=="Literature") {?>
                      <span class="post-category text-white bg-secondary mb-3"> <?php echo $row['Category'] ?> </span> <?php } ?>
                      <?php if ($row['Category']=="Camera") { ?>
                          <span class="post-category text-white bg-danger mb-3"> <?php echo $row['Category'] ?> </span> <?php } ?>
                      <?php if ($row['Category']=="Food") { ?>
                          <span class="post-category text-white bg-success mb-3"> <?php echo $row['Category'] ?> </span> <?php } ?>
                      <?php if ($row['Category']=="Tech") { ?>
                          <span class="post-category text-white bg-warning mb-3"> <?php echo $row['Category'] ?> </span> <?php } ?>
                      <?php if ($row['Category']=="Others") { ?>
                          <span class="post-category text-white bg-info mb-3"> <?php echo $row['Category'] ?> </span> <?php } ?>
      
                    <h2><a href="single.html"> <?php echo $row['Post_Title'] ?> </a></h2>
                    
                      <span class="d-inline-block mt-1">By <a href="#"> <?php echo $logusername ?> </a></span>
                      <span>&nbsp;&nbsp; <?php echo $row['Date'] ?> </span>
                    </div>
                    
                      <p> <?php echo $postsubstr."...." ?></p>
                      <p><a href="single.html">Read More</a></p>
                    </div>
                  </div>


          <!-- echo '<img src="data:image/jpeg;base64,'.base64_encode($row['Images'] ).'" height="200" width="260"/>'; -->
          <?php
          }
        }
      }
      if($check==-1 ){
          //  echo "<br>";

          //  echo "</td>";x\
          ?>
        <div class="to">
        <br> 
        <li> <p> <?php echo "NO POSTS"; ?> </p> </li> <?php
      } 
    
      ?>
      <style>
          .to{  
              color: black;
              text-align: center;
          } 
      </style>
          
</html>