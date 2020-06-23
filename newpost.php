<?php
$logusername=$_GET['username'];
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
    <br>
    <div class="container">
        <div class="row">

            <div class="col-md-7">
                <!-- <div class="box"; -->
                <p class="Heading1"><strong>THE CURVED HEART</strong> </p>
                <style> 
                    .Heading1{
                        font-size: 220%;
                        font: "Comic Sans MS";
                    }
                </style>
             </div>
            <div class="col-md-5">
                <p class="headtop"><mark>POSTED AS <?php echo strtoupper($logusername)?> </mark></p>
                <style> 
                    .headtop{
                        font-size: 120%;
                        font: "Comic Sans MS";
                    }
                </style>
                <br>
            </div>
             </div>

            <div class="row">
                <div class="col-md-6">
                    <label <p> <em> ADD POST TITLE </em> </label> <input class="form-control" id="ex3" type="text">
                </div>
                
                <div class="col-md-6">
                    <label <p> <em> ADD IMAGE </em> </label> <input class="form-control" id="ex3" type="text" value="ADD IMAGE" >
                </div>
            </div>

            <div class="rows">
                <div class="col-md-8">
                    <input type="text" name="about" class="np" ><br> 
                </div>
            </div>
            <style>
            .np{
                margin-left: 40%;
                width: 400px;
                height: 350px;
                border-radius: 10px;
                border: solid rgb(94, 155, 142);
                overflow: hidden;
            }
            .row{
                height: 100px;
            }
            </style>
  </body>