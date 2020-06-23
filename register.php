<?php
      session_start();
      $db = mysqli_connect("localhost","root","root","blogdb") or die("couldnot connect");
       $row=-1;
       $flag=true;

       if(isset($_POST['signsubmit'])) {
          $name = mysqli_real_escape_string($db,$_POST['uname']);
          $age = mysqli_real_escape_string($db,$_POST['age']);
          $gender = mysqli_real_escape_string($db,$_POST['gender']);
          $categ = mysqli_real_escape_string($db,implode(",",$_POST['cat']));
          $username = mysqli_real_escape_string($db,$_POST['username']);
          $password1 = mysqli_real_escape_string($db,$_POST['psw']);
        
          $password=md5($password1);
          $try=mysqli_query($db,"SELECT username FROM users where username='$username'");
          $row=mysqli_num_rows($try);
          
          if($row==0){
              $sql = "INSERT INTO users(name,age,gender,category,username,password) VALUES ('$name','$age','$gender','$categ','$username','$password')";
              mysqli_query($db,$sql);
              $_SESSION['username']=$username;
              $messs = "Registered Succesfully.";
              echo "<script type='text/javascript'>alert('$messs');</script>";
              header("Location: index.php");
              $flag=false;
          }
          if($row>0){ ?>
                  <!-- // $msg="USERNAME ALREADY EXISTS";
                  // echo "<span style='color: blue; font-size=80px;' > Username already exsits. </span> <script type='text/javascript'> gotoRegisterForm(); </script> "; -->
            <html>
            <div class="alert alert-danger">
            <strong>Pardon!</strong> Username already taken.
            </div>
            </html>
        <?php
        }
        }
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
                <li class="d-none d-lg-inline-block"><a href="#" class="js-search-toggle"><span class="icon-search"></span></a></li>
              </ul>
            </nav>
            <a href="#" class="site-menu-toggle js-menu-toggle text-black d-inline-block d-lg-none"><span class="icon-menu h3"></span></a></div>
          </div>

      </div>
    </header>
     
    <form id= "registerform" class="registerform" method="POST">
            <!-- <a href="index.php"> <img class="links1" src="images/icon.png" height="30" width="30">  </a>   -->
                <br><br>
                NAME: &nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; 
                <input type="text" name="uname" class="usert" required>
                &nbsp; &nbsp;  &nbsp; &nbsp;
                <br><br>
                AGE: &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; 
                <input type="number" name="age" class="usert" required>
                <br><br>
                GENDER: &nbsp; &nbsp; &nbsp; &nbsp;
                <input type="radio" name="gender" value="male" required> Male &nbsp; &nbsp;
                <input type="radio" name="gender" value="female" required> Female &nbsp;
                <br><br>
                CATEGORY: &nbsp; &nbsp; &nbsp; &nbsp;
                <input type="checkbox" name="cat[]" value="Literature">Literature &nbsp; &nbsp;
                <input type="checkbox" name="cat[]" value="Camera"  >Camera &nbsp;
                <input type="checkbox" name="cat[]" value="Food"  >Food &nbsp; &nbsp;
                <input type="checkbox" name="cat[]" value="Tech"  >Tech &nbsp;
                <input type="checkbox" name="cat[]" value="Others"  >Others &nbsp; &nbsp;
                <br><br>
                USERNAME: &nbsp;    
                <input type="text" name="username" class="usert" required >
                <br><br>
                PASSWORD: &nbsp;    
                <input type="password" name="psw" class="usert" required>
                <br><br>
                <input type="submit" name="signsubmit" value="REGISTER" class="logt" >
            </form>
            <style>
               body{
                    background-image: url('images/img_v_2.jpg');
                    /* height: 100vh; */
                      background-size: cover;
                  /* background-position: center; */ 
                }

                .registerform input[type="text"]{
                    padding: 05px 5px 05px 5px;
                    border: 1px solid;
                    border-radius: 25px;
                    outline: none;
                }
                .registerform input[type="number"]{
                    padding: 05px 5px 05px 5px;
                    border: 1px solid;
                    border-radius: 25px;
                    outline: none;
                }
                .registerform input[type="password"]{
                    padding: 05px 5px 05px 5px;
                    border: 1px solid;
                    border-radius: 25px;
                    outline: none;
                }
                #registerform{
                    border-radius: 25px;
                    position: fixed;
                    top: 15%;
                    left: 30%;   
                    color: mintcream;
                    background-color: white;
                    border: 2.5px solid rosybrown;  
                    padding: 13px 13px;
                    color: black;
                    display: block;  
                }
            </style>
            <script>
            function showsuccess(){
                window.alert("Sucessfully Registered!!!");
            }
            </script>

            
        </body>
        </html>

        