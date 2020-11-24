<!-- general form elements -->

<div class="box box-primary">

    <div style="text-align: center;color: red">
	
<?php
    $message = $this->session->userdata('message');
    if ($message) {
        ?> 
        <div class="alert alert-success">
            <?php echo $message; ?>
        </div>

        <?php
        $this->session->unset_userdata('message');
    }
    ?>
	
	</div>

    
   
    <!-- /.box-header -->
    <!-- form start -->
    
   
   <form method="POST" action="<?php echo base_url() ?>super_admin/updateGovtHolyDayCalender" enctype="multipart/form-data">
    <div class="box-body">
	   
		
		<?php $year = date("Y");?>
	    <div class="form-group">
            <label for="year"> বৎসরঃ </label>
			<input type="hidden" name="date_id" value="<?php echo $holy_day_info->date_id?>" class="form-control">
            <input type="text" name="year" value="<?php echo $holy_day_info->year?>" class="form-control">
        </div>
		
		<div class="form-group">
           <label for="date"> তারিখ</label>
			<input type="text" name="date" value="<?php echo $holy_day_info->date?>" class="form-control datepicker">
            
        </div>
			    		
        <div class="form-group">
            <label for="cause"> কারন </label>
            <input type="text" name="cause" value="<?php echo $holy_day_info->cause?>" class="form-control">
        </div>
        
       


    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        <center><button type="submit" class="btn btn-primary">Save</button></center>
    </div>
</form>

</div>
<div class="clearfix"></div>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">List Of Holiday</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>

                    <th>Serial</th>
					<th>Id</th>
					<th>Year</th>
					<th>Date</th>
				    <th>Cause</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $i = 0;
                foreach ($listHolyDay as $v_content) {
                    $i++;
                    ?>	
                    <tr class="odd gradeX">

                        <td><?php echo $i; ?></td>
					   <td><?php echo $v_content->date_id; ?></td>
						<td><?php echo $v_content->year; ?></td>
						
						<td>
						<?php 
						$from = $v_content->date ;
						$phpdate=$from;
						$fromdate = date("d-m-Y", strtotime($phpdate)); 
						
						echo $fromdate;
						
						?>
						
						</td>
						<td><?php echo $v_content->cause; ?></td>
											
                        <td>
						
                            <a href="<?php echo base_url() ?>super_admin/editHolyDay/<?php echo $v_content->date_id; ?>" class="btn btn-default btn-sm btn-icon icon-left">
                                <i class="entypo-pencil"></i>
									Edit
                            </a>
							
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>

                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>