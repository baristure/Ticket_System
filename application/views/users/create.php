<form action="<?php echo base_url("users/submit_ticket") ?>" method="post" enctype="multipart/form-data">
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Create New Ticket</h5>
        <div class="input-group input-group-sm mb-3 ">
            <div class="input-group-prepend">
                <span class="input-group-text" >Username</span>
            </div>
            <input type="text" name="username" class="form-control col-2" >
            </div>
            <div class="input-group input-group-sm mb-3 ">
            <div class="input-group-prepend">
                <span class="input-group-text" >Category</span>
            </div>
            <input type="text" name="ticket_name" class="form-control col-2" >
        </div>
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