<form action="/admin/addteacher" method="POST" enctype="multipart/form-data">
    @csrf
<div class="row" id="upload">
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                <label>Photo upload</label>
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input" id="file" name="file">
                    </div>
                    <div class="mt-3">
                        <button name="addClassTeacher" type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </div>
        </div>
    </div>
</div>
</div>
</form>
