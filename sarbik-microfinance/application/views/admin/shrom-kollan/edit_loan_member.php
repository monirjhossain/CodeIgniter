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

     <div id="tabs">
    <ul>
        <li><a href="#tabs-1">General Information</a></li>
        <li><a href="#tabs-2">Picture </a></li>
		<li><a href="#tabs-3">Bank Check Picture </a></li>
    </ul>

    <div id="tabs-1" style="border: 1px solid green">
    <form method="POST" action="<?php echo base_url() ?>super_admin/updateLonaMemberInfo" enctype="multipart/form-data">
    <div class="box-body">
        <div class="form-group">
            <label for="name">সদস্য নং </label>
			 <input type="hidden"  value="<?php echo $loan_member_info->loan_member_id ;?>"  name="loan_member_id" class="form-control">
            <input type="text" readonly value="<?php echo $loan_member_info->member_no ;?>"  name="member_no" class="form-control" id="name" >
        </div>
		<div class="form-group">
            <label for="user">মাঠ কর্মী</label>
            <select name="field_officer"  class="form-control">

				<?php
				if($listEmployee){
					foreach($listEmployee as $conent){?>

                <option <?php if($conent->emp_id==$loan_member_info->field_officer){echo 'selected';} ?> value="<?php echo  $conent->emp_id; ?>"> <?php echo  $conent->emp_name;?> </option>
				<?php } }?>
            </select>
        </div>
		<div class="form-group">
            <label for="name">নাম</label>
            <input type="text" value="<?php echo $loan_member_info->name ;?>"  name="name" class="form-control">
        </div>
		<div class="form-group">
            <label for="user">লিঙ্গ</label>
            <select name="gender"  class="form-control">
                <option <?php if($loan_member_info->gender==0){echo 'selected';} ?> value="0">Female</option>
                <option <?php if($loan_member_info->gender==1){echo 'selected';} ?> value="1">Male</option>
            </select>
        </div>
		<div class="form-group">
            <label for="name">পিতার  নাম</label>
            <input type="text" value="<?php echo $loan_member_info->father_name ;?>" name="father_name" class="form-control">
        </div>
		<div class="form-group">
            <label for="name"> মাতার নাম</label>
            <input type="text" value="<?php echo $loan_member_info->mother_name ;?>" name="mother_name" class="form-control">
        </div>
		<div class="form-group">
            <label for="name">স্বামীর নাম</label>
            <input type="text" value="<?php echo $loan_member_info->husband_name ;?>" name="husband_name" class="form-control">
        </div>
		<div class="form-group">
            <label for="name">পেশা</label>
            <input type="text" value="<?php echo $loan_member_info->pesha ;?>" name="pesha" class="form-control">
        </div>
		<div class="form-group">
            <label for="name">জাতীয় পরিচয় পত্র /  জন্ম নিবন্ধন নাম্বার </label>
            <input type="text" value="<?php echo $loan_member_info->nid_no ;?>" name="nid_no" class="form-control">
        </div>
		<div class="form-group">
            <label for="name">মোবাইল</label>
            <input type="text" value="<?php echo $loan_member_info->mobile_no ;?>" name="mobile_no" class="form-control">
        </div>
		<div class="form-group">
            <label for="name">বয়স</label>
            <input type="text" value="<?php echo $loan_member_info->age ;?>" name="age" class="form-control">
        </div>
		<div class="form-group">
            <label for="name"> গ্রাম (  বর্তমান )   </label>
            <input type="text" value="<?php echo $loan_member_info->pa_gram ;?>" name="pa_gram" class="form-control">
        </div>
		<div class="form-group">
            <label for="name">ডক (  বর্তমান ) </label>
            <input type="text" value="<?php echo $loan_member_info->pa_dak ;?>" name="pa_dak" class="form-control">
        </div>
		<div class="form-group">
            <label for="name">  উপজেলা (  বর্তমান ) </label>
            <input type="text" value="<?php echo $loan_member_info->pa_upojela ;?>" name="pa_upojela" class="form-control">
        </div>
		<div class="form-group">
            <label for="name"> জেলা (  বর্তমান ) </label>
            <input type="text" value="<?php echo $loan_member_info->pa_jela ;?>" name="pa_jela" class="form-control">
        </div>
		<div class="form-group">
            <label for="name"> গ্রাম (  স্থায়ী )  </label>
            <input type="text" value="<?php echo $loan_member_info->pra_gram ;?>" name="pra_gram" class="form-control">
        </div>
        <div class="form-group">
            <label for="name"> ডাক  (  স্থায়ী )   </label>
            <input type="text" value="<?php echo $loan_member_info->pra_dak ;?>" name="pra_dak" class="form-control">
        </div>
		<div class="form-group">
            <label for="name">  উপজেলা  (  স্থায়ী )  </label>
            <input type="text" value="<?php echo $loan_member_info->pra_upojela ;?>" name="pra_upojela" class="form-control">
        </div>
		<div class="form-group">
            <label for="name"> জেলা  (  স্থায়ী )  </label>
            <input type="text" value="<?php echo $loan_member_info->pra_jela ;?>" name="pra_jela" class="form-control">
        </div>


    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        <center><button type="submit" class="btn btn-primary">সংরক্ষন করুন</button></center>
    </div>
