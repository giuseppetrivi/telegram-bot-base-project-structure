<?php

namespace TGBot\config;

use Exception;


/**
 * Singleton class to handle configuration info.
 * It has to be first setted (setInstance), with constructor parameter
 * and then to be getted.
 */
class ConfigurationInfo {

  private static $_Instance = null;

  private bool $testing;

  private function __construct($testing=false) {
    $this->testing = $testing;
  }

  /**
   * Set the instance of the configuration class
   * 
   * @param bool $testing Default to false, if true select the configuration for testing
   * @return ConfigurationInfo
   */
  public static function setInstance(bool $testing=false) {
    if (self::$_Instance==null) {
      self::$_Instance = new ConfigurationInfo($testing);
    }
    return self::$_Instance;
  }

  /**
   * Get the singleton instance of the class
   */
  public static function getInstance() {
    if (self::$_Instance==null) {
      throw new Exception("Errore nella configurazione");
    }
    return self::$_Instance;
  }

  /**
   * Get the testing value, to check if the config is in testing mode
   * 
   * @return bool
   */
  public function isTesting() {
    return $this->testing;
  }


  /** [THIS IS AN EXAMPLE OF HANDLE A config.json FILE AND ITS DATA] */

  /**
   * Takes the data in config file and convert in associative array
   */
  private function getConfigurationFileContent() {
    $mode = $this->testing ? 'testing' : 'production';
    $file_content = file_get_contents(__DIR__."/config.json");
    if (!$file_content) {
      throw new Exception("Qualcosa è andato storto nella configurazione");
    }
    return json_decode($file_content, true)[$mode];
  }


  /* Database info */
  public function getDbUsername() {
    return self::getConfigurationFileContent()['DATABASE_INFO']['username'];
  }
  public function getDbPassword() {
    return self::getConfigurationFileContent()['DATABASE_INFO']['password'];
  }
  public function getDbName() {
    return self::getConfigurationFileContent()['DATABASE_INFO']['db_name'];
  }
  public function getDbHost() {
    return self::getConfigurationFileContent()['DATABASE_INFO']['db_host'];
  }


  /* Telegram bot API token */
  public function getTelegramBotApiToken() {
    return self::getConfigurationFileContent()['TELEGRAM_BOT_API_TOKEN'];
  }


  /* Open access to bot */
  public function getOpenAccessToBot() {
    return self::getConfigurationFileContent()['OPEN_ACCESS_TO_BOT'];
  }

}