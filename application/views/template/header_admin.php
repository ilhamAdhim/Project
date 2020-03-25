<!doctype html>
<html lang="en">
  <head>
  	<title><?=$title?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?=base_url()?>assets/css/stylenavbar.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" style="background:#244282">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
				<div class="p-4 pt-5">
		  		<h1><a href="<?=base_url()?>admin_home" class="logo">Jurusan Teknologi Informasi</a></h1>
	        <ul class="list-unstyled components mb-5">
			  <li class="active">
				<a href="#"> <i class="fa fa-home" aria-hidden="true"></i> Home</a>
			  </li>
	          <li>
	            <a href="<?=base_url()?>admin_home/researchGroup"> <i class="fa fa-cogs" aria-hidden="true"></i> Research Groups</a>
	          </li>
	          <li>
	              <a href="<?=base_url()?>admin_home/classList"> <i class="fa fa-cubes" aria-hidden="true"></i> </i> Classes</a>
	          </li>

			  <li>
              <a href="<?=base_url()?>admin_home/subjectList"> <i class="fa fa-book" aria-hidden="true"></i> Subjects</a>
	          </li>


	          <li>
			  
              <a href="#lecSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <span> <i class="fa fa-users" aria-hidden="true"></i> </span> Lecturers</a>
              <ul class="collapse list-unstyled" id="lecSubmenu">
			  	<li>
                    <a href="<?=base_url()?>admin_home/">All Lecturers</a>
                </li>

                <li>
                    <a href="<?=base_url()?>admin_home/statusLecturer">Status</a>
                </li>

				<li>
                    <a href="<?=base_url()?>admin_home/fieldLecturer">Fields</a>
                </li>

                <li>
                    <a href="<?=base_url()?>admin_home/positionLecturer">Position</a>
                </li>

                <li>
                    <a href="<?=base_url()?>admin_home/dpaLecturer">DPA</a>
                </li>

                <li>
                    <a href="<?=base_url()?>admin_home/researchLecturer">Research</a>
                </li>
				
                <li>
                    <a href="<?=base_url()?>admin_home/hourDistributionLecturer">Hour Dist.</a>
                </li>
				
              </ul>
	          </li>
	          
	          <li>
              <a href=" <?=base_url(); ?>login/logout " class="nav-item nav-link "> Logout </a>
              
	          </li>
	        </ul>

	      </div>
    	</nav>

		<div id="content" class="p-4 p-md-5 pt-5">
