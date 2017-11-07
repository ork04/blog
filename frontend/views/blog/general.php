<?php
    use yii\helpers\Html;

$js = <<< JS
    $('.cr_art').click(function(){
        var html = '';
        html += '<form>';
        html += '<div class="form-group">';
        html += '<input type="text" placeholder="Введите название статьи">';
        html += '</div>';
        html += '<div>';
        html += '<textarea rows="15" cols="100"></textarea>';
        html += '</div>';
        html += '<input type="submit" value="Сохранить">';
        html += '</form>';
        $(this).after(html);
        $(this).css('display','none');
        $('.ar_info').css('display', 'none');
    });
JS;
$this->registerJs($js); ?>
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
    </div>
        <div class='row ar_info'>
            <div class='col-md-4'> 

            </div>
            <div class='col-md-4'> 
            <?php if(isset($articles)){?>
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