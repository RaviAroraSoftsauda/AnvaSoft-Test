<script>
function validateForm()
{
     if(document.pressed == 'submit')
    {
      document.myForm.action ="<?php echo site_url('site/master_submit');?>";
    }
    if(document.pressed == 'update')
    {
      document.myForm.action ="<?php echo site_url('site/master_update_submit'); ?>";
    }
    return true;
}
function update(sno)
{
  $.ajax({
    method: "post",
    data: "sno="+sno,
    url: "<?php echo site_url('site/update_master'); ?>",
    success: function(data){
      var obj = jQuery.parseJSON(data);
      $("input[name=sno]").val(obj.sno);
      $("input[name=first_name]").val(obj.first_name);
      $("input[name=last_name]").val(obj.last_name);
      $("select[name=location]").val(obj.location).trigger('change');
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
        		<span id="addusr">Add Customer</span>
            <span id="updateusr" style="display: none;">Update Customer</span>
      </h3>
      <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
    </div>
       <form name="myForm" action="" class="form-horizontal" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
          <h4 style="color: red;text-align: center;"><?php echo $this->session->flashdata('location'); ?></h4>
        <div class="box-body">
        	   <div class="form-group">
            <label class="col-md-4">First Name</label>
            <div class="col-md-8"> 
            	 <input type="hidden" class="form-control" name="sno">
              <input type="text" class="form-control" name="first_name"  id="first_name" placeholder="First Name">
            </div>
          </div>
           <div class="form-group">
            <label class="col-md-4">Last Name</label>
            <div class="col-md-8"> 
              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
            </div>
          </div>
            <div class="form-group">
            <label class="col-md-4">Location</label>
            <div class="col-md-8"> 
              <select class="form-control select2" name="location" id="location" placeholder="Location">
                 <option value=""></option>
                  <?php
                  foreach($locton as $s)
                  {
                  ?>
                  <option value="<?=$s->sno?>"><?=$s->location_nm?></option>
                  <?php
                  }
                  ?>
              </select>
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
            <h3 class="box-title">Customer List</h3>
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
                        <th nowrap="">First Name</th>
                        <th nowrap="">Last Name</th>
                        <th>Location</th>
                        <th>Update</th>
                        <th>Delete</th>
                      </tr>
                  </thead>
                 <tbody>
                       <?php
                       $index=0;
                        foreach ($master as $key => $value) {
                          $index++;
                       ?>
                       <tr>
                        <td><?php echo @$index;?></td>
                        <td><?php echo @$value->first_name;?></td>
                        <td><?php echo @$value->last_name;?></td>
                        <td><?php echo $this->site_model->get_location($value->location);?></td>
                         <td>
                           <a onclick="update(<?php echo $value->sno; ?>);" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                          </td>
                         <td>
                          <a href="<?php echo site_url("site/delete_master")."?sno=".$value->sno; ?>');" class="btn btn-primary" onclick="return confirm('Are you sure want to delete.');"><i class="fa fa-trash-o" style="color:red;"></i></a>
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
