<?php

/** autoload for Composer's libraries */
require_once __DIR__ . "/vendor/autoload.php";
/** autoload for project's files */
require_once __DIR__ . "/project_autoloader.php";
/** autoload for processes (that have different rules of autoloading and namespace handling) */
require_once __DIR__ . "/control/processes_autoloader.php";


use TGBot\config\ConfigurationInfo;
use TGBot\entities\tgbotapi_custom_interface\TelegramBotApiCustom;
use TGBot\entities\User;
use TGBot\entities\UserAuthorization;

/** ConfigurationInfo instance */
$_SystemConfig = ConfigurationInfo::setInstance(true);

/** Configuration of the database (by DB "meekro" instance, statically) */
DB::$user = $_SystemConfig->getDbUsername();
DB::$password = $_SystemConfig->getDbPassword();
DB::$dbName = $_SystemConfig->getDbName();


/** Initialization of Bot instance and first checks */
$_Bot = null;
try {
  $telegram_bot_api_token = $_SystemConfig->getTelegramBotApiToken();
  $_Bot = new TelegramBotApiCustom($telegram_bot_api_token);
} catch(Exception $e) {
  // insert an exception
}

$user_id = $_Bot->getChatId();
$text = $_Bot->getInputFromChat()->getText();

/** User object sholud be checked */
$_User = new User($user_id);


/** 
 * [EXAMPLE OF]
 * Authorization check on the user */
/*
$_User = null;
try {
  $_User = new User($user_id);
  $_UserAuthorization = new UserAuthorization($_User, $_SystemConfig);
  $_UserAuthorization->verifyAuthorization();
} catch(Exception $e) {
  $_Bot->sendMessage([
    'text' => "ERRORE: " . $e->getMessage()
  ]);
  exit;
}
*/


/** [HERE COULD BE INSERTED THE FORCED RESTART PROCESS HANDLE] */


/** Starting process */
$process_name = $_User->getProcessHandler()->getProcessName();
$process_name = "Main"; // to delete
$_Process = new $process_name($_Bot, $_User);
$_Process->codeToRun();










