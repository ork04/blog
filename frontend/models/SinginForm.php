<?php
    namespace frontend\models;

    use Yii;
    use yii\base\Model;
    use common\models\Users;
    use yii\web\Cookie;

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
                $cookies = Yii::$app->response->cookies;
                $cookies->add(new \yii\web\Cookie(['name' =>'user_id', 'value' => $query[0]['id']]));               
                return $query[0]['id'];
            }
        }
    }
?>