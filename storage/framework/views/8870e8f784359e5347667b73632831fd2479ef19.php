<?php if(isset($dataTypeContent->{$row->field})): ?>
    <img src="<?php echo e(Voyager::image($dataTypeContent->{$row->field})); ?>"
         style="width:200px; height:auto; clear:both; display:block; padding:2px; border:1px solid #ddd; margin-bottom:10px;">
<?php endif; ?>
<input <?php if($row->required == 1): ?> required <?php endif; ?> type="file" name="<?php echo e($row->field); ?>">