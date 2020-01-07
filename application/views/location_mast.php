<script>
function validateForm()
{
     if(document.pressed == 'submit')
    {
      document.myForm.action ="<?php echo site_url('site/location_mast_submit');?>";
    }
    if(document.pressed == 'update')
    {
      document.myForm.action ="<?php echo site_url('site/location_update_submit'); ?>";
    }
    return true;
}
function update(sno)
{
  $.ajax({
    method: "post",
    data: "sno="+sno,
    url: "<?php echo site_url('site/update_location_mast'); ?>",
    success: function(data){
      var obj = jQuery.parseJSON(data);
      $("input[name=sno]").val(obj.sno);
      $("input[name=location_nm]").val(obj.location_nm);
      $("#submit").hide();
      $("#update").show();
      $("#addusr").hide();
       $("#updateusr").show();
    }
  });
}
</script>
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-6">
      <section class="content-header">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">
        		<span id="addusr">Add Location</span>
            <span id="updateusr" style="display: none;">Update Location</span>
      </h3>
      <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            <button type="button" class="toggle-expand-btn btn btn-box-tool"><i class="fa fa-expand"></i></button>
         </div>
    </div>
       <form name="myForm" action="" class="form-horizontal" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
          <h4 style="color: red;text-align: center;"><?php echo $this->session->flashdata('location'); ?></h4>
        <div class="box-body">
        	   <div class="form-group">
            <label class="col-md-4">Location Name</label>
            <div class="col-md-8"> 
            	 <input type="hidden" class="form-control" name="sno">
              <input type="text" class="form-control" name="location_nm"  id="location_nm" placeholder="Location Name">
            </div>
          </div>
        </div>
        <div class="box-footer">
          <input type="reset" class="btn btn-default" value="Clear Form">
              <input type="submit" class="btn btn-info pull-right" onClick="document.pressed=this.value" value="submit" id="submit">
              <input type="submit" class="btn btn-success pull-right" onClick="document.pressed=this.value" value="update" id="update" style="display:none;">
        </div>
        </form>
  </div>
      </section>
    </div>
   <div class="col-md-6">
      <section class="content-header">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Location List</h3>
             <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
          </div>

            <div class="box-body">
              <div class="table-responsive">
               <table id="locationlist" class="table table-bordered table-striped">
                  <thead style="background-color: #00c0ef !important;color: white">
                  <tr>
                        <th>Sno</th>
                        <th>Location Name</th>
                        <th>Update</th>
                        <th>Delete</th>
                      </tr>
                  </thead>
                 <tbody>
                       <?php
                       $index=0;
                        foreach ($locton as $key => $value) {
                          $index++;
                       ?>
                       <tr>
                        <td><?php echo @$index;?></td>
                        <td><?php echo @$value->location_nm;?></td>
                         <td>
                           <a onclick="update(<?php echo $value->sno; ?>);" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                          </td>
                         <td>
                          <a href="<?php echo site_url("site/delete_city_mast")."?sno=".$value->sno; ?>');" class="btn btn-primary" onclick="return confirm('Are you sure want to delete.');"><i class="fa fa-trash-o" style="color:red;"></i></a>
                          </td>
                      </tr>
                     <?php } ?>
                   </tbody>
                </table>
      </div>
    </div>
  </div>
      </section>
    </div>
  </div>
</div>
