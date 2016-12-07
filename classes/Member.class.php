<?php

// the MemberClass inherits from the DataObject class

require_once "DataObject.class.php";

class Member extends DataObject {

  protected $data = array(
    "manor_id" => "",
    "latitude" => "",
    "longitude" => "",
    "title" => "",
    "description_short" => "",
    "description" => "",
    "keywords" => "",
    "admission" => "",
    "parking" => "",
    "address" => "",
    "phone" => "",
    "user_email" => "",
    "function" => "",
    "thumbnail" => "",
    "user_id" => ""
  );

  private $_genres = array(
    "crime" => "Crime",
    "horror" => "Horror",
    "thriller" => "Thriller",
    "romance" => "Romance",
    "sciFi" => "Sci-Fi",
    "adventure" => "Adventure",
    "nonFiction" => "Non-Fiction"
  );


// connect method to create a database connection
  public static function getMembers( $startRow, $numRows, $order ) {
    $conn = parent::connect();

    // * (all) columns from the members table ordered by the $order variable, and limited to the range 
    $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM " . TBL_MANORS . " ORDER BY $order LIMIT :startRow, :numRows";

    try {
      $st = $conn->prepare( $sql );

      // :startRow and :numRows are called placeholders or parameter markers. They serve two purposes. 
      // First of all, they let you prepare — that is, get MySQL to parse — a query once, then run it 
      // multiple times with different values. If you need to run the same query many times using 
      // different input values — when inserting many rows of data, for instance — prepared statements 
      // can really speed up execution. Secondly, they reduce the risk of so-called SQL injection attacks.
      $st->bindValue( ":startRow", $startRow, PDO::PARAM_INT );
      $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );

      // time to run the query
      $st->execute();

      // The next block of code loops through the record set returned by the query.
      // For each row returned, it creates a corresponding Member object to hold 
      // the row’s data, and stores the object in an array
      $members = array();
      foreach ( $st->fetchAll() as $row ) {
        $members[] = new Member( $row );
      }
      $st = $conn->query( "SELECT found_rows() as totalRows" );
      $row = $st->fetch();
      parent::disconnect( $conn );
      return array( $members, $row["totalRows"] );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }

  public static function getMember( $id ) {
    $conn = parent::connect();
    $sql = "SELECT * FROM " . TBL_MANORS . " WHERE id = :id";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":id", $id, PDO::PARAM_INT );
      $st->execute();
      $row = $st->fetch();
      parent::disconnect( $conn );
      if ( $row ) return new Member( $row );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }

  public static function getByUsername( $username ) {
    $conn = parent::connect();
    $sql = "SELECT * FROM " . TBL_MANORS . " WHERE user_id = :user_id";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":username", $username, PDO::PARAM_STR );
      $st->execute();
      $row = $st->fetch();
      parent::disconnect( $conn );
      if ( $row ) return new Member( $row );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }

  public static function getByEmailAddress( $function ) {
    $conn = parent::connect();
    $sql = "SELECT * FROM " . TBL_MANORS . " WHERE function = :function";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":function", $function, PDO::PARAM_STR );
      $st->execute();
      $row = $st->fetch();
      parent::disconnect( $conn );
      if ( $row ) return new Member( $row );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }

  public function getGenderString() {
    return ( $this->data["gender"] == "f" ) ? "Female" : "Male";
  }

  public function getFavoriteGenreString() {
    return ( $this->_genres[$this->data["favoriteGenre"]] );
  }

  public function getGenres() {
    return $this->_genres;
  }

  public function insert() {
    $conn = parent::connect();
    $sql = "INSERT INTO " . TBL_MANORS . " (
              username,
              password,
              firstName,
              lastName,
              joinDate,
              gender,
              favoriteGenre,
              emailAddress,
              otherInterests
            ) VALUES (
              :username,
              password(:password),
              :firstName,
              :lastName,
              :joinDate,
              :gender,
              :favoriteGenre,
              :emailAddress,
              :otherInterests
            )";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":username", $this->data["username"], PDO::PARAM_STR );
      $st->bindValue( ":password", $this->data["password"], PDO::PARAM_STR );
      $st->bindValue( ":firstName", $this->data["firstName"], PDO::PARAM_STR );
      $st->bindValue( ":lastName", $this->data["lastName"], PDO::PARAM_STR );
      $st->bindValue( ":joinDate", $this->data["joinDate"], PDO::PARAM_STR );
      $st->bindValue( ":gender", $this->data["gender"], PDO::PARAM_STR );
      $st->bindValue( ":favoriteGenre", $this->data["favoriteGenre"], PDO::PARAM_STR );
      $st->bindValue( ":emailAddress", $this->data["emailAddress"], PDO::PARAM_STR );
      $st->bindValue( ":otherInterests", $this->data["otherInterests"], PDO::PARAM_STR );
      $st->execute();
      parent::disconnect( $conn );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }

  public function update() {
    $conn = parent::connect();
    $passwordSql = $this->data["password"] ? "password = password(:password)," : "";
    $sql = "UPDATE " . TBL_MANORS . " SET
              username = :username,
              $passwordSql
              firstName = :firstName,
              lastName = :lastName,
              joinDate = :joinDate,
              gender = :gender,
              favoriteGenre = :favoriteGenre,
              emailAddress = :emailAddress,
              otherInterests = :otherInterests
            WHERE id = :id";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":id", $this->data["id"], PDO::PARAM_INT );
      $st->bindValue( ":username", $this->data["username"], PDO::PARAM_STR );
      if ( $this->data["password"] ) $st->bindValue( ":password", $this->data["password"], PDO::PARAM_STR );
      $st->bindValue( ":firstName", $this->data["firstName"], PDO::PARAM_STR );
      $st->bindValue( ":lastName", $this->data["lastName"], PDO::PARAM_STR );
      $st->bindValue( ":joinDate", $this->data["joinDate"], PDO::PARAM_STR );
      $st->bindValue( ":gender", $this->data["gender"], PDO::PARAM_STR );
      $st->bindValue( ":favoriteGenre", $this->data["favoriteGenre"], PDO::PARAM_STR );
      $st->bindValue( ":emailAddress", $this->data["emailAddress"], PDO::PARAM_STR );
      $st->bindValue( ":otherInterests", $this->data["otherInterests"], PDO::PARAM_STR );
      $st->execute();
      parent::disconnect( $conn );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }
  
  public function delete() {
    $conn = parent::connect();
    $sql = "DELETE FROM " . TBL_MANORS . " WHERE id = :id";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":id", $this->data["id"], PDO::PARAM_INT );
      $st->execute();
      parent::disconnect( $conn );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }

  public function authenticate() {
    $conn = parent::connect();
    $sql = "SELECT * FROM " . TBL_MANORS . " WHERE username = :username AND password = password(:password)";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":username", $this->data["username"], PDO::PARAM_STR );
      $st->bindValue( ":password", $this->data["password"], PDO::PARAM_STR );
      $st->execute();
      $row = $st->fetch();
      parent::disconnect( $conn );
      if ( $row ) return new Member( $row );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }

}

?>
