<!-- general form elements -->
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
<div class="box box-primary <?php if($sessionUserDetails->admin_type=='field_officer'){echo ' hide';}?>">


    <div>

    <!-- /.box-header -->
    <!-- form start -->

    <form method="POST" action="<?php echo base_url() ?>super_admin/updateCustomerInfo" enctype="multipart/form-data">
    <!--<form role="form">-->
    <div class="box-body">
        <div class="form-group">
          <input type="hidden" value="<?php echo $customer_info->customer_id ;?>"  name="customer_id" >
            <label for="name">সদস্য নং </label>
            <input type="text" readonly value="<?php echo $customer_info->member_no ;?>"  name="member_no" class="form-control" id="name" >
        </div>
		<div class="form-group">
            <label for="name">জাতীয় পরিচয় পত্র /  জন্ম নিবন্ধন নাম্বার </label>
            <input type="text" value="<?php echo $customer_info->nid_no;?>" name="nid_no" class="form-control" autocomplete="off">
        </div>
		<div class="form-group">
            <label for="name">নাম	</label>
            <input type="text" autocomplete="off" value="<?php echo $customer_info->name;?>" name="name" class="form-control">
        </div>
		<div class="form-group">
            <label for="user">লিঙ্গ</label>
            <select name="gender"  class="form-control">
                <option <?php if($customer_info->gender==0){echo 'selected';}?>  value="0">Female</option>
                <option <?php if($customer_info->gender==1){echo 'selected';}?> value="1">Male</option>
            </select>
        </div>


		<div class="form-group">
            <label for="name">পিতার  নাম</label>
            <input type="text" autocomplete="off" name="father_name" value="<?php echo $customer_info->father_name;?>" class="form-control">
        </div>
		<div class="form-group">
            <label for="name"> মাতার নাম</label>
            <input type="text" autocomplete="off" name="mother_name" value="<?php echo $customer_info->mother_name;?>" class="form-control">
        </div>
		<div class="form-group">
            <label for="name">স্বামীর নাম</label>
            <input type="text" autocomplete="off" name="husband_name" value="<?php echo $customer_info->husband_name;?>" class="form-control">
        </div>
		<div class="form-group">
            <label for="name">পেশা</label>
            <input type="text" autocomplete="off" name="pesha" value="<?php echo $customer_info->pesha;?>" class="form-control">
        </div>

		<div class="form-group">
            <label for="name">মোবাইল</label>
            <input type="text" autocomplete="off" name="mobile_no" value="<?php echo $customer_info->mobile_no;?>" class="form-control">
        </div>
		<div class="form-group">
            <label for="name">বয়স</label>
            <input type="text" autocomplete="off" name="age" value="<?php echo $customer_info->age;?>" class="form-control">
        </div>
		<div class="form-group">
            <label for="name"> গ্রাম (  বর্তমান )   </label>
            <input type="text"  name="pa_gram" value="<?php echo $customer_info->pa_gram;?>" class="form-control">
        </div>
		<div class="form-group">
            <label for="name">ডাক (  বর্তমান ) </label>
            <input type="text" name="pa_dak" value="<?php echo $customer_info->pa_dak;?>" class="form-control">
        </div>
		<div class="form-group">
            <label for="name">  উপজেলা (  বর্তমান ) </label>
            <input type="text" name="pa_upojela" value="<?php echo $customer_info->pa_upojela;?>" class="form-control">
        </div>
		<div class="form-group">
            <label for="name"> জেলা (  বর্তমান ) </label>
            <input type="text" name="pa_jela" value="<?php echo $customer_info->pa_jela;?>" class="form-control">
        </div>
		<div class="form-group">
            <label for="name"> গ্রাম (  স্থায়ী )  </label>
            <input type="text" name="pra_gram" value="<?php echo $customer_info->pra_gram;?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="name"> ডাক  (  স্থায়ী )    </label>
            <input type="text" name="pra_dak" value="<?php echo $customer_info->pra_dak;?>" class="form-control">
        </div>
		<div class="form-group">
            <label for="name">  উপজেলা  (  স্থায়ী )  </label>
            <input type="text" name="pra_upojela" value="<?php echo $customer_info->pra_upojela;?>" class="form-control">
        </div>
		<div class="form-group">
            <label for="name"> জেলা  (  স্থায়ী )  </label>
            <input type="text" name="pra_jela" value="<?php echo $customer_info->pra_jela;?>" class="form-control">
      </div>


    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        <center><button type="submit" class="btn btn-primary">সংরক্ষন করুন</button></center>
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

                    <th>SL</th>
                    <th>Member No</th>
                    <th>Name</th>
                    <th>Father</th>
                    <th>Mother</th>
                    <th>Nid</th>
                    <th>Mobile</th>
                    <th>Picture</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $i = 0;
				if($listCustomer){
                foreach ($listCustomer as $v_content) {
                    $i++;
                    ?>
                    <tr class="odd gradeX">

                        <td><?php echo $i; ?></td>
                        <td><?php echo $v_content->member_no; ?></td>
                        <td><?php echo $v_content->name; ?></td>
                        <td><?php echo $v_content->father_name; ?></td>
                        <td><?php echo $v_content->mother_name; ?></td>
                        <td><?php echo $v_content->nid_no; ?></td>
                        <td><?php echo $v_content->mobile_no; ?></td>
                        <td>
                            <img height="50px" width="50px" src="<?php echo base_url() . $v_content->picture_path ?>" class="img-circle" alt="User Image">
                        </td>




                        <td>
                            <a href="<?php echo base_url() ?>super_admin/editBatteryCustomer/<?php echo $v_content->customer_id; ?>" class="btn btn-default btn-sm btn-icon icon-left <?php if($sessionUserDetails->admin_type=='field_officer'){echo ' hide';}?>">
                                <i class="entypo-pencil"></i>
                                Edit
                            </a>

							<!--
							<a href="<?php echo base_url() ?>super_admin/deleteLoanMemberInfo/<?php echo $v_content->customer_id; ?>" class="btn btn-default btn-sm btn-icon icon-left">
                                <i class="entypo-pencil"></i>
                                Delete
                            </a>
							-->
                        </td>
                    </tr>
                <?php } } ?>
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
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>
