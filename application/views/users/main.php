<br>
<!-- Search Tickets -->
<div class="container">
    <div class="card">
        <div class="card-body">
            <nav class="navbar navbar-light bg-light justify-content-between">
                <div class="btn-group" role="group" >
                    <a href="/users/create_ticket" class="btn btn-primary">Open new ticket</a>
                    <a class="btn btn-success" href="/users/index_active_ticket/">Active Tickets</a>
                    <a class="btn btn-dark" href="/users/index_closed_ticket/">Closed Tickets</a>
                </div>
                <form class="form-inline" action="/users/search" method="post">
                    <input type="search" class="form-control mr-sm-2" name="search_text" id="search_text" placeholder="Search" >
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </nav>
        </div>
    </div>
</div>
<div class="container">
<br>
<div id="result">
    <!-- Empty Search Return-->
<?php if(!$tickets):?>
<div class="card">
    <div class="card-body">
    <h3 class="card-title">Sorry, no records found..</h3>
    </div>
</div>
<?php endif?>
<!-- Show Tickets -->
<?php foreach($tickets as $ticket) { ?>
<div class="card">
    <div class="card-body">
    <h3 class="card-title"><?php echo $ticket->id; ?> - <?php echo $ticket->ticket_name; ?></h3>
    <h6 class="mr-sm-2"><?php echo $ticket->username; ?></h6>
    <a href="<?php echo base_url("users/show_ticket/$ticket->id"); ?>" 
    <?php if($ticket->status):?>
    class="btn btn-warning"
    <?php else:?>
    class="btn btn-dark"
    <?php endif ?> >Show</a>

    </div>
</div>
<?php } ?>
</div>
<hr>
