<!-- general form elements -->
<div style="text-align: center;color: red"><?php echo validation_errors(); ?></div>
<div class="box box-primary">

    <button class="btn btn-info <?php if($sessionUserDetails->admin_type=='field_officer'){echo ' hide';}?>"  type="button" data-toggle="collapse" data-target="#demo">+ ADD</button>
    
	<div id="demo" class="collapse">
    
    <div class="box-header with-border">
        <h3 class="box-title">Asset</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    
    <?php
    $attributes = array('enctype' => 'multipart/form-data');
    echo form_open_multipart('super_admin/addAsset', $attributes);
    ?>
    <!--<form role="form">-->
    <div class="box-body">
        <div class="row">
		<div class="col-md-4">
		<div class="form-group">
            <label for="name">Date</label>
            <input type="text" value="<?php echo set_value('date'); ?>" name="date" class="form-control datepicker" id="name" placeholder="Select Date">
        </div>
		</div>
		
		<div class="col-md-4">
		<div class="form-group">
            <label for="asset_cat_id">Asset Category</label>
            <select name="asset_cat_id" class="form-control "> 
			<?php
			if($listAssetCategory){
				foreach($listAssetCategory as $catAsset){
			?>
                <option value="<?php echo $catAsset->asset_category_id;?>"><?php echo $catAsset->asset_category;?></option>
			<?php } }?> 

            </select>
        </div>		
		</div>
		<div class="col-md-4">
		<div class="form-group">
            <label for="name">Quantity</label>
            <input type="text" value="<?php echo set_value('quantity'); ?>" name="quantity" class="form-control" id="quantity" placeholder="Quantity">
        </div>
		</div>
		
		</div>
        
		<div class="row">
		<div class="col-md-4">
		<div class="form-group">
            <label for="item">Item</label>
            <input type="text" value="<?php echo set_value('item'); ?>" name="item" class="form-control" id="item" placeholder="Enter Item">
        </div>
		</div>
		
		<div class="col-md-4">
		<div class="form-group">
            <label for="asset_cat">Product Supplier</label>
            <input type="text" value="<?php echo set_value('supplier'); ?>" name="supplier" class="form-control" id="supplier" placeholder="Enter Supplier">
        </div>		
		</div>
		<div class="col-md-4">
		<div class="form-group">
            <label for="name">Purchase By</label>
            <input type="text" value="<?php echo set_value('purchase_by'); ?>" name="purchase_by" class="form-control" id="purchase_by" placeholder="Purchase By">
        </div>
		</div>		
		</div>

		<div class="row">
		<div class="col-md-4">
		<div class="form-group">
            <label for="asset_condition">Condition</label>
            <select name="asset_condition" class="form-control "> 			
                <option value="new">Brand New</option>
				<option value="new">OLD</option>			
            </select>
        </div>
		</div>
		
		<div class="col-md-4">
		<div class="form-group">
            <label for="asset_cat">Cost</label>
            <input type="text" value="<?php echo set_value('cost'); ?>" name="cost" class="form-control" id="cost" placeholder="Enter Total Cost">
        </div>		
		</div>
		<div class="col-md-4">
		<div class="form-group">
            <label for="name">Warranty</label>
            <input type="text" value="<?php echo set_value('warranty'); ?>" name="warranty" class="form-control" id="warranty" placeholder="Warranty">
        </div>
		</div>		
		</div>
		
		<div class="row">
		<div class="col-md-4">
		<div class="form-group">
            <label for="asset_cat">Depriciation Yearly</label>
            <select name="yearly_depreciation_increase_decrease" class="form-control "> 			
                <option value="increase">Increase</option>
				<option value="decrease" selected="selected">Decrease</option>			
            </select>
        </div>
		</div>
		
		<div class="col-md-4">
		<div class="form-group">
            <label for="asset_cat">Depreciation Percent</label>
            <select name="depreciation_percent" class="form-control "> 
			<?php
			for( $i=1; $i<=100; $i++ )

{?>
                <option value="<?php echo $i?>"><?php echo $i?></option>
<?php }?>				
            </select>
        </div>		
		</div>
				
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
					 <th>Date</th>
					<th>Category</th>
                    <th>Type</th> 
					<th>Item</th>
					<th>Quantity</th>
					<th>Cost</th>
					<th>Supplier</th>
					<th>Purchase By</th>					
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $i = 0;
                foreach ($listAsset as $v_content) {
                    $i++;
                    ?>	
                    <tr class="odd gradeX">

                        <td><?php echo $i; ?></td>
					 <td><?php echo $v_content->date; ?></td>
                        <td><?php echo $v_content->asset_category; ?></td>
                        <td><?php echo $v_content->asset_type; ?></td>
                       <td><?php echo $v_content->item; ?></td>
                        <td><?php echo $v_content->quantity; ?></td>
						 <td><?php echo $v_content->cost; ?></td>
                        <td><?php echo $v_content->supplier; ?></td>
						 <td><?php echo $v_content->purchase_by; ?></td>
                      

                        <td>
                            <a href="<?php echo base_url() ?>super_admin/editAsset/<?php echo $v_content->	asset_id; ?>" class="<?php if($sessionUserDetails->admin_type=='field_officer'){echo ' hide';}?>"">
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
					<th></th>
                    <th>Total Cost</th>
                    <th><?php echo $sumOfAmountAssetPurchase.' '.'TK' ;?></th>
                    <th></th>
					 <th></th>
					  <th></th>
                   
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>