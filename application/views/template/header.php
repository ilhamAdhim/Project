<!doctype html>
<html lang="en">
  <head>
    <title><?=$title ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Material Design Bootstrap -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.14.1/css/mdb.min.css" rel="stylesheet">

	<link rel="stylesheet" href="<?=base_url()?>assets/css/stylenavbar.css">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  </head>
  <body>

    <style>

        body,html{
        scroll-behavior:smooth;  
        }

    </style>
        <nav class="navbar navbar-expand-md navbar-dark" style="background-color:#244282;">
        <a class="navbar-brand" href="#">
            <img src="<?=base_url()?>assets/images/logo JTI.png" height=100px alt="">
        </a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 smooth-scroll">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Personal Information <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#schedule">Time Schedule</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#subjects"> Subjects List </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#researchGroup"> Research Group </a>
                    </li>


                <li class="nav-item">
                    <a href=" <?=base_url(); ?>auth/logout " class="nav-item nav-link "> Logout </a>
                </li>

                </ul>

        </div>
    </nav>