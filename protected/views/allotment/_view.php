<div class="well well-sm">
    <dl class="dl-horizontal">
        <dt><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</dt>
        <dd><?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?></dd>

        <dt><?php echo CHtml::encode($data->getAttributeLabel('applicant_id')); ?>:</dt>
        <dd><?php echo CHtml::encode($data->applicant->name); ?></dd>

        <dt><?php echo CHtml::encode($data->getAttributeLabel('scheme_id')); ?>:</dt>
        <dd><?php echo CHtml::encode($data->scheme->name); ?></dd>

        <dt><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</dt>
        <dd><?php echo CHtml::encode($data->category->category); ?></dd>

        <dt><?php echo CHtml::encode($data->getAttributeLabel('plot_no')); ?>:</dt>
        <dd><?php echo CHtml::encode($data->plot_no); ?></dd>

        <dt><?php echo CHtml::encode($data->getAttributeLabel('street_no')); ?>:</dt>
        <dd><?php echo CHtml::encode($data->street_no); ?></dd>

        <dt><?php echo CHtml::encode($data->getAttributeLabel('sector')); ?>:</dt>
        <dd><?php echo CHtml::encode($data->sector); ?></dd>


          <dt><?php echo CHtml::encode($data->getAttributeLabel('phase')); ?>:</dt>
          <dd><?php echo CHtml::encode($data->phase); ?></dd>

          <dt><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</dt>
          <dd><?php echo CHtml::encode($data->date); ?></dd>

          <dt><?php echo CHtml::encode($data->getAttributeLabel('order_no')); ?>:</dt>
          <dd><?php echo CHtml::encode($data->order_no); ?></dd>
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