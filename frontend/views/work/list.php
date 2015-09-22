<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отобранные произведения';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            $file = str_replace('/', '\\', Yii::getAlias('@frontend').'\web\media\books\\'.$model->filename);
            $parser = new \cebe\markdown\GithubMarkdown();
            $result = '<div>'.$parser->parse(file_get_contents($file)).'</div>';
            return $result;
        },
    ])
    ?>
</div>
