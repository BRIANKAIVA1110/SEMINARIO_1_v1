<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Articulo;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Precio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="precio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ArticuloId')
    ->dropdownList(ArrayHelper::map(Articulo::find()
    ->leftJoin('precio','articulo.articuloId = precio.articuloId')
    ->where(['precio.precio'=>null])
    ->all(), 'ArticuloId', 'Descripcion'),['prompt'=>'Selecciona un Articulo']);?>

    <?= $form->field($model, 'Precio')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
