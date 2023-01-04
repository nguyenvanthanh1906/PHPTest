<h1>Edit work</h1>
<form action="/works/update" method="POST">
    <input type="text" class="form-control" name="id" id="id" value="<?php echo $data[0]->getId() ?>" hidden>
    <div class="form-group">
        <label for="name">Work name:</label>
        <input type="text" class="form-control" name="name" id="name" value="<?php echo $data[0]->getName() ?>">
    </div>
    <div class="form-group">
        <label for="startDate">Start date:</label>
        <input type="datetime-local" id="startDate" name="startDate" value="<?php echo $data[0]->getStartDate() ?>">
        <label for="endDate">End date:</label>
        <input type="datetime-local" id="endDate" name="endDate" value="<?php echo $data[0]->getEndDate() ?>">
    </div>
    <div class="form-group">
        <label for="status">Status:</label>
        <select class="form-control" id="status" name="status">
            <option value="1" <?php if ($data[0]->getStatus() == 1) echo 'selected'  ?>>Planning</option>
            <option value="2" <?php if ($data[0]->getStatus() == 2)  echo 'selected'  ?>>Doing</option>
            <option value="3" <?php if ($data[0]->getStatus() == 3)  echo 'selected'  ?>>Complete</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Delete</button>
</form>
<form action="/works/delete" method="POST">
    <input type="text" class="form-control" name="id" id="id" value="<?php echo $data[0]->getId() ?>" hidden>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-body">
                <p>Are you sure?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
            </div>
        </div>
    </div>
</form>
