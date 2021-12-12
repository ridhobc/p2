<?php
/**
 * This file is part of the TelegramBot package.
 *
 * (c) Avtandil Kikabidze aka LONGMAN <akalongman@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace Longman\TelegramBot\Commands\UserCommands;

use onmotion\telegram\models\Actions;
use onmotion\telegram\models\AuthorizedChat;
use onmotion\telegram\models\AuthorizedManagerChat;
use onmotion\telegram\models\Usernames;
use onmotion\telegram\TelegramVars;
use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Request;
use Yii;

/**
 * User "/logout" command
 */
class LogoutCommand extends UserCommand
{
    /**#@+
     * {@inheritdoc}
     */
    protected $name = 'logout';
    protected $description = '';
    protected $usage = '/logout';
    protected $version = '1.0.0';
    
    /**#@-*/

    public function __construct($telegram, $update = NULL)
    {
        $this->description = \Yii::t('tlgrm', 'Logout from the support system.');
        parent::__construct($telegram, $update);
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $message = $this->getMessage();
        $chat_id = $message->getChat()->getId();
        $userId = $message->getFrom()->getId();

        $authChat = AuthorizedManagerChat::findOne($chat_id);
        if (!$authChat){
            $data = [
                'chat_id' => $chat_id,
                'text'    => Yii::t('tlgrm', 'You are not logged in.'),
            ];
        }else{
            $authChat->delete();
            $dbUsername = Usernames::find()->where(['chat_id' => $chat_id])->one();
            if ($dbUsername) $dbUsername->delete();
            $data = [
                'chat_id' => $chat_id,
                'text'    => Yii::t('tlgrm', 'You will no longer receive messages.'),
            ];
        }
        
        return Request::sendMessage($data);
    }
}
