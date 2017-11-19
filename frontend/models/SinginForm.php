<?php
    namespace frontend\models;

    use Yii;
    use yii\base\Model;
    use common\models\Users;

    class SinginForm extends Model
    {
        public $login;
        public $password;
        public $err = 0;

        public function rules(){
            return [
                [['login', 'password'], 'required'],
            ];
        }

        public function singin(){
            $user = new Users();
            $user->login = $this->login;
            $user->password = $this->password;
            $query = $user::find()->where('login=:login',[':login'=>$user->login])->andWhere('password=:password',[':password'=>$user->password])->asArray()->all();
            if($query){;
                return $query[0]['id'];
            }
        }
    }
?>