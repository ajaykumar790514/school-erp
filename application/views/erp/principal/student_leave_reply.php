
<script type="text/javascript">
$(document).ready(function() {
    $(".validate-form").validate({
        rules: {
            status:"required",
            
        },
        messages: {
            status:"Please Select Status",
        }
    }); 
});
</script>
    <form class="form ajaxsubmit validate-form submit reload-tb" action="<?=$action_url?>" method="post" enctype= multipart/form-data>
    <div class="modal-body">
    <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" name="leave_id" value="<?=$row->id;?>">
                                <div class="form-group">
                                    <label for="">Select Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="PENDING" <?php if($row->approval_status=='PENDING'){echo "selected";} ;?> >PENDING</option>
                                        <option value="APPROVED"   <?php if($row->approval_status=='APPROVED'){echo "selected";} ;?> >APPROVED</option>
                                        <option value="REJECTED"  <?php if($row->approval_status=='REJECTED'){echo "selected";} ;?> >REJECTED</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 remarks" style="display: none;">
                                <div class="form-group">
                                    <label for="">Enter Remark</label>
                                    <textarea name="remark" class="form-control remark"></textarea>
                                </div>
                            </div>
                           </div>
    </div>
<div class="modal-footer">
    <button type="reset" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
    <button id="btnsubmit" type="submit" class="btn btn-danger waves-light" ><i id="loader" class=""></i>Update</button>
</div>

</form>

<script>
        $('select').on('change', function() {
        var status = ( this.value );
        if(status=='REJECTED'){
            $(".remarks").show();
        }else
        {
            $(".remarks").hide(); 
        }
         });
         
    </script>
