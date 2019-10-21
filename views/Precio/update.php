<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Precio */

$this->title = 'Update Precio: ' . $model->PrecioId;
$this->params['breadcrumbs'][] = ['label' => 'Precios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PrecioId, 'url' => ['view', 'id' => $model->PrecioId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="precio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