</form>
</div>
<div id="tabs-2" style="border: 1px solid green">
<form method="POST" action="<?php echo base_url() ?>super_admin/updateLoanMemberPicture" enctype="multipart/form-data">
      <div class="form-group">
            <label for="exampleInputFile">Picture</label>
            <img src="<?php echo base_url().$loan_member_info->picture_path ?>" class="user-image" alt="Milon Corporation">
            <input type="hidden" value="<?php echo $loan_member_info->loan_member_id?>" name="loan_member_id" class="form-control">
            <input type="file"  name="picture_path">
        </div>
         <div class="box-footer">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
    </form>
</div>
<div id="tabs-3" style="border: 1px solid green">
<form method="POST" action="<?php echo base_url() ?>super_admin/updateLoanMemberBankCheckPicture" enctype="multipart/form-data">
      <div class="form-group">
            <label for="exampleInputFile">Picture</label>
            <img src="<?php echo base_url().$loan_member_info->bank_check_img_path ?>" class="user-image" alt="Milon Corporation">
            <input type="hidden" value="<?php echo $loan_member_info->loan_member_id?>" name="loan_member_id" class="form-control">
            <input type="file"  name="bank_check_img_path">
        </div>
         <div class="box-footer">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
    </form>
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
                    <th>Member No</th>
                    <th>Picture</th>
					         <th>Bank Check Picture</th>

                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $i = 0;
				if($listLoanMember){
                foreach ($listLoanMember as $v_content) {
                    $i++;
                    ?>
                    <tr class="odd gradeX">

                        <td><?php echo $i; ?></td>
                        <td><?php echo $v_content->name; ?></td>
                        <td><?php echo $v_content->member_no; ?></td>


                        <td>

                            <img height="50px" width="50px" src="<?php echo base_url() . $v_content->picture_path ?>" class="img-circle" alt="User Image">
                        </td>
						<td>

                            <img height="50px" width="50px" src="<?php echo base_url() . $v_content->bank_check_img_path ?>" class="img-circle" alt="User Image">
                        </td>



                        <td>
                            <a href="<?php echo base_url() ?>super_admin/editLoanMember/<?php echo $v_content->loan_member_id; ?>" class="btn btn-default btn-sm btn-icon icon-left">
                                <i class="entypo-pencil"></i>
                                Edit
                            </a>
                <!--
                
							<a href="<?php echo base_url() ?>super_admin/deleteLoanMemberInfo/<?php echo $v_content->loan_member_id; ?>" class="btn btn-default btn-sm btn-icon icon-left">
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
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>
