<!-- general form elements -->

<div class="box box-primary">
    <div style="text-align: center;color: red"><?php echo validation_errors(); ?></div>
    <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">+ ADD</button>
    <div id="demo" class="collapse">

    <div class="box-header with-border">
        <h3 class="box-title">Add Project</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->

    <?php
    $attributes = array('enctype' => 'multipart/form-data');
    echo form_open_multipart('super_admin/addProject', $attributes);
    ?>
    <!--<form role="form">-->

    <div class="box-body">
      
        <div class="form-group">
            <label for="project_name">নাম</label>
            <input type="text" value="<?php echo set_value('project_name'); ?>" name="project_name" class="form-control" id="name" placeholder="Enter Project Name">
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
        <h3 class="box-title">List Project</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Project Id</th>
                    <th>Project Name</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $i = 0;
                foreach ($listProject as $v_content) {
                    $i++;
                    ?>
                    <tr class="odd gradeX">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $v_content->project_id; ?></td>
                        <td><?php echo $v_content->project_name; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>
