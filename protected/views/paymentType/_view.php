<div class="well well-sm">
    <dl class="dl-horizontal">
		<dt><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</dt>
		<dd><?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?></dd>

		<dt><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</dt>
		<dd><?php echo CHtml::encode($data->category->category); ?></dd>

		<dt><?php echo CHtml::encode($data->getAttributeLabel('category.plot_size')); ?>:</dt>
		<dd><?php echo CHtml::encode($data->category->plot_size); ?></dd>
        
		<dt><?php echo CHtml::encode($data->getAttributeLabel('category.corner')); ?>:</dt>
		<dd><?php echo CHtml::encode($data->category->corner?'Yes':'No'); ?></dd>

        <dt><?php echo CHtml::encode($data->getAttributeLabel('payment_type')); ?>:</dt>
		<dd><?php echo CHtml::encode($data->payment_type); ?></dd>

		<dt><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</dt>
        <dd><?php echo CHtml::encode(number_format($data->amount)); ?></dd>
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