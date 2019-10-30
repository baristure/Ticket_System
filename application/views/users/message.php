<?php foreach($tickets as $key=>$ticket): ?>
<?php if($ticket->username==('Admin')):?>
<div class="row ">
    <div class="col-sm-6 offset-md-6">
        <div class="text-white bg-secondary card ">
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
        <p style="width:%50;"class="card-text"><?php echo $ticket->ticket_body; ?></p>
        <?php if($ticket->ticket_file):?>
            <img src="/uploads/<?php echo $ticket->ticket_file ?>" style="height: 150px; width: 150px;" >
        <?php endif ?>
        <br>
        <br>
    </div>
</div>    
</div></div>
<?php endforeach ?>


<form action="/users/reply_ticket/<?php echo $tickets[0]->id ?>" method="post" enctype="multipart/form-data">
<div class="card">
    <div class="card-body">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">With textarea</span>
            </div>
            <textarea name="ticket_body" class="form-control col-6" cols="15" rows="5"></textarea>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" >Upload a File</span>
            </div>
            <div class="custom-file col-2">
                <input type="file" name="ticket_file" class="custom-file-input" >
                <label class="custom-file-label" >Choose file</label>
            </div>
        </div>  
        <button type="submit" class="btn btn-primary" value="upload">Submit</button>
        <a class="btn btn-secondary" href="/users/">Back</a>
    </div>  
</div>
</form>