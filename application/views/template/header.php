<!doctype html>
<html lang="en">
  <head>
    <title><?=$title ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <style>

        body,html{
        scroll-behavior:smooth;  
        }

    </style>

    <?php if($identity == "Admin"){ ?>
        <nav class="navbar navbar-expand-md navbar-dark" style="background-color:#244282; ">
    <?php } else{ ?>
        <nav class="navbar navbar-expand-md navbar-dark" style="background-color:#244282;">
    <?php } ?>


        <a class="navbar-brand" href="#">
            <img src="<?=base_url()?>assets/images/logo JTI.png" height=100px alt="">
        </a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 smooth-scroll">


                <?php if($identity =='Admin') { ?>


                    <li class="nav-item active">
                        <a class="nav-link" href="#">Research Group <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Course List</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#"> Lecturer List </a>
                    </li>
                <?php }else{ ?>


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
                <?php } ?>

                <li class="nav-item">
                    <a href=" <?=base_url(); ?>auth/logout " class="nav-item nav-link "> Logout </a>
                </li>

                </ul>

        </div>
    </nav>