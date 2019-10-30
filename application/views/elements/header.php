<!DOCTYPE html>
<html lang="en">  
<head>
<title>Ticket System by Blodgharm</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900" 	type="text/css" media="all">
<!-- Stylesheet file -->
<link href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url("assets/css/custom.css"); ?>" rel='stylesheet' type='text/css' />
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo base_url(); ?>"><strong> <h2>TickeySystem</h2></strong></a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="nav" >
        <li class="nav-item active">
          <a class="nav-link"   href="<?php echo base_url('users'); ?>"  >Users</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link"  href="<?php echo base_url('admin'); ?>" >Admin</a>
        </li>
      </ul>
    </div>
  </nav>
