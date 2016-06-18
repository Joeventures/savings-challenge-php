<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8">

	<title>52-Week Money Challenge<?php if(isset($title)) echo " | $title"; ?></title>
	<meta name="author" content="Joe Winter">

	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/challenge.css"); ?>">
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>

<body>
<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo base_url(); ?>">52 Week Money Challenge</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-navbar">
			<ul class="nav navbar-nav">
				<?php if ($this->session->userdata('loggedin')) { ?>
				<li>
					<a href="<?php echo base_url('/login/stop'); ?>">Log Out</a>
				</li>
				<?php } ?>
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container -->
</nav>