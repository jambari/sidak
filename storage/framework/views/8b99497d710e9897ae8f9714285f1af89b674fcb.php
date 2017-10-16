<?php if(isset($dataTypeContent->{$row->field})): ?>
    <?php if(json_decode($dataTypeContent->{$row->field})): ?>
        <?php $__currentLoopData = json_decode($dataTypeContent->{$row->field}); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <br/><a class="fileType" href="/storage/<?php echo e(isset($file->download_link) ? $file->download_link : ''); ?>"> <?php echo e(isset($file->original_name) ? $file->original_name : ''); ?> </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <a class="fileType" href="/storage/<?php echo e($dataTypeContent->{$row->field}); ?>"> Download </a>
    <?php endif; ?>
<?php endif; ?>
<input <?php if($row->required == 1): ?> <?php endif; ?> type="file" name="<?php echo e($row->field); ?>[]" multiple="multiple">
