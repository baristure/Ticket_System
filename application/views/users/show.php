<!-- Show all tickets -->
<?php foreach($tickets as $key=>$ticket): ?>
    <?php if($ticket->username==('Admin')):?>
    <div class="row ">
        <div class="col-sm-6 offset-md-6">
            <div class="text-white bg-secondary card">
    <?php else: ?>
        <div class="row ">
            <div class="col-sm-6 ">
                <div  class="card bg-light">
    <?php endif ?>
                    <div class="card-body">
        <?php if($key==0): ?>
            <h3 class="card-title"><?php echo $key+1; ?> - <?php echo $ticket->ticket_name; ?></h3>
        <?php endif ?>
        <h6 class="mr-sm-2"><?php echo $ticket->username; ?></h6>
        <p  class="card-text"><?php echo $ticket->ticket_body; ?></p>
        <?php if($ticket->ticket_file):?>
            <img src="/uploads/<?php echo $ticket->ticket_file ?>" style="height: 150px; width: 150px;" >
        <?php endif ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Show new message button for users -->
    <?php if($key+1 == count($tickets)): ?>
        <?php if($ticket->status): ?>
        <br>
        <center><a href="/users/new_message/<?php echo $ticket->id?>" class="btn btn-primary btn-lg btn-block col-sm-3">New Message</a></center>
        <?php else: ?>
        <br>
        <center><a href="/users"  class="btn btn-success btn-lg btn-block col-sm-3">Finished</a></center>
        <?php endif ?>
    <?php endif ?>
<?php endforeach ?>