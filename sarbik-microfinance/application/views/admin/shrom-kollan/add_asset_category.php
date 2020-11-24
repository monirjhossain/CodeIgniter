<!-- general form elements -->
<div style="text-align: center;color: red"><?php echo validation_errors(); ?></div>
<div class="box box-primary">

    <button class="btn btn-info <?php if($sessionUserDetails->admin_type=='field_officer'){echo ' hide';}?>"  type="button" data-toggle="collapse" data-target="#demo">+ ADD</button>
    
	<div id="demo" class="collapse">
    
    <div class="box-header with-border">
        <h3 class="box-title">Asset Category</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    
    <?php
    $attributes = array('enctype' => 'multipart/form-data');
    echo form_open_multipart('super_admin/addAssetCategory', $attributes);
    ?>
    <!--<form role="form">-->
    <div class="box-body">
        <div class="form-group">
            <label for="name">Asset Category</label>
            <input type="text" value="<?php echo set_value('asset_category'); ?>" name="asset_category" class="form-control" id="name" placeholder="Enter Asset Category">
        </div>
        

        <div class="form-group">
            <label for="voucher_type">Type</label>
            <select name="asset_type" class="form-control">              
                <option value="credit">Credit</option>
                

            </select>
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
        <h3 class="box-title">List</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>

                    <th>Serial</th>
					<th>Asset Category</th>
                    <th>Asset Category Type</th>    
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $i = 0;
                foreach ($listAssetCategory as $v_content) {
                    $i++;
                    ?>	
                    <tr class="odd gradeX">

                        <td><?php echo $i; ?></td>
					
                        <td><?php echo $v_content->asset_category; ?></td>
                        <td><?php echo $v_content->asset_type; ?></td>
                      

                        <td>
                            <a href="<?php echo base_url() ?>super_admin/editAssetCategory/<?php echo $v_content->asset_category_id; ?>" class="<?php if($sessionUserDetails->admin_type=='field_officer'){echo ' hide';}?>"">
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