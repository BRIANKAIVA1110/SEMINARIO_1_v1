<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Articulo */

$this->title = $model->ArticuloId;
$this->params['breadcrumbs'][] = ['label' => 'Articulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="articulo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->ArticuloId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->ArticuloId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ArticuloId',
            'ModeloId',
            'ColorId',
            'Descripcion',
            'CodigoBarras',
        ],
    ]) ?>

</div>
