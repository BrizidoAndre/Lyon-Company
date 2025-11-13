<?php

namespace app\models;

use Symfony\Component\Console\Output\TrimmedBufferOutput;
use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read Employees|null $user
 *
 */
class LoginForm extends Model
{
    public $Email;
    public $Password;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['Email', 'Password'], 'required',],
            [['Email', 'Password'], 'string', 'min' => 6,],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['Password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->Password)) {
                $tries = $this->validateTries();
                    $total = $tries['tries'];
                    $time = $tries['seconds'];
                if ($total >= 0) {
                    $this->addError($attribute, "Email ou senha incorretos. $total tentativas restantes.");
                } else {
                    $this->addError($attribute, "Email ou senha incorretos. $time segundos incrementados no bloqueio.");
                }
            } //            se o login foi executado com sucesso, remover a sessão de tentativas
            else {
                Yii::$app->session->remove('tries');
            }
        }
    }

    public function validateTries()
    {
        $now = new \DateTime();
        $tries = Yii::$app->session->get('tries', 3);
        $tries--;
//        se o número de tentativas ficou abaixo ou igual a zero
//        verificando também se o tempo de espera já está setado
//        se não então crie um novo
        if ($tries <= 0) {
            $multipliesFor10 = 10 * abs($tries);
            $totalTime = 30 + $multipliesFor10;
            $date = new \DateTime("+$totalTime seconds");
            $intervalInSeconds = $now->diff($date);
            $totalSeconds = $intervalInSeconds->s + $intervalInSeconds->i * 60 + $intervalInSeconds->h * 60 * 60;
            Yii::$app->session->set('time', $date->getTimestamp());
        }
        Yii::$app->session->set('tries', $tries);
        return [
            'tries' => $tries,
            'seconds' => $totalSeconds ?? null
        ];
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->timeValidate() && $this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return Employees|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = Employees::findByEmail($this->Email);
        }
        return $this->_user;
    }

//    para verificar se o usuário tem um tempo de espera e se o tempo de espera já se passou
    public function timeValidate()
    {
        $time = Yii::$app->session->get('time', true);
        $timeDate = (new \DateTime())->setTimestamp($time);
        $now = new \DateTime();
        $timeDifference = $now->diff($timeDate);

//        se o tempo de espera é maior que o tempo atual
//        informa ao usuário o tempo restante para tentar novamente
//        e retorna falso
        if (!$timeDifference->invert) {
            $totalSeconds = $timeDifference->s + $timeDifference->i * 60 + $timeDifference->h * 60 * 60;
            Yii::$app->session->setFlash('danger', "Login foi bloqueado por múltiplas tentativas. Aguarde $totalSeconds segundos");
            return false;
        }
//        se o tempo de espera é menor destroi o tempo da sessão e retorna positivo
        Yii::$app->session->remove('time');
        return true;
    }
}