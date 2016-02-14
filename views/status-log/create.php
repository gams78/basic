<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StatusLog */

$this->title = Yii::t('app', 'Create Status Log');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Status Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="status-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
