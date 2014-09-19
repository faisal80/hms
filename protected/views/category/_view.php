<div class="well well-sm">
    <dl class="dl-horizontal">
		<dt><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</dt>
		<dd><?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?></dd>

		<dt><?php echo CHtml::encode($data->getAttributeLabel('category')); ?>:</dt>
		<dd><?php echo CHtml::encode($data->category); ?></dd>

		<dt><?php echo CHtml::encode($data->getAttributeLabel('plot_size')); ?>:</dt>
		<dd><?php echo CHtml::encode($data->plot_size); ?></dd>

		<dt><?php echo CHtml::encode($data->getAttributeLabel('corner')); ?>:</dt>
		<dd><?php echo CHtml::encode(($data->corner)?'Yes':'No'); ?></dd>

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