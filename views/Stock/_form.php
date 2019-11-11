<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Articulo;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Stock */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stock-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ArticuloId')
    ->dropdownList(ArrayHelper::map(Articulo::find()
    ->leftJoin('stock','articulo.articuloId = stock.articuloId')
    ->where(['stock.cantidad'=>null])
    ->all(), 'ArticuloId', 'Descripcion'),['prompt'=>'Selecciona un Articulo']);?>

    <?= $form->field($model, 'Cantidad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
