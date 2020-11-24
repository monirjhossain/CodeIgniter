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
    
    <div class="box-header with-border">
        <h3 class="box-title">Edit Applicant</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    
 <div id="tabs">
    <ul>
        <li><a href="#tabs-1">General Information</a></li>
        <li><a href="#tabs-2">Picture</a></li>
    </ul>

    <div id="tabs-1" style="border: 1px solid green">   
<form method="POST" action="<?php echo base_url() ?>super_admin/updateDepositorInfo" enctype="multipart/form-data">
    <div class="box-body">
	    <div class="form-group">
            <label for="name">সদস্য নং</label>
			<input type="hidden"  value="<?php echo $depositor_info->depositor_id?>" name="depositor_id" class="form-control">
            <input type="text" readonly value="<?php echo $depositor_info->member_no?>" name="member_no" class="form-control">
        </div>
		<div class="form-group">
            <label for="name">জাতীয় পরিচয় নং  /  জন্ম সনদ</label>
			
            <input type="text" value="<?php echo $depositor_info->nid?>" name="nid" class="form-control">
        </div>
		<div class="form-group">
            <label for="user">মাঠ কর্মী</label>
            <select name="field_officer"  class="form-control">
                
				<?php
				if($listEmployee){
					foreach($listEmployee as $conent){?>
				
                <option <?php if($conent->emp_id==$depositor_info->field_officer){echo 'selected';}?> value="<?php echo  $conent->emp_id; ?>"> <?php echo  $conent->emp_name;?> </option>    
				<?php } }?>				
            </select>
        </div>
        <div class="form-group">
            <label for="name">আবেদন এর তারিখ</label>
            <input type="text" value="<?php echo $depositor_info->date?>" name="date" class="form-control datepicker">
        </div>
		

        <div class="form-group">
            <label for="name">সদস্য / সদস্যার  নাম</label>
            <input type="text" value="<?php echo $depositor_info->name?>" name="name" class="form-control" id="name" placeholder="Enter Name">
        </div>
        <div class="form-group">
            <label for="user">লিঙ্গ</label>
            <select name="gender"  class="form-control">
                <option value="1">Male</option>  
                <option value="0">Female</option>
                           
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">পিতার নাম</label>
            <input type="text" name="father_name" value="<?php echo $depositor_info->father_name?>" class="form-control" placeholder="Father Name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">মাতার নাম</label>
            <input type="text" name="mother_name" value="<?php echo $depositor_info->mother_name?>" class="form-control" placeholder="Mother Name">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">স্বামীর নাম</label>
            <input type="text" name="husband_name" value="<?php echo $depositor_info->husband_name?>" class="form-control" placeholder="Husband Name">
        </div>

        

        <div class="form-group">
            <label >গ্রাম</label>
            <input type="text" name="village"  value="<?php echo $depositor_info->village?>" class="form-control" placeholder="Village">
        </div>
        <div class="form-group">
            <label for="contact_address">ইউনিয়ন</label>
            <input type="text" name="union_name" value="<?php echo $depositor_info->union_name?>"  class="form-control"  placeholder="Union">
        </div>
        <div class="form-group">
            <label for="contact_address">উপজেলা</label>
            <input type="text" name="upojela"  value="<?php echo $depositor_info->upojela ?>" class="form-control"  placeholder="upojela">
        </div>
        <div class="form-group">
            <label for="contact_address">জেলা</label>
            <input type="text" name="district" value="<?php echo $depositor_info->district ?>"  class="form-control"  placeholder="District">
        </div>
        <div class="form-group">
            <label for="mobile">মোবাইল</label>
            <input type="text" name="mobile" value="<?php echo $depositor_info->mobile ?>"  class="form-control"placeholder="Contact Number">
        </div>
        <div class="form-group">
            <label for="mobile">সদস্য ফি</label>
            <input type="text" name="member_fee"value="<?php echo $depositor_info->member_fee ?>"  class="form-control"placeholder="Fee">
        </div>
        <div class="form-group">
            <label for="mobile">ইন্সটলমেন্ট সঙ্খা</label>
            <input type="number" name="total_installment"  class="form-control" value="<?php echo $depositor_info->total_installment?>">
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
                       <?php echo $depositor_info->details?>
                            </textarea>

                        </div>
                    </div>
                    <!-- /.box -->

                    <!-- /.col-->
                </div>
                <!-- ./row -->
            </section>
        </div>


    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        <center><button type="submit" class="btn btn-primary">Update</button></center>
    </div>
</form>
</div>

<div id="tabs-2" style="border: 1px solid green">
<form method="POST" action="<?php echo base_url() ?>super_admin/updateMemberPicture" enctype="multipart/form-data">
      <div class="form-group">
            <label for="exampleInputFile">Picture</label>
            <img src="<?php echo base_url().$depositor_info->member_picture_path ?>" class="user-image" alt="Milon Corporation">
            <input type="hidden" value="<?php echo $depositor_info->depositor_id?>" name="depositor_id" class="form-control">
            <input type="file"  name="member_picture_path">
        </div>
         <div class="box-footer">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
    </form>

</div>


</div>

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

                    <th>Serial</th>
                    <th>Name</th>
                    <th>Father Name</th>
                    <th>Gender</th>
                    <th>Picture</th>
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
                        <td><?php echo $v_content->father_name; ?></td>
                        <td>
                            <?php 
                            if($v_content->gender==0){
                               echo 'FMale';
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
                            <a href="<?php echo base_url() ?>super_admin/editDepositorInfo/<?php echo $v_content->depositor_id; ?>" class="btn btn-default btn-sm btn-icon icon-left">
                                <i class="entypo-pencil"></i>
                                Edit
                            </a>
                            <a href="<?php echo base_url() ?>super_admin/showDepositorInfo/<?php echo $v_content->depositor_id; ?>" class="btn btn-default btn-sm btn-icon icon-left">
                                <i class="entypo-pencil"></i>
                                Show
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
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>