<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Modelo;
use app\models\Color;
/* @var $this yii\web\View */
/* @var $model app\models\Articulo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articulo-form">

    <?php $form = ActiveForm::begin(); ?> 
    
    <?= $form->field($model, 'ModeloId')->dropdownList(ArrayHelper::map(Modelo::find()->all(), 'ModeloId', 'Descripcion'),['prompt'=>'Selecciona un Modelo']);?>
    <?= $form->field($model, 'ColorId')->dropdownList(ArrayHelper::map(Color::find()->all(), 'ColorId', 'Descripcion'),['prompt'=>'Selecciona un Color']);?>
    <?= $form->field($model, 'Descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CodigoBarras')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
