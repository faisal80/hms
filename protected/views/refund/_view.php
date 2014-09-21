<div class="well well-sm">
    <dl class="dl-horizontal">
		<dt><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</dt>
		<dd><?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?></dd>

		<dt><?php echo CHtml::encode($data->getAttributeLabel('applicant_id')); ?>:</dt>
		<dd><?php echo CHtml::encode($data->applicant->name); ?></dd>

		<dt><?php echo CHtml::encode($data->getAttributeLabel('allotment_id')); ?>:</dt>
		<dd><?php echo CHtml::encode($data->allotment->cagetory->plot_size); ?></dd>

		<dt><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</dt>
		<dd><?php echo CHtml::encode($data->amount); ?></dd>

		<dt><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</dt>
		<dd><?php echo CHtml::encode($data->date); ?></dd>

		<dt><?php echo CHtml::encode($data->getAttributeLabel('date_applied')); ?>:</dt>
		<dd><?php echo CHtml::encode($data->date_applied); ?></dd>

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