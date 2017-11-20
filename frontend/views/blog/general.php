<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
    use yii\web\Cookie;
?>
<?php
$js = <<< JS
    $('.cr_art').click(function(){
        if($('.form').css('display','none')){
            $('.form').css('display','block');
        }else{
            $('.form').css('display','none')
        }
    });
JS;
$this->registerJs($js); 
$this->registerCss(".form{display: none;}");
?>
    <div class='container'>
    <div class='row'>Поиск...</div>
    <div class='row'>
        <div class='btn-group'>
            <button type='button' class='btn btn-default'>Все статьи</button>
            <button type='button' class='btn btn-default'>Мои статьи</button>
        </div>
        <div style='margin-top: 20px;'>
            <?=Html::button('Создать статью', ['class' => 'btn btn-default cr_art']) ?>
        </div>

        <div class='form'>
        <div class='form-group'>
            <?php 
                print $create;
                print_r($error);
            ?>
            <?php $form = ActiveForm::begin();?>
        </div>
            <?=$form->field($model,'title')->textInput()->label('Название статьи')?>
            <?=$form->field($model,'user_id')->hiddenInput(['value'=>$user_id, 'name'=> 'user_id'])->label(false) ?>
        <div>
            <?=Html::textarea('descr','Статья',['rows'=>15,'cols' =>100])?>
        </div>
        <?=Html::submitButton('Сохранить', ['btn btn-primary'])?>
        <?php ActiveForm::end(); ?>
    </div>
    </div>
        <div class='row ar_info'>
            <div class='col-md-4'> 

            </div>
            <div class='col-md-4'> 
            <?php if(!empty($articles)){?>
            <?foreach($articles as $article):?> 
                <div><?=$article->article?></div>
            <?endforeach;?>
            <?php }else{ ?>
                <div>Статьи отсутствуют :(</div>
                <div>Но вы можете создать свою статью</div>
            <?php } ?>
            </div>
            <div class='col-md-4'> 
            
            </div>
        </div>
    </div>