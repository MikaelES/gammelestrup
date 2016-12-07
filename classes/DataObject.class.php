<?php

// provide the database connection details
require_once "../config.php";

// more safe is to use following location for config file
// require_once "../config.php";


abstract class DataObject {

// array to hold the record's data
  protected $data = array();

// class constructor
  public function __construct( $data ) {
    foreach ( $data as $key => $value ) {
      if ( array_key_exists( $key, $this->data ) ) $this->data[$key] = $value;
    }
  }

// this method enables outside code to access the data stored in the object
  public function getValue( $field ) {
    if ( array_key_exists( $field, $this->data ) ) {
      return $this->data[$field];
    } else {
      die( "Field not found" );
    }
  }

// method that allows outside code to retrieve a field value
// that has been passed through PHP's htmlspecialchars() function
  public function getValueEncoded( $field ) {
    return htmlspecialchars( $this->getValue( $field ) );
  }

// functhion allow classes to create a PDO connection to the database & destroy a database connection.  
  protected function connect() {
    try {
      $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );

      // a couple of useful attributes
      $conn->setAttribute( PDO::ATTR_PERSISTENT, true );
      $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    } catch ( PDOException $e ) {
      die( "Connection failed: " . $e->getMessage() );
    }

    return $conn;
  }

  protected function disconnect( $conn ) {
    $conn = "";
  }
}

?>
