<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'category-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal',
        ));
?>

<fieldset>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php
    echo $form->textFieldGroup($model, 'category', array(
        'widgetOptions' => array(
            'htmlOptions' => array(
                'class' => 'span5',
                'maxlength' => 100
            )
        ),
    ));
    ?>

    <?php
    echo $form->textFieldGroup($model, 'plot_size', array(
        'widgetOptions' => array(
            'htmlOptions' => array(
                'class' => 'span5',
                'maxlength' => 50
            )
        ),
    ));
    ?>

    <?php
    echo $form->checkboxGroup($model, 'corner');
    ?>

    <?php
    echo $form->dropDownListGroup($model, 'scheme_id', array(
        'widgetOptions' => array(
            'htmlOptions' => array(
                'class' => 'span5',
                'maxlength' => 10
            ),
            'data' => Scheme::getSchemeOptions(),
        )
            )
    );
    ?>

    <div class="form-actions text-center">
        <?php
        $this->widget('booster.widgets.TbButton', array(
            'buttonType' => 'submit',
            'context' => 'primary',
            'label' => $model->isNewRecord ? 'Create' : 'Save',
        ));
        ?>
    </div>
</fieldset>
<?php $this->endWidget(); ?>
