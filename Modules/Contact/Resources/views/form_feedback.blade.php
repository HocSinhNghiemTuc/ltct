<h4>Feedback</h4>
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="form-inline">
    <label style="color: white" class="col-3">Email: </label>
    <input style="margin-bottom: 1rem" type="email" placeholder="Input Email ..."
           class="form-control col-9 feedback-email">
</div>
<div class="form-inline">
    <label style="color: white" class="col-3">Content: </label>
    <textarea class="form-control col-9 feedback-content" placeholder="You can write ..." ></textarea>
</div>
<div class="container">
    <div class="row">
        <div class="col text-center">
            <input type="button" style="margin-top: 1rem;" class="btn btn-primary submit-feedback" value="Submit">
        </div>
    </div>
</div>
