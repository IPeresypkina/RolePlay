<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PlotAndSession */

$this->title = 'Create Plot And Session';
$this->params['breadcrumbs'][] = ['label' => 'Plot And Sessions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plot-and-session-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
