<h1>Add new work</h1>
<form action="/works/create" method="POST">
    <div class="form-group">
        <label for="name">Work name:</label>
        <input type="text" class="form-control" name="name" id="name">
    </div>
    <div class="form-group">
        <label for="startDate">Start date:</label>
        <input type="datetime-local" id="startDate" name="startDate">
        <label for="endDate">End date:</label>
        <input type="datetime-local" id="endDate" name="endDate">
    </div>
    <div class="form-group">
        <label for="status">Status:</label>
        <select class="form-control" id="status" name="status">
            <option value="1">Planning</option>
            <option value="2">Doing</option>
            <option value="3">Complete</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>