<?php

// the MemberClass inherits from the DataObject class

require_once "DataObject.class.php";

class Manor extends DataObject {

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

  public static function getManors( $startRow, $numRows, $order ) {
    $conn = parent::connect();
    $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM " . TBL_MANORS . " ORDER BY $order LIMIT :startRow, :numRows";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":startRow", $startRow, PDO::PARAM_INT );
      $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
      $st->execute();
      $manors = array();
      foreach ( $st->fetchAll() as $row ) {
        $manors[] = new Manor( $row );
      }
      $st = $conn->query( "SELECT found_rows() AS totalRows" );
      $row = $st->fetch();
      parent::disconnect( $conn );
      return array( $manors, $row["totalRows"] );
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

  public function getGenderString() {
    return ( $this->data["gender"] == "f" ) ? "Female" : "Male";
  }

  public function getFavoriteGenreString() {
    return ( $this->_genres[$this->data["favoriteGenre"]] );
  }
}

?>

