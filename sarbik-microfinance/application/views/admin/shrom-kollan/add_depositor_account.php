
<?php 


	$servername = "localhost";
	$username = "root";
	$password = '';
	$dbname = "raudex_sarbik";
	$conn = new mysqli($servername, $username, $password, $dbname);
	
function getCollectedMoney($acc_id){
	$sql = "SELECT sum(collected_money) as total FROM sk_depositor_collection_by_account_open where accountId=$acc_id";

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "raudex_sarbik";
	$conn = new mysqli($servername, $username, $password, $dbname);
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	return $row['total'];
	

}
function getUttolonMoney($acc_id){
	$sql = "SELECT sum(uttolon_money) as total FROM sk_depositor_collection_by_account_open where accountId=$acc_id";

    $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "raudex_sarbik";
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	return $row['total'];
	

}



?>
<!-- general form elements -->

<div class="box box-primary <?php if($sessionUserDetails->admin_type=='field_officer'){echo ' hide';}?>">
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
    <div style="text-align: center;color: red"><?php echo validation_errors(); ?></div>
    <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">+ ADD</button>
    <div id="demo" class="collapse">
    
    <div class="box-header with-border">
        <h3 class="box-title">একটি একাউন্ট খুলুন</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    
    <?php
    $attributes = array('enctype' => 'multipart/form-data');
    echo form_open_multipart('super_admin/accountOpenForDepositorMember', $attributes);
    ?>
    <!--<form role="form">-->
    <div class="box-body">
	   <div class="form-group">
            <label for="account_no">একাউন্ট নং</label>
            <input type="text" readonly value="<?php echo $finalMax?>" name="account_no" class="form-control">
        </div>
	    <div class="form-group">
            <label for="memberId">সদস্য  সিলেকশন  করুন  ( নাম -সদস্য নং )</label><br>
			
            <select name="memberId"  class="form-control select2" style="width:100%">
			<option value="0"> &nbsp;</option>
               
<?php
if($listDepositor){
	foreach($listDepositor as $content){

?>
                <option  value="<?php echo $content->member_no;?>"><?php echo $content->name.'-'.$content->member_no; ?></option>    
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
            <input type="text"  name="opening_date" class="form-control datepicker">
        </div>
		
        <div class="form-group">
            <label for="">এই বইতে কত টাকা করে জমা করবেন  ( In English )  </label>
            <input type="text" name="opening_money"  class="form-control" placeholder="Opening Money">
        </div>
		
		 <div class="form-group">
            <label for=""> মুনাফা  প্রতি বছর  (  % )  </label>
            <input type="text" name="interestPercent" value="5"  class="form-control" placeholder="Opening Money">
        </div>
		
		<div class="form-group">
            <label for="ac_status"> ধরন </label>
           <select name="ac_status"  class="form-control">
                <option value="running"> Running </option> 		
            </select>
        </div>
        


    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        <center><button type="submit" class="btn btn-primary">Save</button></center>
    </div>
</form>
</div>
</div>
<div class="clearfix"></div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title"> গোল্ড  একাউন্ট  এর  তালিকা </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>

                    <th> সিইয়াল </th>
					<th>Action</th>
					<th> নাম </th>
					<th> মোবাইল </th>
					<th> সদস্য  নং  </th>
					<th> একাউন্ট নং </th>
					<th> স্টাটাস </th>                  
					<th> একাউন্ট আইডি </th>
					<th> ওপেনিং এর তারিখ </th>
					<th> শতকরা মুনাফা (%)</th>
					<th> কত টাকা করে জমা দিবেন </th>
					<th>মোট কালেকশন</th>
					<th>মোট উত্তোলোন</th>					
					<th>মোট মুনাফা জমা আছে</th>
					<th>মুনাফা প্রদান করা হয়েছে</th>				
                    <th>ছবি</th>
					
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
							<a style="background-color:green;color:white" href="<?php echo base_url() ?>super_admin/editDepositorAccountInfo/<?php echo $v_content->account_id; ?>" class="btn btn-default btn-sm btn-icon icon-left <?php if($sessionUserDetails->admin_type=='field_officer'){echo ' hide';}?>">
                               
									Edit
                            </a>
							
                        </td>
						<td>
						<?php echo $v_content->name; ?></p>
						
						</td>
						<td>
						
						 <?php echo $v_content->mobile; ?>
						</td>
						<td><?php echo $v_content->member_no; ?></td>
						<td><?php echo $v_content->account_no; ?></td>
						<td><?php echo $v_content->ac_status; ?></td>
						<td><?php echo $v_content->account_id; ?></td>
						
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
                        
						
						<td>
						   <?php
							$getCollectedMoneyAll=getCollectedMoney($v_content->account_id);
							echo $getCollectedMoneyAll; 
						?>  
						    
						</td>
						<td>
						    <?php
							$getUttolonMoneyAll=getUttolonMoney($v_content->account_id);
							echo $getUttolonMoneyAll; 
						?> 
						    
						</td>
                       
						<td>
						<?php
						if($getCollectedMoneyAll>$getUttolonMoneyAll){
								echo (($getCollectedMoneyAll-$getUttolonMoneyAll)*$v_content->interestPercent)/100 ;
						}
						?>
						</td>
						<td>
						<?php
						if($getCollectedMoneyAll<$getUttolonMoneyAll){
						    $profit=$getUttolonMoneyAll-$getCollectedMoneyAll ;
								echo $profit;
							
								
						}
						?>
						</td>
						
                        
                        <td>
                            
                            <img height="50px" width="50px" src="<?php echo base_url() . $v_content->member_picture_path ?>" class="img-circle" alt="User Image">
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
                    <th></th>
					<th></th>
                    <th></th>
                    <th></th>
                    <th></th>
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