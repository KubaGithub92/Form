<?php
class Session
{
  public static $instance = null;
  public static function instance(): Session
  {
    if (static::$instance === null) {
      static::$instance = new Session;
    }
    return static::$instance;
  }

  public $data = [];
  // when sesion object is being created
  // thanks to singleton/instance principle it will happen only once
  public function __construct()
  {
    session_start();
    $this->data = $_SESSION;
  }

  public function set($key, $value)
  {
    $this->data[$key] = $value;
    $_SESSION[$key] = $value;
  }
}
