<br>
<!-- Search Tickets -->
<div class="container">
    <div class="card">
        <div class="card-body">
            <nav class="navbar navbar-light bg-light justify-content-between">
                <div class="btn-group" role="group" >
                    <a class="btn btn-success" href="/admin/index_active_ticket/">Active Tickets</a>
                    <a class="btn btn-dark" href="/admin/index_closed_ticket/">Closed Tickets</a>
                </div>
                <form class="form-inline" action="/admin/search" method="post">
                    <input type="search" class="form-control mr-sm-2" name="search_text" id="search_text" placeholder="Search" >
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </nav>
        </div>
    </div>
</div>
<div class="container">
<br>

    <!-- Empty Search Return-->
<?php if(!$tickets):?>
<div class="card">
    <div class="card-body">
    <h3 class="card-title">Sorry, no records found..</h3>
    </div>
</div>
<?php endif?>
<?php foreach($tickets as $ticket) { ?>
<div class="card">
    <div class="card-body">
        <h3 class="card-title"><?php echo $ticket->id; ?> - <?php echo $ticket->ticket_name; ?></h3>
        <h6 class="mr-sm-2"><?php echo $ticket->username; ?></h6>
        <a href="<?php echo base_url("admin/show_ticket/$ticket->id"); ?>" class="btn btn-warning">Show</a>
        <?php if($ticket->status): ?>
            <a href="/admin/close_ticket/<?php echo $ticket->id ?>" class="btn btn-danger">Close</a>
        <?php else: ?>
            <a href="/admin" class="btn btn-dark">Closed</a>
        <?php endif ?>
    </div>
</div>
<?php } ?>
<hr>

