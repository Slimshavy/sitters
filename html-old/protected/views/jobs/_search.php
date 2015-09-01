<?php
/* @var $this JobsController */
/* @var $model Jobs */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'scheduledstarttime'); ?>
		<?php echo $form->textField($model,'scheduledstarttime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'scheduledendtime'); ?>
		<?php echo $form->textField($model,'scheduledendtime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'actualstarttime'); ?>
		<?php echo $form->textField($model,'actualstarttime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'actualendtime'); ?>
		<?php echo $form->textField($model,'actualendtime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parentuserid'); ?>
		<?php echo $form->textField($model,'parentuserid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'babysitteruserid'); ?>
		<?php echo $form->textField($model,'babysitteruserid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'childcount'); ?>
		<?php echo $form->textField($model,'childcount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'maxchildage'); ?>
		<?php echo $form->textField($model,'maxchildage'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'minchildage'); ?>
		<?php echo $form->textField($model,'minchildage'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hourlyrate'); ?>
		<?php echo $form->textField($model,'hourlyrate',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'amount'); ?>
		<?php echo $form->textField($model,'amount',array('size'=>7,'maxlength'=>7)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tip'); ?>
		<?php echo $form->textField($model,'tip',array('size'=>7,'maxlength'=>7)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'creditcardfee'); ?>
		<?php echo $form->textField($model,'creditcardfee',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->