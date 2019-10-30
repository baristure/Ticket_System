<?php foreach($tickets as $key=>$ticket): ?>
<?php if($key==0): ?>
            <center><h3 class="card-title">Ticket id : <?php echo $key+1; ?> - Ticket subject : <?php echo $ticket->ticket_name; ?></h3></center>
        <?php endif ?>
<?php if($ticket->username==('Admin')):?>
<div class="row ">
    <div class="col-sm-6 offset-md-6">
<div class="text-white bg-secondary card">
<?php else:?>
<div class="row ">
    <div class="col-sm-6 ">
<div  class="card bg-light">
<?php endif ?>
    <div class="card-body">
        <h6 class="mr-sm-2"><?php echo $ticket->username; ?></h6>
        <p class="card-text"><?php echo $ticket->ticket_body; ?></p>
        <?php if($ticket->ticket_file):?>
            <img src="/uploads/<?php echo $ticket->ticket_file ?>" style="height: 150px; width: 150px;" >
        <?php endif ?>
                </div>
            </div>
        </div>
    </div>
        <br>
        <br>
            <!-- Show new message button for users -->
        <?php if($key+1 == count($tickets)): ?>
            <?php if($ticket->status): ?>
                <div>
                <center><a href="/admin/new_message/<?php echo $ticket->id?>" class="btn btn-primary btn-lg btn-block col-sm-3">Message</a>
                <?php if($ticket->username==('Admin')):?>
                <a href="/admin/edit_ticket/<?php echo $ticket->id?>" class="btn btn-warning btn-lg btn-block col-sm-3">Edit</a></center>
                <?php endif;?>
                </div>
            <?php else: ?>
                <center><a href="/admin" class="btn btn-success btn-lg btn-block col-sm-3">Finished</a></center>
            <?php endif ?>
        <?php endif ?>
<?php endforeach ?>