<?php
    use yii\helpers\Html;
?>
    <div class='container'>
    <div class='row'>Поиск...</div>
    <div class='row'>
        <div class='btn-group'>
            <button type='button' class='btn btn-default'>Все статьи</button>
            <button type='button' class='btn btn-default'>Мои статьи</button>
        </div>
    </div>
        <div class='row'>
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