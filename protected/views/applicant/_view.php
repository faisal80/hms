<div class="well well-sm">
    
    <dl class="dl-horizontal">        
        
        <dt><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</dt>
        <dd><?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?></dd>
        
        <dt><?php echo CHtml::encode($data->getAttributeLabel('app_no')); ?>:</dt>
        <dd><?php echo CHtml::encode($data->app_no); ?></dd>

        <dt><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</dt>
        <dd><?php echo CHtml::encode($data->NameWithTitle); ?></dd>

        <dt><?php echo CHtml::encode($data->getAttributeLabel('fname')); ?>:</dt>
        <dd><?php echo CHtml::encode($data->fname); ?></dd>

        <dt><?php echo CHtml::encode($data->getAttributeLabel('nic')); ?>:</dt>
        <dd><?php echo CHtml::encode($data->nic); ?></dd>

         <?php /*
       <dt><?php echo CHtml::encode($data->getAttributeLabel('dob')); ?>:</dt>
        <dd><?php echo CHtml::encode($data->dob); ?></dd>

        <dt><?php echo CHtml::encode($data->getAttributeLabel('contact_1')); ?>:</dt>
        <dd><?php echo CHtml::encode($data->contact_1); ?></dd>


        <dt><?php echo CHtml::encode($data->getAttributeLabel('contact_2')); ?>:</dt>
        <dd><?php echo CHtml::encode($data->contact_2?$data->contact_2:'.'); ?></dd>

        <dt><?php echo CHtml::encode($data->getAttributeLabel('postal_address')); ?>:</dt>
        <dd><?php echo CHtml::encode($data->postal_address); ?></dd>

        <dt><?php echo CHtml::encode($data->getAttributeLabel('permanent_address')); ?>:</dt>
        <dd><?php echo CHtml::encode($data->permanent_address); ?></dd>

        <dt><?php echo CHtml::encode($data->getAttributeLabel('occupation_status')); ?>:</dt>
        <dd><?php echo CHtml::encode($data->occupation_status); ?></dd>
 
        <dt><?php echo CHtml::encode($data->getAttributeLabel('employer')); ?>:</dt>
        <dd><?php echo CHtml::encode($data->employer); ?></dd>
  
        <dt><?php echo CHtml::encode($data->getAttributeLabel('nominee')); ?>:</dt>
        <dd><?php echo CHtml::encode($data->nominee); ?></dd>

        <dt><?php echo CHtml::encode($data->getAttributeLabel('relationship')); ?>:</dt>
        <dd><?php echo CHtml::encode($data->relationship); ?></dd>

        <dt><?php echo CHtml::encode($data->getAttributeLabel('nominee_fname')); ?>:</dt>
        <dd><?php echo CHtml::encode($data->nominee_fname); ?></dd>

        <dt><?php echo CHtml::encode($data->getAttributeLabel('nominee_nic')); ?>:</dt>
        <dd><?php echo CHtml::encode($data->nominee_nic); ?></dd>

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
<?php        CHtml::closeTag('a'); ?>