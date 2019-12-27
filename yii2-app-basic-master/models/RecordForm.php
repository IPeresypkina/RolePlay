<?php


namespace app\models;


use yii\base\Model;

class RecordForm extends Model
{
    public $firstName;
    public $secondName;
    public $phone;
    public $email;
    public $message;
    public $calendarId;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['firstName', 'secondName', 'phone', 'email', 'calendarId'], 'required'],
            [['message'], 'string', 'max' => 128],
            ['email', 'email'],
        ];
    }

    /**
     * Сохраняет заявку пользователя об игре.
     */
    public function record()
    {
        $user = new User();
        $user->firstName  = $this->firstName;
        $user->secondName = $this->secondName;
        $user->phone = $this->phone;
        $user->email = $this->email;
        $user->message = $this->message;
        $user->save();
        var_dump($user->getErrors());

        $record = new Record();
        $record->usersId = $user->id;
        $record->calendarId = $this->calendarId;
        $record->save();
    }
}