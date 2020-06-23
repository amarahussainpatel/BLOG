<?php
  session_start();
  $logusername=$_GET['username'];  

  $row=-1;
  $db = mysqli_connect("localhost","root","root","blogdb") or die("couldnot connect");

  if(isset($_POST['publish_btn'])){
        $pblog = mysqli_real_escape_string($db,$_POST['post_blog']);
        $ptitle = mysqli_real_escape_string($db,$_POST['post_title']);
        $categ = mysqli_real_escape_string($db,implode(",",$_POST['cat']));
        $uid="nothing";
        $date=date('Y-m-d');

       echo $logusername;
        $sql=mysqli_query($db,"Select userID from users where username = '$logusername'");
        
        $rows=mysqli_num_rows($sql);
        echo $rows;
        if($rows>0){
        while($fetch=mysqli_fetch_array($sql)){
              $uid=$fetch['userID'];
        }
        echo $uid;

        $imageName=mysqli_real_escape_string($db,$_FILES["image"]["name"]);
        $imageData=mysqli_real_escape_string($db,file_get_contents($_FILES["image"]["tmp_name"]));
        $imageType=mysqli_real_escape_string($db,$_FILES["image"]["type"]);
        $imageProperties = getimageSize($_FILES['image']['tmp_name']);

        if(substr($imageType,0,5)=="image"){
            echo "Working Code";
        
        $sql1 = "INSERT INTO posts(userID,Post_Title,Category,Post,Images,Image_Name,Image_Type,Date) VALUES ('$uid','$ptitle','$categ','$pblog','$imageData','$imageName','$imageProperties[mime]','$date')";
        mysqli_query($db,$sql1);
        echo "herehey";

        $messs = "Posted Succesfully.";
        echo "<script type='text/javascript'>alert('$messs');</script>";

        // $url='welcomewrite.php'.'?username='.$logusername;
        //   header("Location: ".$url);
          $_SESSION['logun']=$logusername;

        }
        else{
          echo "Only images are allowed";
        }
      }
    }   
  echo "ji";

  
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
<!--   
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
            <a href="index.html" class="text-black h2 mb-0">Mini Blog</a>
          </div>

          <div class="col-8 text-right">
            <nav class="site-navigation" role="navigation">
              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block mb-0">
                <li><a href="category.html">Home</a></li>
                <li><a href="category.html">Politics</a></li>
                <li><a href="category.html">Tech</a></li>
                <li><a href="category.html">Entertainment</a></li>
                <li><a href="category.html">Travel</a></li>
                <li><a href="category.html">Sports</a></li>
                <li class="d-none d-lg-inline-block"><a href="#" class="js-search-toggle"><span class="icon-search"></span></a></li>
              </ul>
            </nav>
            <a href="#" class="site-menu-toggle js-menu-toggle text-black d-inline-block d-lg-none"><span class="icon-menu h3"></span></a></div>
          </div>

      </div>
    </header>
    
    
    <div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('images/img_4.jpg');">
      <div class="container">
        <div class="row same-height justify-content-center">
          <div class="col-md-12 col-lg-10">
            <div class="post-entry text-center">
              <h1 class="">Contact Us</h1>
              <p class="lead mb-4 text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, adipisci?</p>
            </div>
          </div>
        </div>
      </div>
    </div> -->
  
    
    <div class="row">
              <div class="col-md-7">
                  <!-- <div class="box"; -->
                  <p class="Heading1"><strong>&nbsp; &nbsp;THE CURVED HEART</strong> </p>
                  <style> 
                      .Heading1{
                          font-size: 220%;
                          font: "Comic Sans MS";
                      }
                  </style>
               </div>
              <div class="col-md-5">
                  <br>
                  <?php 
                  $uname=$logusername  ?>
                  <p class="headtop"><mark>POSTED AS  <?php echo strtoupper($uname)?> </mark></p>
                  <style> 
                      .headtop{
                          font-size: 120%;
                          font: "Comic Sans MS";
                      }
                      .site-section bg-light{
                        height: 90px;
                      }
                  </style>
                  
              </div>
               </div>

    <div class="site-section bg-light">
      <div class="container">
          

        <div class="row">
          <div class="col-md-7 mb-5">

            

            <form method="POST" enctype='multipart/form-data' class="p-5 bg-white">
             

              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" name="post_title" for="fname">Add Post Title</label>
                  <input type="text" id="fname" name="post_title" class="form-control">
                </div>
              </div>
                
                <br>

              <div class="row form-group">

              
                
                <div class="col-md-12">
                  <label class="text-black" for="subject">Category</label> 
                  <input type="checkbox" name="cat[]" value="Literature">Literature &nbsp; &nbsp;
                  <input type="checkbox" name="cat[]" value="Camera"  >Camera &nbsp;
                  <input type="checkbox" name="cat[]" value="Food"  >Food &nbsp; &nbsp;
                  <input type="checkbox" name="cat[]" value="Tech"  >Tech &nbsp;
                  <input type="checkbox" name="cat[]" value="Others"  >Others &nbsp; &nbsp;
                </div>
              </div>

               <br>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" name="post_blog"  for="message">Post</label> 
                  <textarea id="message" name="post_blog" cols="30" rows="7" class="form-control" placeholder="Write your notes here..."></textarea>
                </div>
              </div>

              <div class="row form-group">
              <div class="col-md-3">
                 
                </div>
                <div class="col-md-4">
                <input type="submit" name="publish_btn" value="Publish" class="btn btn-primary py-2 px-4 text-white"> </a>

                  <!-- <a href="welcomewrite.php?username= <?php echo $_GET['username'] ?>" name="Publish" class="btn btn-primary py-2 px-4 text-white">PUBLISH </a> -->
                </div>
                <div class="col-md-4">  
                  <!-- <a href="images/02134182083-DCCN.pdf"> link </a> -->
                  <a href="welcomewrite.php?username=<?php echo $_GET['username'];?>"class="btn btn-primary py-2 px-4 text-white">Cancel</a>
                </div>
              </div>
            <!-- </form> -->
          </div>
          <div class="col-md-5">
            
            <div class="p-4 mb-3 bg-white">
            <!-- <p class="mb-0 font-weight-bold" name="but_upload" >Add Image </p> -->
               
              <!-- <input type="submit" value="ADD IMAGE" name="but_upload" id="but_upload" class="btn btn-light py-2 px-4 text-black">
              <img class="links1" src="images/addimage.png" height="30" width="30"> -->
              <!-- <form method="post" action="" enctype='multipart/form-data'> -->
                <input type='file' name='image' >
                <input type='submit' value='ADD IMAGE' name='submit' class="btn btn-light py-2 px-4 text-black" disabled> 
              </form>

            </div>

          </div>
        </div>
      </div>
    </div


    
            <ul class="list-unstyled float-left mr-5">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Advertise</a></li>
              <li><a href="#">Careers</a></li>
              <li><a href="#">Subscribes</a></li>
            </ul>
            <ul class="list-unstyled float-left">
              <li><a href="#">Travel</a></li>
              <li><a href="#">Lifestyle</a></li>
              <li><a href="#">Sports</a></li>
              <li><a href="#">Nature</a></li>
            </ul>
          </div>
          <div class="col-md-4">
            

            <div>
              <h3 class="footer-heading mb-4">Connect With Us</h3>
              <p>
                <a href="#"><span class="icon-facebook pt-2 pr-2 pb-2 pl-0"></span></a>
                <a href="#"><span class="icon-twitter p-2"></span></a>
                <a href="#"><span class="icon-instagram p-2"></span></a>
                <a href="#"><span class="icon-rss p-2"></span></a>
                <a href="#"><span class="icon-envelope p-2"></span></a>
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-center">
            <p>
              Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
              </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>


</script> 
    
  </body>


</html>



