<!-- general form elements -->

<div  class="box box-primary <?php if($sessionUserDetails->admin_type=='field_officer'){echo ' hide';}?>">
    <div style="text-align: center;color: red"><?php echo validation_errors(); ?></div>
    <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">+ ADD</button>
    <div id="demo" class="collapse">
    
    <div class="box-header with-border">
        <h3 class="box-title">Add Applicant</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    
    <?php
    $attributes = array('enctype' => 'multipart/form-data');
    echo form_open_multipart('super_admin/addDepositorMember', $attributes);
    ?>
    <!--<form role="form">-->
    <div class="box-body">
	    <div class="form-group">
            <label for="name">সদস্য নং</label>
            <input type="text" readonly value="<?php echo $finalMax?>" name="member_no" class="form-control">
        </div>
		<div class="form-group">
            <label for="name">জাতীয় পরিচয় নং  /  জন্ম সনদ   ( In English )  </label>
			
            <input type="text"  name="nid" class="form-control">
        </div>
		<div class="form-group">
            <label for="name">সদস্য / সদস্যার  নাম</label>
            <input type="text" value="<?php echo set_value('name'); ?>" name="name" class="form-control" id="name" placeholder="Enter Name">
        </div>
        <div class="form-group">
            <label for="user">লিঙ্গ</label>
            <select name="gender"  class="form-control">
                <option value="0">Female</option>
                <option value="1">Male</option>             
            </select>
        </div>
		<div class="form-group">
            <label for="user">মাঠ কর্মী</label>
            <select name="field_officer"  class="form-control">
                <option value="0">Select A Field Officer</option>
				<?php
				if($listEmployee){
					foreach($listEmployee as $conent){?>
				
                <option value="<?php echo  $conent->emp_id; ?>"> <?php echo  $conent->emp_name;?> </option>    
				<?php } }?>				
            </select>
        </div>
        <div class="form-group">
            <label for="name">আবেদন এর তারিখ</label>
            <input type="text" value="<?php echo set_value('date'); ?>" name="date" class="form-control datepicker">
        </div>
		
        <div class="form-group">
            <label for="exampleInputEmail1">পিতার নাম</label>
            <input type="text" name="father_name" value="<?php echo set_value('father_name'); ?>" class="form-control" placeholder="Father Name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">মাতার নাম</label>
            <input type="text" name="mother_name" value="<?php echo set_value('mother_name'); ?>" class="form-control" placeholder="Mother Name">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">স্বামীর নাম</label>
            <input type="text" name="husband_name" value="<?php echo set_value('husband_name'); ?>" class="form-control" placeholder="Husband Name">
        </div>

        

        <div class="form-group">
            <label >গ্রাম</label>
            <input type="text" name="village"  value="<?php echo set_value('village'); ?>" class="form-control" placeholder="Village">
        </div>
        <div class="form-group">
            <label for="contact_address">ইউনিয়ন</label>
            <input type="text" name="union_name"  class="form-control"  placeholder="Union">
        </div>
        <div class="form-group">
            <label for="contact_address">উপজেলা</label>
            <input type="text" name="upojela"  class="form-control"  placeholder="upojela">
        </div>
        <div class="form-group">
            <label for="contact_address">জেলা</label>
            <input type="text" name="district"  class="form-control"  placeholder="District">
        </div>
        <div class="form-group">
            <label for="mobile">মোবাইল</label>
            <input type="text" name="mobile"  class="form-control"placeholder="Contact Number">
        </div>
        <div class="form-group">
            <label for="mobile">সদস্য ফি</label>
            <input type="text" name="member_fee"  class="form-control"placeholder="Fee">
        </div>
        <div class="form-group">
            <label for="mobile">ইন্সটলমেন্ট সঙ্খা</label>
            <input type="number" name="total_installment"  class="form-control"value="365">
        </div>
        
        <div class="form-group">
            <label for="exampleInputFile">ছবি আপলোড করুন</label>
            <input type="file"  name="member_picture_path">
        </div>
		

        <div class="form-group">
            <label for="details">বিস্তারিত</label><br>
            <section class="content">
                <div class="row">
                    <div class="box box-info">
                        <div class="box-header">
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                                        title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                                        title="Remove">
                                    <i class="fa fa-times"></i></button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body pad">

                            <textarea id="editor2" name="details" rows="20" class="form-control">
                       
                            </textarea>

                        </div>
                    </div>
                </div>
                <!-- ./row -->
            </section>
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
        <h3 class="box-title">List User</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>

                    <th>সিরিয়াল</th>					
                    <th>নাম</th>
					<th>সদস্য নং</th>
					<th>মোবাইল নং</th>
                    <th>পিতা / মাতা</th>
                    <th>লিঙ্গ</th>
                    <th>ছবি</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $i = 0;
                foreach ($listDepositor as $v_content) {
                    $i++;
                    ?>	
                    <tr class="odd gradeX">

                        <td><?php echo $i; ?></td>						
                        <td><?php echo $v_content->name; ?></td>
						<td><?php echo $v_content->member_no; ?></td>
						<td><?php echo $v_content->mobile; ?></td>
                        <td>পিতাঃ <?php echo $v_content->father_name; ?>
						<br>মাতাঃ <?php echo $v_content->mother_name; ?></td>
                        <td>
                            <?php 
                            if($v_content->gender==0){
                               echo 'Female';
                              } ; 

                              if($v_content->gender==1){
                               echo 'Male';
                              } ; 
                              
                              ?>
                            
                        </td>
                        <td>
                            
                            <img height="50px" width="50px" src="<?php echo base_url() . $v_content->member_picture_path ?>" class="img-circle" alt="User Image">
                        </td>



                        <td>
                            <a href="<?php echo base_url() ?>super_admin/editDepositorInfo/<?php echo $v_content->depositor_id; ?>" class="<?php if($sessionUserDetails->admin_type=='field_officer'){echo ' hide';}?>">
                                <i class="entypo-pencil"></i>
                                Edit
                            </a>
                            <a href="<?php echo base_url() ?>super_admin/showDepositorInfo/<?php echo $v_content->depositor_id; ?>" class="btn btn-default btn-sm btn-icon icon-left">
                                <i class="entypo-pencil"></i>
                                Print
                            </a>
							<!--
							<a href="<?php echo base_url() ?>super_admin/deleteDepositorInfo/<?php echo $v_content->depositor_id; ?>" class="btn btn-default btn-sm btn-icon icon-left">
                                <i class="entypo-pencil"></i>
                                Delete
                            </a>
							-->
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
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>