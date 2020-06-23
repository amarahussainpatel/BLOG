<?php
    session_start();
            
    $db=mysqli_connect("localhost","root","root","blogdb") or die("couldnot connect");
    $row=-1;
    $flag=true;

    if(isset($_POST['login-submit'])) {
        $logusername = mysqli_real_escape_string($db,$_POST['username']);
        $logpassword = mysqli_real_escape_string($db,$_POST['psw']);
        $logpassword=md5($logpassword);

        $query=mysqli_query($db,"SELECT UserID FROM users WHERE username='$logusername' AND password='$logpassword' ");
        $rows=mysqli_num_rows($query); //mysqli_num_rows counts the number of rows in the typed query
        
        if($rows==1){ 
          $url='welcomewrite.php'.'?username='.$logusername;
          header("Location: ".$url);
          $_SESSION['logun']=$logusername; 
        }

        else{
          $message = "Username and/or Password incorrect.\\nTry again.";
          echo "<script type='text/javascript'>alert('$message');</script>";
        }            

    }
  
?>
 
 <!DOCTYPE html>
<html lang="en">
  <head>
    <title>THE CURVED HEART</title>
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

    <style>
      #startwrite{
        display: none;
        position: fixed;
        top: 15%;
        left: 33%;   
        color: mintcream;
        border: 2.5px solid rgb(94, 155, 142);  
        padding: 20px 15px;  
        background-image: url('images/grassperson.jpg');
        color: black;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;  
      }
      #startregwrite{
        display: none;
        position: fixed;
        top: 65%;
        left: 33%;   
        color: mintcream;
        border: 2.5px solid rgb(94, 155, 142);  
        padding: 7px 118px;  
        background-image: url('images/grassperson.jpg');
        color: black;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;  
      }
      #registerform{
        position: fixed;
        top: 13%;
        left: 25%;   
        color: mintcream;
        background-color: white;
        border: 2.5px solid rosybrown;  
        padding: 13px 13px;
        color: black;
        display: none;  
      }
      #regwrite{
        display: none;
        position: fixed;
        top: 70%;
        left: 25%;   
        color: mintcream;
        border: 2.5px solid rgb(160, 146, 148);;  
        padding: 7px 118px;  
        background-color: white;
        color: black;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;  
      }

      .links1{
        text-align: right;
        margin-top: 0%;
        margin-left: 90%; 
      }
      </style>
  
  

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
                <li class="active"><a href="index.html">Home</a></li> 
                <li><a href="index.html">Literature</a></li>
                <li><a href="category.html">Camera</a></li>
                <li><a href="category.html">Food</a></li>
                <li><a href="category.html">Tech</a></li>
                <li class="d-none d-lg-inline-block"><a href="#" class="js-search-toggle"><span class="icon-search"></span></a></li>
              </ul>
            </nav>
            <a href="#" class="site-menu-toggle js-menu-toggle text-black d-inline-block d-lg-none"><span class="icon-menu h3"></span></a></div>
          </div>

      </div>
    </header>
  
    <style>
      ul li a.acitve a{
        background-color:rgb(43, 104, 133);
        color: lightblue;
      }
    </style>
    
    <div class="py-4 bg-light">
      <div class="container">
        <div class="row">

          <div class="col-md-3">
            <span>Literature</span>
            <h3>Write</h3>
            <p>Write because you're broken.<br> Write because you're hurt. <br> Write because you're damaged. <br> Write because you want to heal. <br> Write because you want to grow. <br> Write because the pen is yours.</p>
            <button class="post-category text-white bg-primary mb-3" onclick="goToLogin()" > &nbsp; START  &nbsp; </button>
          </div>

          <div class="col-md-3">
            <span>Camera</span>
            <h3>Capture</h3>
            <p>Capture what you attract.<br> Capture what your heart loves. <br> Capture what's beautiful. <br> Capture what's ugly. <br> Capture what the world hasn't seen. <br> Capture because this is your dream.</p>
            <button class="post-category text-white bg-primary mb-3" onclick="goToLogin()" > &nbsp; START  &nbsp; </button>
          </div>

          <div class="col-md-3">
            <span>Food</span>
            <h3>Cook,Burn,Bake</h3>
            <p>Cook because you love to eat.<br> Burn because you are human. <br> Bake because it's a healing. <br> Cook because you're a pro. <br> Burn because you're a noob. <br> Bake because you're a mediocre.</p>
            <button class="post-category text-white bg-primary mb-3" onclick="goToLogin()" > &nbsp; START  &nbsp; </button>
          </div>
          
          <div class="col-md-3">
            <span>Tech</span>
            <h3>Discover</h3>
            <p>Discover your hidden passion.<br> Discover because you're a techie. <br> Discover to make it easier. <br> Discover to . <br> Write because you want to grow. <br> Write because the pen is yours.</p>
            <button class="post-category text-white bg-primary mb-3" onclick="goToLogin()" > &nbsp; START  &nbsp; </button>
          </div>
       </div>
     </div>
        <button class="post-category text-white bg-primary mb-2" onclick="goToLogin()" > &nbsp;  START  &nbsp; </button>
        <style>
          .button{
            margin-left: 50%;
          }
         </style>
          
          <!-- <div class="col-md-2">
            <span>DIY</span>
            <h3>Write</h3>
            <p>Write because you're broken.<br> Write because you're hurt. <br> Write because you're damaged. <br> Write because you want to heal. <br> Write because you want to grow. <br> Write because the pen is yours.</p>
            <button class="post-category text-white bg-primary mb-3" onclick="startwriting()" > &nbsp; START WRITING &nbsp; </button>
          </div> -->
          
          <!-- <div class="col-md-2">
            <span>Researches</span>
            <h3>Write</h3>
            <p>Write because you're broken.<br> Write because you're hurt. <br> Write because you're damaged. <br> Write because you want to heal. <br> Write because you want to grow. <br> Write because the pen is yours.</p>
            <button class="post-category text-white bg-primary mb-3" onclick="startwriting()" > &nbsp; START WRITING &nbsp; </button>
          </div> -->
        </div>
      </div>
    </div>

    <form class="startwrite" id="startwrite" method="POST"> 
    <a href="index.php"> <img class="links1" src="images/icon.png" height="30" width="30">  </a>  
       
          <br><br><br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;USERNAME: &nbsp;    
          <input type="text" name="username" id="username" class="usert" required> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <!--      echo isset($_POST['uname']) ? $_POST['uname']:  -->
          <br>
          <br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PASSWORD:&nbsp;    
          <input type="password" name="psw" id="psw" class="usert" required> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br> 
          <br> <br>
          <input type="submit" value="LOGIN" class="logt" name="login-submit" >
          <style>
              .logt{
                width: 150px;
                height: 28px;
                margin-left: 34%;
                color: mintcream;
                background-color: rgb(94, 155, 142)
              }
              .logt:hover{
                color: teal;
                background-color: mintcream;
               }
           </style>   
          <span> <?php $error; ?> </span>
          </form>

          

          <form class="startregwrite" id="startregwrite" method="POST">
        <div class="register">
            <!-- <button class="regbut" onclick="goToRegister()"> Not a user? Register </button>  -->
            <a class="regbut" href="register.php">  Not a user?Register  </a>
        </div>
        <style> 
          .register{
            width: 180px;
            height: 32px;
            border: solid rgb(94, 155, 142);
            margin-left: 8%;
            color: mintcream;
            text-align: center;
          }
        </style>
    </form>
    
   
   
      <form id= "registerform" class="registerform" method="POST" action="goToLogin()">
            <a href="index.php"> <img class="links1" src="images/icon.png" height="30" width="30">  </a>  
                NAME: &nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; 
                <input type="text" name="uname" class="usert" required>
                &nbsp; &nbsp;  &nbsp; &nbsp;
                
                AGE: &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; 
                <input type="number" name="age" class="usert" required><br>
                <br>
                
                GENDER: &nbsp; &nbsp; &nbsp; &nbsp;
                <input type="radio" name="gender" value="male" required> Male &nbsp; &nbsp;
                <input type="radio" name="gender" value="female" required> Female &nbsp;
                <br>
                CATEGORY: &nbsp; &nbsp; &nbsp; &nbsp;
                <input type="checkbox" name="cat" value="categ"  >Literature &nbsp; &nbsp;
                <input type="checkbox" name="cat" value="categ"  >Camera &nbsp;
                <input type="checkbox" name="cat" value="categ"  >Food &nbsp; &nbsp;
                <input type="checkbox" name="cat" value="categ"  >Tech &nbsp;
                <input type="checkbox" name="cat" value="categ"  >Others &nbsp; &nbsp;
                <br>
                <br>
                USERNAME: &nbsp;    
                <input type="text" name="username" class="usert" required ><br>
                <br>
                PASSWORD: &nbsp;    
                <input type="password" name="psw" class="usert" required> <br>
                <br>
                <input type="submit" value="REGISTER" class="logt" name="sign-submit" >
            </form>
            <form class="regwrite" id="regwrite" method="POST">
             
              <br>
              <button class="regbut" onclick="goToLogin()">Already a user? Login</button> 
            
        </form>

    <script>
      function goToLogin(){
        document.getElementById("registerform").style.display='none';
        document.getElementById("regwrite").style.display='none';
        document.getElementById("startwrite").style.display='block';
        document.getElementById("startregwrite").style.display='block';
      } 
      function goToRegister(){
        document.getElementById("startwrite").style.display='none';
        document.getElementById("startregwrite").style.display='none';
        document.getElementById("registerform").style.display='block';
        document.getElementById("regwrite").style.display='block';
      }
    </script>

    <?php
      $query=mysqli_query($db,"SELECT * from posts");
      ?> <div class="site-section bg-white">
          <div class="container">
            <div class="row">
            <?php
          while($row=mysqli_fetch_array($query))
          { 
            $uid=$row['userID'];
            $sql=mysqli_query($db,"SELECT username from users where userID= '$uid'");
            while($rowsql=mysqli_fetch_array($sql)){
              $logusername= $rowsql['username'];
            }
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
    ?>

    <!-- <div class="site-section bg-white">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="single.html"><img src="images/img_1.jpg" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">
              <span class="post-category text-white bg-secondary mb-3">Politics</span>

              <h2><a href="single.html">The AI magically removes moving objects from videos.</a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 mr-3 float-left"><img src="images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
                <span>&nbsp;-&nbsp; July 19, 2019</span>
              </div>
              
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                <p><a href="#">Read More</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="single.html"><img src="images/img_2.jpg" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">
              <span class="post-category text-white bg-success mb-3">Nature</span>

              <h2><a href="single.html">The AI magically removes moving objects from videos.</a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 mr-3 float-left"><img src="images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
                <span>&nbsp;-&nbsp; July 19, 2019</span>
              </div>
              
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                <p><a href="#">Read More</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="single.html"><img src="images/img_3.jpg" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">
              <span class="post-category text-white bg-warning mb-3">Travel</span>

              <h2><a href="single.html">The AI magically removes moving objects from videos.</a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 mr-3 float-left"><img src="images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
                <span>&nbsp;-&nbsp; July 19, 2019</span>
              </div>
              
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                <p><a href="#">Read More</a></p>
              </div>
            </div>
          </div>


          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="single.html"><img src="images/img_1.jpg" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">
              <span class="post-category text-white bg-secondary mb-3">Politics</span>

              <h2><a href="single.html">The AI magically removes moving objects from videos.</a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 mr-3 float-left"><img src="images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
                <span>&nbsp;-&nbsp; July 19, 2019</span>
              </div>
              
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                <p><a href="#">Read More</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="single.html"><img src="images/img_2.jpg" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">
              <span class="post-category text-white bg-success mb-3">Nature</span>

              <h2><a href="single.html">The AI magically removes moving objects from videos.</a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 mr-3 float-left"><img src="images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
                <span>&nbsp;-&nbsp; July 19, 2019</span>
              </div>
              
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                <p><a href="#">Read More</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="single.html"><img src="images/img_4.jpg" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">
              <span class="post-category text-white bg-danger mb-3">Sports</span>

              <h2><a href="single.html">The AI magically removes moving objects from videos.</a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 mr-3 float-left"><img src="images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
                <span>&nbsp;-&nbsp; July 19, 2019</span>
              </div>
              
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                <p><a href="#">Read More</a></p>
              </div>
            </div>
          </div>


          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="single.html"><img src="images/img_1.jpg" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">
              <span class="post-category text-white bg-success mb-3">Nature</span>

              <h2><a href="single.html">The AI magically removes moving objects from videos.</a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 mr-3 float-left"><img src="images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
                <span>&nbsp;-&nbsp; July 19, 2019</span>
              </div>
              
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                <p><a href="#">Read More</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="single.html"><img src="images/img_2.jpg" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">
              <span class="post-category text-white bg-danger mb-3">Sports</span>
              <span class="post-category text-white bg-secondary mb-3">Tech</span>

              <h2><a href="single.html">The AI magically removes moving objects from videos.</a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 mr-3 float-left"><img src="images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
                <span>&nbsp;-&nbsp; July 19, 2019</span>
              </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                <p><a href="#">Read More</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="single.html"><img src="images/img_4.jpg" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">
              <span class="post-category text-info bg-danger mb-3">Sports</span>
              <span class="post-category text-white bg-warning mb-3">Lifestyle</span>

              <h2><a href="single.html">The AI magically removes moving objects from videos.</a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 mr-3 float-left"><img src="images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
                <span>&nbsp;-&nbsp; July 19, 2019</span>
              </div>
              
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                <p><a href="#">Read More</a></p>
              </div>
            </div>
          </div>
        </div> -->
        <div class="row text-center pt-5 border-top">
          <div class="col-md-12">
            <div class="custom-pagination">
              <span>1</span>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <span>...</span>
              <a href="#">15</a>
            </div>
          </div>
      </div>
    </div>
  </div>
    
    
    
    <div class="site-footer">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-4">
            <h3 class="footer-heading mb-4">About Us</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat reprehenderit magnam deleniti quasi saepe, consequatur atque sequi delectus dolore veritatis obcaecati quae, repellat eveniet omnis, voluptatem in. Soluta, eligendi, architecto.</p>
          </div>
          <div class="col-md-3 ml-auto">
            <!-- <h3 class="footer-heading mb-4">Navigation</h3> -->
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
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
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


    
  </body>
</html>