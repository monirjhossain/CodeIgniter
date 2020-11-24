<!-- general form elements -->

<div class="box box-primary">
    <div style="text-align: center;color: red"><?php echo validation_errors(); ?></div>
    <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">+ ADD</button>
    <div id="demo" class="collapse">

    <div class="box-header with-border">
        <h3 class="box-title">Add Designation</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->

    <?php
    $attributes = array('enctype' => 'multipart/form-data');
    echo form_open_multipart('super_admin/addDesignation', $attributes);
    ?>
    <!--<form role="form">-->

    <div class="box-body">
      <div class="form-group">
              <label for="department_id">Select A Department</label>
              <select name="department_id" class="form-control ">
  			<?php
  			if($listDepartment){
  				foreach($listDepartment as $v_content){
  			?>
                  <option value="<?php echo $v_content->department_id;?>"><?php echo $v_content->shortName;?></option>
  			<?php } }?>

              </select>
          </div>
        <div class="form-group">
            <label for="designation">নাম</label>
            <input type="text" value="<?php echo set_value('designation'); ?>" name="designation" class="form-control" id="name" placeholder="Enter Designation">
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
        <h3 class="box-title">List Designation</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Designation Id</th>
                    <th>Designation Name</th>
                    <th>Department Short Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $i = 0;
                foreach ($listDesignation as $v_content) {
                    $i++;
                    ?>
                    <tr class="odd gradeX">

                        <td><?php echo $i; ?></td>
                        <td><?php echo $v_content->designation_id; ?></td>
                        <td><?php echo $v_content->designation; ?></td>
                        <td><?php echo $v_content->shortName; ?></td>
                        <td>
                            <a href="<?php echo base_url() ?>super_admin/editDesignation/<?php echo $v_content->designation_id; ?>" class="btn btn-default btn-sm btn-icon icon-left">
                                <i class="entypo-pencil"></i>
                                Edit
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

                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>
