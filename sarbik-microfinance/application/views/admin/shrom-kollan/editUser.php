<!-- general form elements -->

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">User Update</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
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
    
    <div id="tabs">
    <ul>
        <li><a href="#tabs-1">General Information</a></li>
        <li><a href="#tabs-2">Picture</a></li>
    </ul>

    <div id="tabs-1" style="border: 1px solid green">
<form method="POST" action="<?php echo base_url() ?>super_admin/updateUser" enctype="multipart/form-data">
    
        <!--<form role="form">-->
    <div class="box-body">
        <div class="form-group">
            <label for="name">User Name</label>
            <input type="hidden" value="<?php echo $selectUser->admin_id?>" name="admin_id" class="form-control" id="name">
            <input type="text" value="<?php echo $selectUser->admin_name?>" name="admin_name" class="form-control" id="name" placeholder="Enter User Name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="text" value="<?php echo $selectUser->admin_email_address?>" name="admin_email_address" value="" class="form-control" id="exampleInputEmail1" placeholder="Enter An Admin address">
        </div>

        <div class="form-group">
            <label for="user">User Type</label>
            <select name="admin_type" class="form-control">
                
                <option <?php if ($selectUser->admin_type=='field_officer'){echo 'selected="selected';}?>  value="field_officer">Field Officer</option>
                <option <?php if ($selectUser->admin_type=='super_admin'){echo 'selected="selected';}?> value="super_admin">Super Admin</option>
                <option <?php if ($selectUser->admin_type=='admin'){echo 'selected="selected';}?> value="admin">Admin</option>

            </select>
        </div>



        
        <div class="form-group">
            <label for="contact_address">Contact Address</label>
            <input type="text" value="<?php echo $selectUser->contact_address?>" name="contact_address"  class="form-control" id="exampleInputPassword1" placeholder="Contact Address">
        </div>
        <div class="form-group">
            <label for="mobile">Mobile</label>
            <input type="text"  value="<?php echo $selectUser->mobile?>" name="mobile"  class="form-control" id="exampleInputPassword1" placeholder="Contact Number">
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
                      <?php echo $selectUser->user_details?>
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
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>

    </div>
    <div id="tabs-2" style="border: 1px solid green">
<form method="POST" action="<?php echo base_url() ?>super_admin/updateUserPicture" enctype="multipart/form-data">

      <div class="form-group">
            <label for="exampleInputFile">Picture</label>
            <input type="hidden" value="<?php echo $selectUser->admin_id?>" name="admin_id" class="form-control" id="name">
            <input type="file"  name="img_path">
        </div>
         <div class="box-footer">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
    </form>
<img src="<?php echo base_url().$selectUser->img_path?>">
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
                    <th>Admin Name</th>
                    <th>Admin Email</th>
                    <th>Admin Type</th>

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
                        <td><?php echo $v_content->admin_name; ?></td>
                        <td><?php echo $v_content->admin_email_address; ?></td>
                        <td><?php echo $v_content->admin_type; ?></td>



                        <td>
                            <a href="<?php echo base_url() ?>super_admin/editUser/<?php echo $v_content->admin_id; ?>" class="btn btn-default btn-sm btn-icon icon-left">
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