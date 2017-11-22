<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
?>
    <div class='input-group'>
        <?php $form = ActiveForm::begin();?>
            <?=$form->field($model,'login')->textInput()->label('Логин')?>
            <?=$form->field($model,'password')->passwordInput()->label('Пароль')?>
            <?=$form->field($model,'email')->input('email')->label('Электронная почта')?>
            <?=$form->field($model,'fam')->textInput()->label('Фамилия')?>
            <?=$form->field($model,'name')->textInput()->label('Имя')?>
            <?=$form->field($model,'born')->label('Дата рождения')?>
   
            <?=Html::submitButton('Отправить',['class'=>'btn btn-primary'])?>
    </div>
            <?php ActiveForm::end();?>