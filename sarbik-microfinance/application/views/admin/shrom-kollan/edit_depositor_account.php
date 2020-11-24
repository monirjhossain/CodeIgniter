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
   
    
    <div >
    
    
    <!-- /.box-header -->
    <!-- form start -->
    
   
    <form method="POST" action="<?php echo base_url() ?>super_admin/updateGoldAcInfo" enctype="multipart/form-data">
    <div class="box-body">
	   <div class="form-group">
            <label for="account_no">একাউন্ট নং</label>
			<input type="hidden" readonly value="<?php echo $ac_info->account_id?>" name="account_id" class="form-control">
            <input type="text" readonly value="<?php echo $ac_info->account_no?>" name="account_no" class="form-control">
        </div>
	    <div class="form-group">
            <label for="memberId">সদস্য  সিলেকশন  করুন  ( নাম -সদস্য নং )</label><br>
			
            <select name="memberId"  class="form-control select2" style="width:100%">
			<option value="0"> &nbsp;</option>
               
<?php
if($listDepositor){
	foreach($listDepositor as $content){

?>
                <option <?php if($ac_info->memberId==$content->member_no){echo 'selected';}?> value="<?php echo $content->member_no;?>"><?php echo $content->name.'-'.$content->member_no; ?></option>    
<?php } }?>				
            </select>
        </div>
		
		<div class="form-group">
            <label for="deposit_type"> ধরন </label>
           <select name="deposit_type"  class="form-control">
                <option value="1"> Daily </option> 
                <option value="7"> 7 Days After </option> 
				<option value="15"> 15 Days After </option>
				<option value="30"> 1 Month After (30 days) </option>
				<option value="90"> 3 Month After (90 days) </option>
                <option value="180"> 6 Month After (180 Days After) </option>	
				<option value="365"> 1 years After (365 Days After) </option>				
            </select>
        </div>
        <div class="form-group">
            <label for="opening_date">ওপেনিং  এর তারিখ</label>
            <input type="text"  name="opening_date" value="<?php echo $ac_info->opening_date?>" class="form-control datepicker">
        </div>
		
        <div class="form-group">
            <label for="">এই বইতে কত টাকা করে জমা করবেন  ( In English )  </label>
            <input type="text" name="opening_money" value="<?php echo $ac_info->opening_money?>"  class="form-control" placeholder="Opening Money">
        </div>
		
		 <div class="form-group">
            <label for=""> মুনাফা  প্রতি বছর  (  % )  </label>
            <input type="text" name="interestPercent" value="<?php echo $ac_info->interestPercent?>"   class="form-control" placeholder="Opening Money">
        </div>
		
		<div class="form-group">
            <label for="ac_status"> ধরন </label>
           <select name="ac_status"  class="form-control">
		   <option <?php if($ac_info->ac_status=='closed'){ echo 'selected';}?> value="closed"> Closed </option> 
                <option <?php if($ac_info->ac_status=='running'){ echo 'selected';}?> value="running"> Running </option> 
                				
            </select>
        </div>
        


    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        <center><button type="submit" class="btn btn-primary">Update</button></center>
    </div>
</form>
</div>
</div>
<div class="clearfix"></div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">List User</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>

                    <th>Sl</th>
					<th>Action</th>
					<th>AC No</th>
					<th>Opening Date</th>
					<th>InterestPercent (%)</th>
					<th>Opening Money</th>
                    <th>Name</th>
					<th>Member No</th>
					<th>Total Cash In</th>
					<th>Total Cash Out</th>
					<th>Present Balance</th>
					<th>Interest</th>
					<th>Total Balance (Present Balance+Interest)</th>
                    <th>Picture</th>
					<th>Account Status</th>
                   
					<th>AC Id</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $i = 0;
                foreach ($list_account as $v_content) {
                    $i++;
                    ?>	
                    <tr class="odd gradeX">

                        <td><?php echo $i; ?></td>
						<td>
						
						<?php
						if($v_content->ac_status=='running'){
						?>
                            <a style="background-color:green;color:white" href="<?php echo base_url() ?>super_admin/addGoldCollectionByAccountById/<?php echo $v_content->account_id; ?>" class="btn btn-default btn-sm btn-icon icon-left">
                               
									কালেকশন /  উত্তোলোন করুন
                            </a>
							
						<?php }?>
						    
                            <a style="background-color:green;color:white" href="<?php echo base_url() ?>super_admin/collectionSummaryByAccountId/<?php echo $v_content->account_id; ?>" class="btn btn-default btn-sm btn-icon icon-left">
                                
									বিস্তারিত দেখুন
                            </a>
							<a style="background-color:green;color:white" href="<?php echo base_url() ?>super_admin/editDepositorAccountInfo/<?php echo $v_content->account_id; ?>" class="btn btn-default btn-sm btn-icon icon-left">
                               
									Edit
                            </a>
							
                        </td>
						<td><?php echo $v_content->account_no; ?></td>
						
						<td>
						<?php 
						
						$from = $v_content->opening_date ;
						$phpdate=$from;
						$fromdate = date("d-m-Y", strtotime($phpdate)); 
						
						echo $fromdate;
						
						?>
						</td>
						<td><?php echo $v_content->interestPercent; ?></td>
						
						<td><?php echo $v_content->opening_money; ?></td>
                        <td><?php echo $v_content->name; ?></td>
						<td><?php echo $v_content->member_no; ?></td>
						
						<td>&nbsp;</td>
						<td>&nbsp;</td>
                        <td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
                        
                        <td>
                            
                            <img height="50px" width="50px" src="<?php echo base_url() . $v_content->member_picture_path ?>" class="img-circle" alt="User Image">
                        </td>
						<td><?php echo $v_content->ac_status; ?></td>
						<td><?php echo $v_content->account_id; ?></td>
                        
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
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>