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

	<div id="demo" class="">
    <!-- /.box-header -->
    <!-- form start -->


    <form method="POST" action="<?php echo base_url() ?>super_admin/updateEmployeInfo" enctype="multipart/form-data">
    <div class="box-body">
        <div class="form-group">
            <label for="name">নাম</label>
			<input type="hidden" value="<?php echo $selectEmployee->emp_id; ?>" name="emp_id" class="form-control" id="name" placeholder="Enter Name">
            <input type="text" value="<?php echo $selectEmployee->emp_name; ?>" name="emp_name" class="form-control" id="name" placeholder="Enter Name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">ইমেইল</label>
            <input type="text" name="emp_email" value="<?php echo $selectEmployee->emp_email; ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter An Email address">
        </div>

        <div class="form-group">
            <label for="user">পদবী</label>
            <select name="emp_type"  class="form-control">
                <option value="0">Select A Designation</option>
                <?php
                if($listDesignation){
                  foreach($listDesignation as $v_content){

                              ?>
                                <option <?php if($selectEmployee->emp_type==$v_content->designation_id){echo 'selected';}?> value="<?php echo $v_content->designation_id?>"><?php echo $v_content->designation?></option>
                <?php } }?>
            </select>
        </div>

        <div class="form-group">
            <label for="contact_address">ঠিকানা</label>
            <input type="text" name="emp_address" value="<?php echo $selectEmployee->emp_address; ?>" class="form-control"  placeholder="Contact Address">
        </div>
        <div class="form-group">
            <label for="mobile">মোবাইল</label>
            <input type="text" name="emp_mobile" value="<?php echo $selectEmployee->emp_mobile; ?>"  class="form-control"placeholder="Contact Number">
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

                            <textarea id="editor2" name="emp_details" rows="20" class="form-control">
                     <?php echo $selectEmployee->emp_details; ?>
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
        <center><button type="submit" class="btn btn-primary">আপডেট করুন</button></center>
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

                  <th>Serial</th>
                  <th>Emp_Id</th>
                  <th> Name</th>
                  <th> Email</th>
                  <th>Designation</th>
                  <th>Department</th>
                  <th>Picture</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>

              <?php
              $i = 0;
              foreach ($listEmployee as $v_content) {
                  $i++;
                  ?>
                  <tr class="odd gradeX">
                      <td><?php echo $i; ?></td>
                      <td><?php echo $v_content->emp_id; ?></td>
                      <td><?php echo $v_content->emp_name; ?></td>
                      <td><?php echo $v_content->emp_email; ?></td>
                      <td>
                        <?php echo $v_content->designation; ?>
                      </td>
                      <td>
                        <?php echo $v_content->shortName; ?>
                      </td>
                      <td>
                          <img height="50px" width="50px" src="<?php echo base_url() . $v_content->emp_picture_path ?>" class="img-circle" alt="User Image">
                      </td>
                      <td>
                          <a href="<?php echo base_url() ?>super_admin/editEmploye/<?php echo $v_content->emp_id; ?>" class="btn btn-default btn-sm btn-icon icon-left">
                              <i class="entypo-pencil"></i>
                              Edit
                          </a>
                          <a href="<?php echo base_url() ?>super_admin/showEmployee/<?php echo $v_content->emp_id; ?>" class="btn btn-default btn-sm btn-icon icon-left">
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
                  <th></th>
                  <th></th>
              </tr>
          </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
</div>
