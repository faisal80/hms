<div class="well well-sm">
    <dl class="dl-horizontal">
		<dt><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</dt>
		<dd><?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?></dd>

		<dt><?php echo CHtml::encode($data->getAttributeLabel('applicant_id')); ?>:</dt>
		<dd><?php echo CHtml::encode($data->applicant->name); ?></dd>

		<dt><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</dt>
		<dd><?php echo CHtml::encode($data->date); ?></dd>

		<dt><?php echo CHtml::encode($data->getAttributeLabel('payment_type_id')); ?>:</dt>
		<dd><?php echo CHtml::encode($data->payment_type->payment_type); ?></dd>

		<dt><?php echo CHtml::encode($data->getAttributeLabel('scheme_id')); ?>:</dt>
		<dd><?php echo CHtml::encode($data->scheme->name); ?></dd>

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