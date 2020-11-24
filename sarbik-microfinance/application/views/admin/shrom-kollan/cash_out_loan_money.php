<!-- general form elements -->
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
<div class="box box-primary">
    
   
	<div>
    
    
    <!-- /.box-header -->
    <!-- form start -->
    
   
     <form method="POST" action="<?php echo base_url() ?>super_admin/saveCashOutFromLoanAccount" enctype="multipart/form-data">
    <div class="box-body">
	   
	 <p style="color:red">আপনার বর্তমান ব্যালেঞ্চঃ <?php echo $presentBalance.' '.' টাকা';?></p> 		
        <div class="form-group">
		 <input type="text" readonly name="ac_id"  class="form-control" value="<?php echo $ac_info->loan_id?>">
            <label for="today"> তারিখ</label>
            <input type="text"  name="today" class="form-control datepicker">
        </div>
		
        <div class="form-group">
		
            <label for="collected_money"> টাকা ( In English )  </label>
			<input type="text" name="presentBalance" value="<?php echo $presentBalance ;?>"    class="form-control" >
            <input type="text" name="sc_cash_out"   class="form-control" placeholder="Cash Out Money">
        </div>


    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        <center><button type="submit"  class="btn btn-primary">Cash Out</button></center>
    </div>
</form>
</div>

</div>
<div class="clearfix"></div>


<div class="box">
    <div class="box-header" style="color:green">
	    <p> নাম  :<?php echo ' '. $ac_holder_info->name ?></p>
		<p> পিতা  :<?php echo ' '. $ac_holder_info->father_name ?></p>
		<p> গ্রাম  :<?php echo ' '. $ac_holder_info->pa_gram ?></p>
		<p>সদস্য নং :<?php echo $ac_holder_info->member_no ?></p>
		<p>একাউন্ট নং  :
		<?php 
		echo $ac_info->loan_account; 
		?></p>
		<p>লোন  এর পরিমান  :<?php echo $ac_info->approved_loan_amount.' '.'টাকা'; ?></p>
		<p>মুনাফার  ( %  ):
		<?php 
		$interest= $ac_info->interestPercent;
		echo $interest.'%';
		?>
		
		</p>
		<p>মুনাফার পরিমান  :
		
		<?php 
		$interest=($ac_info->approved_loan_amount*$ac_info->interestPercent)/100;
		echo $interest.' '.'টাকা';
		?>
		</p>
		<p style="color:red">মোট টাকার পরিমান  :
		
		<?php 
		$interest=($ac_info->approved_loan_amount*$ac_info->interestPercent)/100;
		$grandTotalAmount=$ac_info->approved_loan_amount+$interest;
		echo $grandTotalAmount.' '.'টাকা';
		?>
		</p>
		<p>লোন প্রদান  এর তারিখ  :
		            <?php 
						$ofrom = $ac_info->disburse_date;
						$ophpdate=$ofrom;
						$ofromdate = date("d-m-Y", strtotime($ophpdate)); 
						
						echo $ofromdate;
						
						?>
		 </p>
		 <p> আজকের তারিখঃ  <?php echo $today=date("d-m-Y") ;?> </p>
		
		
		
    </div>
  
  
  <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>

                    <th>Serial</th>
				    <th>Installment Date</th>
				    <th>Received Date</th>
					<th>Installment Amount</th>
					<th>Installment Fine</th>
					<th>Savings Money</th>
					<th>Profit</th>
					<th>Cash Out</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                
                <?php
                $i=0;
                if($loan_collect_info){
                    foreach($loan_collect_info as $loan){
                    $i++;
                    ?>
                    <tr class="odd gradeX">

                        <td><?php echo $i?></td>
						 
						
						<td>
						 <?php
						    $from = $loan->installment_date;
                    		$phpdate=$from;
                    		$fromdate = date("d-m-Y", strtotime($phpdate)); 
						    echo $fromdate;
						 ?>
						
						</td>
						<td>
						    <?php
						    $today = $loan->today;
                    		$phptoday=$today;
                    		$finaltoday = date("d-m-Y", strtotime($phptoday)); 
						    echo $finaltoday;
						 ?>
					
						
						</td>
						
						<td>
						  <?php echo $loan->installment_fee?>  
						 </td>
						 <td>
						  <?php echo $loan->per_installment_fine?>  
						 </td>
						<td><?php echo $loan->soncoy?>  </td>
						<td><?php echo $loan->sc_profit?> </td>						
						<td>
						    <?php echo $loan->sc_cash_out?>
						    </td> 						
                        <td>
						
                            <a href="#" class="btn btn-default btn-sm btn-icon icon-left">
                                <i class="entypo-pencil"></i>
									Edit
                            </a>
							
                        </td>
                    </tr>
			<?php } }?>		
					
               
            </tbody>
            <tfoot>
                <tr>
				    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                     <th>&nbsp;</th>
                    <th><p style="font-size:12px;color:green">Total :</p><?php echo $sumCollectLoanAmount?> </th>
                    
                    <th><p style="font-size:12px;color:red">Total :</p><?php echo $sumInstallmentFineAmount ; ?></th>
					<th><p style="font-size:12px;color:green">Total :</p><?php echo $sum_soncoy ; ?> </th>
                    <th>	<p style="font-size:12px;color:green">Total :</p> <?php echo $sum_soncoy_profit?></th>
					<th>&nbsp;</th>
				     <th>&nbsp;</th>
					
                </tr>
				
				<tr>
				    
                    <th colspan="3">Total Due Amount (Loan Amount + Interest + Fine)-(Total Collect  Loan Amount) </th>
                    
                    <th colspan="2">
                        <p style="font-size:20px;color:blue">
                            
                             <?php
                        $dueAmount = ($grandTotalAmount+$sumInstallmentFineAmount)-$sumCollectLoanAmount;
                        echo $dueAmount;
                        ?>
                        </p>
                       
                         </th>
					<th colspan="4">
		           
                            
                            <?php 
                            $soncoy=$sum_soncoy;
                            $profit= $sum_soncoy_profit;
                            $grand_soncoy =$soncoy+$profit;
                           echo $grand_soncoy;
                            
                            ?>
                        
                        
					</th>
                   
				
				     
					
                </tr>
				<tr>
				    <th colspan="3">Total Savings Balance: </th>
                    
                    
                    <th colspan="2">
                        
                        
                        <?php
                       
                            if($dueAmount==0){
                              echo $grand_soncoy-$total_uttolon_money;   
                            }else{
                            echo $soncoy;
                            }
                        ?>
                        
                        
                        </th>
					<th colspan="3" class="alert alert-danger">
				 যদি লোন এর	 টাকা  পরিশোধ হয় তাহলে  সঞ্চয় এর লভ্যাংশ পাবে ।
					</th>
                   <th>
					<?php
				   if($dueAmount==0){
				   ?>
					<a href="<?php echo base_url()?>super_admin/cashOutFromLoanAccount/<?php echo $ac_info->loan_id?>" class="btn btn-default btn-sm btn-icon icon-left">
                                <i class="entypo-pencil"></i>
								Cash Out	
                            </a>
				   <?php }?>
					</th>
					
				     
					
                </tr>
				
            </tfoot>
        </table>
    </div>
</div>