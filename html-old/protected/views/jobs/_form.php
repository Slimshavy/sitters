<?php
/* @var $this JobsController */
/* @var $model Jobs */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'jobs-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'scheduledstarttime'); ?>
		<?php echo $form->textField($model,'scheduledstarttime'); ?>
		<?php echo $form->error($model,'scheduledstarttime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'scheduledendtime'); ?>
		<?php echo $form->textField($model,'scheduledendtime'); ?>
		<?php echo $form->error($model,'scheduledendtime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'actualstarttime'); ?>
		<?php echo $form->textField($model,'actualstarttime'); ?>
		<?php echo $form->error($model,'actualstarttime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'actualendtime'); ?>
		<?php echo $form->textField($model,'actualendtime'); ?>
		<?php echo $form->error($model,'actualendtime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parentuserid'); ?>
		<?php echo $form->textField($model,'parentuserid'); ?>
		<?php echo $form->error($model,'parentuserid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'babysitteruserid'); ?>
		<?php echo $form->textField($model,'babysitteruserid'); ?>
		<?php echo $form->error($model,'babysitteruserid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'childcount'); ?>
		<?php echo $form->textField($model,'childcount'); ?>
		<?php echo $form->error($model,'childcount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'maxchildage'); ?>
		<?php echo $form->textField($model,'maxchildage'); ?>
		<?php echo $form->error($model,'maxchildage'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'minchildage'); ?>
		<?php echo $form->textField($model,'minchildage'); ?>
		<?php echo $form->error($model,'minchildage'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hourlyrate'); ?>
		<?php echo $form->textField($model,'hourlyrate',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'hourlyrate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($model,'amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tip'); ?>
		<?php echo $form->textField($model,'tip',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($model,'tip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'creditcardfee'); ?>
		<?php echo $form->textField($model,'creditcardfee',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'creditcardfee'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->