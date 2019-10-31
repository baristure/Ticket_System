<!DOCTYPE html>
<html lang="en">  
<head>
<title>Ticket System</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900" 	type="text/css" media="all">
<!-- Stylesheet file -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo base_url(); ?>"><strong> <h2>TicketSystem</h2></strong></a>
    <div class="collapse navbar-collapse" >
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
