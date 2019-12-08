<!-- Code Field -->
<div class="form-group col-sm-6">
    <?php echo Form::label('code', 'Code:'); ?>

    <?php echo Form::text('code', null, ['class' => 'form-control']); ?>

</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    <?php echo Form::label('name', 'Name:'); ?>

    <?php echo Form::text('name', null, ['class' => 'form-control']); ?>

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <?php echo Form::submit('Save', ['class' => 'btn btn-primary']); ?>

    <a href="<?php echo route('districts.index'); ?>" class="btn btn-default">Cancel</a>
</div>
<?php /**PATH /home/hix/laraussd/dry-beach-93173/resources/views/districts/fields.blade.php ENDPATH**/ ?>