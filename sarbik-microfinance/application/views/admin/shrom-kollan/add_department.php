<!-- general form elements -->

<div class="box box-primary">
    <div style="text-align: center;color: red"><?php echo validation_errors(); ?></div>
    <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">+ ADD</button>
    <div id="demo" class="collapse">

    <div class="box-header with-border">
        <h3 class="box-title">Add Department</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->

    <?php
    $attributes = array('enctype' => 'multipart/form-data');
    echo form_open_multipart('super_admin/addDepartment', $attributes);
    ?>
    <!--<form role="form">-->
    <div class="box-body">
        <div class="form-group">
            <label for="department">নাম</label>
            <input type="text" value="<?php echo set_value('department'); ?>" name="department" class="form-control" id="name" placeholder="Enter Department">
        </div>
    </div>
    <div class="box-body">
        <div class="form-group">
            <label for="shortName">Short নাম</label>
            <input type="text" value="<?php echo set_value('shortName'); ?>" name="shortName" class="form-control" id="name" placeholder="Enter Department shortName">
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
        <h3 class="box-title">List Department</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Department Id</th>
                    <th>Department Name</th>
                    <th>Department ShortName</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $i = 0;
                foreach ($listDepartment as $v_content) {
                    $i++;
                    ?>
                    <tr class="odd gradeX">

                        <td><?php echo $i; ?></td>
                        <td><?php echo $v_content->department_id; ?></td>
                        <td><?php echo $v_content->department; ?></td>
                        <td><?php echo $v_content->shortName; ?></td>
                        <td>
                            <a href="<?php echo base_url() ?>super_admin/editDepartment/<?php echo $v_content->department_id; ?>" class="btn btn-default btn-sm btn-icon icon-left">
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
