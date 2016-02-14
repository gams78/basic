<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\assets\StatusAsset;
StatusAsset::register($this);

/* @var $this yii\web\View */
/* @var $model app\models\Status */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="status-form">

    <?php $form = ActiveForm::begin(); ?>

	<div class="row">
		<div class="col-md-8">
			<?//= $form->field($model, 'message')->textarea(['rows' => 6]) ?>
			<?= $form->field($model, 'message')->widget(\yii\redactor\widgets\Redactor::className(), [
				'clientOptions' => [
					'imageManagerJson' => ['/redactor/upload/image-json'],
					'imageUpload' => ['/redactor/upload/image'],
					'fileUpload' => ['/redactor/upload/file'],
					'plugins' => ['clips', 'fontcolor','imagemanager']
				]
			])?>
		</div>
		<div class="col-md-4">
		  <p>Ostane: <span id="counter2">0</span></p>
		</div>
	</div>
	
	<?= $form->field($model, 'permissions')->dropDownList($model->getPermissions(), ['prompt'=>Yii::t('app', '- Choose Your Permissions -')]) ?>
			 
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
