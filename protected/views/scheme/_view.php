<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('draw_date')); ?>:</b>
	<?php echo CHtml::encode($data->draw_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('penalty')); ?>:</b>
	<?php echo CHtml::encode($data->penalty); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('occurence')); ?>:</b>
	<?php echo CHtml::encode($data->occurence); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('installment_interval')); ?>:</b>
	<?php echo CHtml::encode($data->installment_interval); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('account')); ?>:</b>
	<?php echo CHtml::encode($data->account); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('bank')); ?>:</b>
	<?php echo CHtml::encode($data->bank); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_user')); ?>:</b>
	<?php echo CHtml::encode($data->create_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_user')); ?>:</b>
	<?php echo CHtml::encode($data->update_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b>
	<?php echo CHtml::encode($data->update_time); ?>
	<br />

	*/ ?>

</div>