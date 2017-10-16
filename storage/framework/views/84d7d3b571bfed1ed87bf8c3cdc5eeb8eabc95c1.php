<!-- !!! Add form action below -->
<form role="form" action="<?php echo e(route('voyager.database.bread.relationship')); ?>" method="POST">
	<div class="modal fade modal-danger modal-relationships" id="new_relationship_modal">
		<div class="modal-dialog relationship-panel">
		    <div class="model-content">
		        <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal"
	                        aria-hidden="true">&times;</button>
	                <h4 class="modal-title"><i class="voyager-heart"></i> <?php echo e(str_singular(ucfirst($table))); ?> Relationships</h4>
	            </div>

		        <div class="modal-body">
			        <div class="row">

			        	<?php if(isset($dataType->id)): ?>
				            <div class="col-md-12 relationship_details">
				                <p class="relationship_table_select"><?php echo e(str_singular(ucfirst($table))); ?></p>
				                <select class="relationship_type select2" name="relationship_type">
				                    <option value="hasOne" <?php if(isset($relationshipDetails->type) && $relationshipDetails->type == 'hasOne'): ?><?php echo e('selected="selected"'); ?><?php endif; ?>>Has One</option>
				                    <option value="hasMany" <?php if(isset($relationshipDetails->type) && $relationshipDetails->type == 'hasMany'): ?><?php echo e('selected="selected"'); ?><?php endif; ?>>Has Many</option>
				                    <option value="belongsTo" <?php if(isset($relationshipDetails->type) && $relationshipDetails->type == 'belongsTo'): ?><?php echo e('selected="selected"'); ?><?php endif; ?>>Belongs To</option>
				                    <option value="belongsToMany" <?php if(isset($relationshipDetails->type) && $relationshipDetails->type == 'belongsToMany'): ?><?php echo e('selected="selected"'); ?><?php endif; ?>>Belongs To Many</option>
				                </select>
				                <select class="relationship_table select2" name="relationship_table">
				                    <?php $__currentLoopData = $tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tbl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				                        <option value="<?php echo e($tbl); ?>" <?php if(isset($relationshipDetails->table) && $relationshipDetails->table == $tbl): ?><?php echo e('selected="selected"'); ?><?php endif; ?>><?php echo e(str_singular(ucfirst($tbl))); ?></option>
				                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				                </select>
				                <span><input type="text" class="form-control" name="relationship_model" placeholder="Namespace" value="<?php if(isset($relationshipDetails->model)): ?><?php echo e($relationshipDetails->model); ?><?php endif; ?>"></span>
				            </div>
				            <div class="col-md-12 relationship_details relationshipField">
				            	<div class="belongsTo">
				            		<label>Which column from the <span><?php echo e(str_singular(ucfirst($table))); ?></span> is used to reference the <span class="label_table_name"></span>?</label>
				            		<select name="relationship_column_belongs_to" class="new_relationship_field select2">
				                    	<?php $__currentLoopData = $fieldOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				                        	<option value="<?php echo e($data['field']); ?>"><?php echo e($data['field']); ?></option>
				                    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				               		</select>
				               	</div>
				               	<div class="hasOneMany flexed">
				            		<label>Which column from the <span class="label_table_name"></span> is used to reference the <span><?php echo e(str_singular(ucfirst($table))); ?></span>?</label>
					                <select name="relationship_column" class="new_relationship_field select2 rowDrop" data-table="<?php echo e($tables[0]); ?>" data-selected="">
					                </select>
					            </div>
				            </div>
				            <div class="col-md-12 relationship_details relationshipPivot">
				            	<label>Pivot Table:</label>
				            	<select name="relationship_pivot" class="select2">
		                        	<?php $__currentLoopData = $tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tbl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				                        <option value="<?php echo e($tbl); ?>" <?php if(isset($relationshipDetails->table) && $relationshipDetails->table == $tbl): ?><?php echo e('selected="selected"'); ?><?php endif; ?>><?php echo e(str_singular(ucfirst($tbl))); ?></option>
				                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		                        </select>
				            </div>
				            <div class="col-md-12 relationship_details_more">
				                <div class="well">
				                    <label>Selection Details</label>
				                    <p><strong>Display the <span class="label_table_name"></span>: </strong>
				                        <select name="relationship_label" class="rowDrop select2" data-table="<?php echo e($tables[0]); ?>" data-selected="">
				                        </select>
				                    </p>
				                    <p class="relationship_key"><strong>Store the <span class="label_table_name"></span>: </strong>
				                        <select name="relationship_key" class="rowDrop select2" data-table="<?php echo e($tables[0]); ?>" data-selected="">
				                        </select>
				                    </p>
				                </div>
				            </div>
				        <?php else: ?>
				        	<div class="col-md-12">
				        		<h5><i class="voyager-rum-1"></i> Easy there Captain</h5>
				        		<p class="relationship-warn">Before you can create a new relationship you will need to create the BREAD first.<br> Then, return back to edit the BREAD and you will be able to add relationships.<br> Thanks.</p>
				        	</div>
				        <?php endif; ?>
			        
			        </div>
			    </div>
			    <div class="modal-footer">
			    	<div class="relationship-btn-container">
			    		<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	                    <?php if(isset($dataType->id)): ?>
	                    	<button class="btn btn-danger btn-relationship"><i class="voyager-plus"></i> <span>Add New relationship</span></button>
	                	<?php endif; ?>
	                </div>
			    </div>
		    </div>
		</div>
	</div>
	<input type="hidden" value="<?php if(isset($dataType->id)): ?><?php echo e($dataType->id); ?><?php endif; ?>" name="data_type_id">
	<?php echo e(csrf_field()); ?>

</form>