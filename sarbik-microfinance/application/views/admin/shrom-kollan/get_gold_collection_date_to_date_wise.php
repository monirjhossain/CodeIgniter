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

    <div>
    
    <!-- /.box-header -->
    <!-- form start -->

    

        <div class="box-body table-responsive">
        <table id="example1" class="display">
            <thead>
                <tr>
                    <th> সিরিয়াল </th>
				    <th> সদস্য নং  </th>
					<th> মোবাইল  </th>		
					<th> নাম </th>
					<th> একাউন্ট </th>
								
					<th>Cash In</th>
                </tr>
            </thead>
            <tbody>
			<?php
                $i = 0;
                foreach ($collectionData as $v_content) {
                    $i++;
                    ?>	
			
                    <tr class="odd gradeX">
                        <td><?php echo $i;?></td>
						
						<td>
						<div class="form-group">
            <label for=""><?php echo $v_content->member_no?></label>
        
	   </div>
						</td>
<td>
						<div class="form-group">
            <label for=""><?php echo $v_content->mobile?></label>
        
	   </div>
						</td>	
<td>
						<div class="form-group">
            <label for=""><?php echo $v_content->name?></label>
          
	   </div>
						</td>
						<td>
						
           
			<?php echo $v_content->account_no?></label>
         
		
						</td>						
						<td>
						
           <?php echo $v_content->collected_money?> 
       
						</td>					
                    </tr>
					   <?php } ?>
					
					
            </tbody>
            <tfoot>
                <tr>
				    <th colspan="5">Total Tk</th>
					<th><?php echo $total ; ?></th>
					
                </tr>
            </tfoot>
        </table>
		 
    </div>
		
        


</div>
</div>
<div class="clearfix"></div>
