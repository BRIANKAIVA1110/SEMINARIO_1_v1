<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PrecioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Precios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="precio-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Agregar Precio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'PrecioId',
            'ArticuloId',
            'Precio',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
