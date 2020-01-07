<script>
var counter = 1;
var member = counter+3;
var limit = 10;
function addInput()
{
  var snoinm='<?php echo @$jpup['sno']?>';
  if(snoinm!='')
  {
      var stagelngth=<?php echo json_encode($jobdet)?>;
      member = counter+stagelngth.length;
	}
  if(counter == limit)
  {
     alert("You have reached the limit of adding "+counter+"inputs");
  }
  else
  {
    var newdiv = document.createElement('div');
    var new_div='<tr id="rohit'+member+'"><td><input type="hidden" name="stage_number[]" id="stage_number'+member+'" value="STAGE-0'+member+'"><b>STAGE-0'+member+'</b></td><td> <input type="text" class="form-control" name="stage[]" id="stage'+member+'" placeholder="(Optional)"></td> <td><input type="text" class="form-control timepicker"  name="bid_time[]" id="stage'+member+'"></td><td><a id="remove'+member+'" style="cursor:pointer;" onclick="remove_div_st('+member+');"><i class="fa fa-times" style="font-size: 20px;color: red;margin-top: 7px;"></i></a></td></tr>';
    $(new_div).insertBefore("#insert_div");
    counter++;
    member++;

  } 
}
function remove_div_st(id,snoid)
{   
      var v = confirm('Are you want to update Status');
      if(v == true)
      {
        if(snoid!=''){
           $.ajax({
              url: "<?php echo site_url('Site/delete_jobdet_jobmast');?>",
              data:  "id="+id+"&snoid="+snoid,
              type: 'post',
              success: function(result)
              {
                  var obj = jQuery.parseJSON(result);
                  if(obj.data=="false")
                  {
                     alert('Entry can not be deleted');
                  }
                  else
                  {
                    counter--;
                    member--;
                    $("#rohit"+id).remove();
                  }
              }
              });
        }else{
                counter--;
                member--;
                $("#rohit"+id).remove();
        }   
      }
      else
      {
          
      }
}
</script>
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-6">
      <section class="content-header">
         
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">
      	 	<?php
            if(@$jpup['sno']!= '')
            {
            ?>
             	<span id="updtusr">Update Job</span>
        <?php }else{?>
        		<span id="addusr">Add Job</span>
        <?php } ?>
      </h3>
      <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
    </div>
       <?php
        if(@$jpup['sno']!= ''){
        ?>
        <form name="myForm" class="form-horizontal" action="<?php echo site_url('site/job_mast_update_submit'); ?>" method="post" enctype="multipart/form-data">
       
        <?php
        }else{
        ?>
        <form name="myForm" class="form-horizontal" action="<?php echo site_url('site/job_mast_submit'); ?>" method="post" enctype="multipart/form-data">
        <?php } ?>
          <h4 style="color: red;text-align: center;"><?php echo $this->session->flashdata('job_inst'); ?></h4>
        <div class="box-body">
        	   <div class="form-group">
            <label class="col-md-4">Job Number</label>
            <div class="col-md-8"> 
            	 <input type="hidden" class="form-control" value="<?php echo @$jpup['sno']?>" name="snoid">
              <input type="text" class="form-control" value="<?php echo @$jpup['jobnumbr']?>" name="jobnumbr"  id="jobnumbr" placeholder="Job Number">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4">Job Title</label>
            <div class="col-md-8"> 
              <input type="hidden" class="form-control" name="sno" id="sno">
              <input type="text" class="form-control" name="jobtitle" value="<?php echo @$jpup['jobtitle']?>" id="jobtitle" placeholder="(Optional)">
            </div>
          </div>
           <div class="form-group">
            <label class="col-md-4">Job Date</label>
            <div class="col-md-8"> 
              <input type="text" class="form-control datepicker" autocomplete="off" value="<?php if(@$jpup['sno']){echo @$jpup['jobdt'];}else{echo date('m/d/Y');} ?>" required="" name="jobdt" id="jobdt" placeholder="Job Date">
            </div>
          </div>
           <div class="form-group">
            <label class="col-md-4">Job Time</label>
            <div class="col-md-8"> 
              <input type="text" class="form-control timepicker" autocomplete="off" value="<?php echo @$jpup['jobtime']; ?>" required="" name="jobtime" id="jobtime">
            </div>
          </div>
           	<div class="form-group">
          	<div class="col-md-12">
          		<table class="table table-bordered table-striped">
          			<thead style="background-color: #00c0ef !important;color: white">
          				<tr>
          					<th nowrap="">Stage Number</th>
          					<th nowrap="">Stage Title</th>
                    <th nowrap="">Bid Time</th>
          					<th>Delete</th>
          				</tr>
          			</thead>
          			<tbody>
          			<?php 
          			   if(@$jpup['sno']!= '')
          			    { 
                        $r = 0;
                        foreach($jobdet as $c)
                        {
                         $r++; 
          				?>
                 
                				<tr id="rohit<?php echo $r;?>">
                					<td>
                            <input type="hidden" name="jobdetid[]" value="<?php echo $c->snoid?>">
                            <input type="hidden" id="stage_number0" name="stage_number[]" value="<?php echo $c->stage_numjob?>"><b>STAGE-0<?php echo $r;?></b></td>
                					<td> 
                            <input type="text" class="form-control" value="<?php echo $c->stagejob?>" name="stage[]" id="stage0" placeholder="(Optional)"></td>
                				 <?php if($r!=1){?>
                				 <td><a id="remove<?php echo $r;?>" style="cursor:pointer;" onclick="remove_div_st('<?php echo $r;?>','<?php echo $c->snoid?>');"><i class="fa fa-times" style="font-size: 20px;color: red;margin-top: 7px;"></i></a></td>
                				 <?php }?>
                				</tr>
          			<?php 
          		     }
          		     }
          		     else
          		     {
          			?>
          			   <tr>
          					<td><input type="hidden" id="stage_number0" name="stage_number[]" value="STAGE-01"><b>STAGE-01</b></td>
          					<td> <input type="text" class="form-control" value="Welding"  name="stage[]" id="stage1" placeholder="(Optional)"></td>
                    <td> <input type="text" class="form-control timepicker"  name="bid_time[]" id="stage1"></td>
          				</tr>
                    <tr>
                    <td><input type="hidden" id="stage_number0" name="stage_number[]" value="STAGE-02"><b>STAGE-02</b></td>
                    <td> <input type="text" class="form-control" value="Machining" name="stage[]" id="stage2" placeholder="(Optional)"></td>
                     <td> <input type="text" class="form-control timepicker"  name="bid_time[]" id="stage1"></td>
                  </tr>
                    <tr>
                    <td><input type="hidden" id="stage_number0" name="stage_number[]" value="STAGE-03"><b>STAGE-03</b></td>
                    <td> <input type="text" class="form-control" value="Cleaning" name="stage[]" id="stage3" placeholder="(Optional)"></td>
                     <td> <input type="text" class="form-control timepicker"  name="bid_time[]" id="stage3"></td>
                  </tr>
          		<?php } ?>
          				<tr id="insert_div">
          					<td></td>
          					<td><a id="add" onclick="addInput();" style="cursor: pointer;"><i class="fa fa-plus" style="font-size: 20px;color: #36c536;"></i></a></td>
                     <td></td>
          				</tr>

          			</tbody>
          		</table>
          	</div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <input type="reset" class="btn btn-default" value="Clear Form">
           <?php
            if(@$jpup['sno']!= '')
            {
            ?>
            <button type="submit" class="btn btn-success pull-right"> Update </button>
            <?php
            }
            else
            {
            ?>
            <button type="submit" class="btn btn-info pull-right"> Submit </button>
            <?php 
            } 
            ?>
            <!--   <input type="submit" class="btn btn-info pull-right" onClick="document.pressed=this.value" value="submit" id="submit">
              <input type="submit" class="btn btn-success pull-right" onClick="document.pressed=this.value" value="update" id="update" style="display:none;"> -->
        </div>
        </form>
  </div>
      </section>
    </div>
   
  </div>
</div>
<script>
  function update_status(value,sno)
  {
      var v = confirm('Are you want to update Status');
      if(v == true)
      {
          $.ajax({
              url: "<?php echo site_url('Site/update_job_active');?>",
              data:  "sno="+sno+"&value="+value,
              type: 'post',
              success: function(result)
              {
                   // alert(result);
                  location.reload();
              }
              });
      }
      else
      {
          
      }
  }
</script>
