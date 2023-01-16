<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <input type="hidden" name="user_id" value="{{$user_id}}">
        </div>
        <div class="form-group">
            <input type="hidden" name="advertisement_id" value="{{$advertisement_id}}">
        </div>
        <div class="form-group">
            <input type="date" name="date_in" value="<?php print(date("Y-m-d")); ?>">
        </div>
        <div class="form-group">
            <input type="date" name="date_out" id="date_out">
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>