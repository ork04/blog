<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div>
    <?=Html::a('Регистрация',Url::to('http://localhost/advanced/frontend/web/index.php?r=blog%2Fregistration'),['class' => 'btn btn-primary'])?>
    <?=Html::a('Вход', 'http://localhost/advanced/frontend/web/index.php?r=blog%2Fenter', ['class' => 'btn btn-primary']) ?>   
</div>