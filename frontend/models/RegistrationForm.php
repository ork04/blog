<?php
    namespace frontend\models;
    use Yii;
    use yii\base\Model;
    use common\models\Users;

    class RegistrationForm extends Model
    {
        public $login;
        public $password;
        public $email;
        public $fam;
        public $name;
        public $born;

        public function rules(){
            return [
                    [['login','password','email'], 'required'],
                    [['email'], 'email'],
                    [['fam'], 'string'],
                    [['name'], 'string'],
               //     ['born', 'date'],
                    ];
        }
    
        public function registration(){
            $users = new Users();
            $users->login = $this->login;
            $users->password = $this->password;
            $users->email = $this->email;
            $users->fam = $this->fam;
            $users->name = $this->name;
            $users->born = $this->born;
            $users->date_reg = date('Y-m-d');
    
            return $users->save();
        }
    }
?>