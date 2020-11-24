<!-- general form elements -->
<div style="text-align: center;color: red"><?php echo validation_errors(); ?></div>
<div class="box box-primary">

    <button class="btn btn-info <?php if($sessionUserDetails->admin_type=='field_officer'){echo ' hide';}?>"  type="button" data-toggle="collapse" data-target="#demo">+ ADD</button>
    
	<div id="demo" class="collapse">
    
    <div class="box-header with-border">
        <h3 class="box-title">User Registration</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    
    <?php
    $attributes = array('enctype' => 'multipart/form-data');
    echo form_open_multipart('super_admin/addUser', $attributes);
    ?>
    <!--<form role="form">-->
    <div class="box-body">
        <div class="form-group">
            <label for="name">User Name</label>
            <input type="text" value="<?php echo set_value('admin_name'); ?>" name="admin_name" class="form-control" id="name" placeholder="Enter User Name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="text" name="admin_email_address" value="<?php echo set_value('admin_email_address'); ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter An Admin address">
        </div>

        <div class="form-group">
            <label for="user">User Type</label>
            <select name="admin_type" class="form-control">
                <option selected="selected" value="field_officer">Field Officer</option>
                <option value="super_admin">Super Admin</option>
                <option value="admin">Admin</option>

            </select>
        </div>



        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="text" name="admin_password"  class="form-control" id="exampleInputPassword1" placeholder="Contact Address">
        </div>
        <div class="form-group">
            <label for="contact_address">Contact Address</label>
            <input type="text" name="contact_address"  class="form-control" id="exampleInputPassword1" placeholder="Contact Address">
        </div>
        <div class="form-group">
            <label for="mobile">Mobile</label>
            <input type="text" name="mobile"  class="form-control" id="exampleInputPassword1" placeholder="Contact Number">
        </div>
        
        <div class="form-group">
            <label for="exampleInputFile">Picture</label>
            <input type="file" id="exampleInputFile" name="img_path">
        </div>

        <div class="form-group">
            <label for="details">Details</label><br>
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

                            <textarea id="editor2" name="user_details" rows="20" class="form-control">
                       
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
        <button type="submit" class="btn btn-primary">Save</button>
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
					<th>Admin Id</th>
                    <th>Admin Name</th>
                    <th>Admin Email</th>
                    <th>Admin Type</th>
					<th>Created By</th>
					<th>Created At</th>
					<th>Updaed By</th>
					<th>Updated At</th>
					<th>Picture</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $i = 0;
                foreach ($listUser as $v_content) {
                    $i++;
                    ?>	
                    <tr class="odd gradeX">

                        <td><?php echo $i; ?></td>
						<td><?php echo $v_content->admin_id; ?></td>
                        <td><?php echo $v_content->admin_name; ?></td>
                        <td><?php echo $v_content->admin_email_address; ?></td>
                        <td><?php echo $v_content->admin_type; ?></td>
						<td><?php echo $v_content->created_by; ?></td>
                        <td><?php echo $v_content->created_at; ?></td>
                        <td><?php echo $v_content->updated_by; ?></td>
                        <td><?php echo $v_content->updated_at; ?></td>
						<td><img src="<?php echo base_url().$v_content->img_path; ?>" height="100" widht="100"></td>

                        <td>
                            <a href="<?php echo base_url() ?>super_admin/editUser/<?php echo $v_content->admin_id; ?>" class="<?php if($sessionUserDetails->admin_type=='field_officer'){echo ' hide';}?>"">
                                <i class="entypo-pencil"></i>
                                Edit
                            </a>
                            <a href="<?php echo base_url() ?>super_admin/showUser/<?php echo $v_content->admin_id; ?>" class="btn btn-default btn-sm btn-icon icon-left">
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