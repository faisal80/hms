<div class="well well-sm">
    <dl class="dl-horizontal">
			<dt><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</dt>
		<dd><?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?></dd>

		<dt><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</dt>
		<dd><?php echo CHtml::encode($data->name); ?></dd>

		<dt><?php echo CHtml::encode($data->getAttributeLabel('draw_date')); ?>:</dt>
		<dd><?php echo CHtml::encode($data->draw_date); ?></dd>

		<dt><?php echo CHtml::encode($data->getAttributeLabel('penalty')); ?>:</dt>
		<dd><?php echo CHtml::encode($data->penalty); ?></dd>

		<dt><?php echo CHtml::encode($data->getAttributeLabel('occurence')); ?>:</dt>
		<dd><?php echo CHtml::encode($data->occurence); ?></dd>

		<dt><?php echo CHtml::encode($data->getAttributeLabel('installment_interval')); ?>:</dt>
		<dd><?php echo CHtml::encode($data->installment_interval); ?></dd>

		<dt><?php echo CHtml::encode($data->getAttributeLabel('account')); ?>:</dt>
		<dd><?php echo CHtml::encode($data->account); ?></dd>

		<dt><?php echo CHtml::encode($data->getAttributeLabel('bank')); ?>:</dt>
		<dd><?php echo CHtml::encode($data->bank); ?></dd>
		
        <?php /*
		<dt><?php echo CHtml::encode($data->getAttributeLabel('create_user')); ?>:</dt>
		<dd><?php echo CHtml::encode($data->create_user); ?></dd>

		<dt><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</dt>
		<dd><?php echo CHtml::encode($data->create_time); ?></dd>

		<dt><?php echo CHtml::encode($data->getAttributeLabel('update_user')); ?>:</dt>
		<dd><?php echo CHtml::encode($data->update_user); ?></dd>

		<dt><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</dt>
		<dd><?php echo CHtml::encode($data->update_time); ?></dd>

	*/ ?>
    </dl>
</div>