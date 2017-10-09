<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
?>

    <div class="alert alert-success">
        Поздравляем! Вы успешно зарегистрировались!
        Для продолжения вам необходимо войти в систему!
    </div>
    <div>
    var_dump($_GET);
        <?php if($this->err ==0){?>
            <div class='alert alert-danger'>Вы не зарегистрированы! 
                <?=Html::a('Регистрация', '/blog/registration')?>
            </div>
        <?php }elseif($this->err >=1){ ?>
            <div class='alert alert-danger'>Произошла ошибка! Попробуйте позднее!
            </div>
        <?php }?>
    </div>
    <div>
        <?php $form = ActiveForm::begin();?>
            <?=$form->field($model,'login')->textInput()->label('Ваш логин')?>
            <?=$form->field($model, 'password')->passwordInput()->label('Пароль')?>
            <div>
                <?=Html::submitButton('Отправить', ['class' => 'btn btn-primary'])?>
            </div>
        <?php ActiveForm::end();?>
    </div>