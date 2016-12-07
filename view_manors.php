<html lang="en">
<head>
<meta charset="utf-8">
<title>Home - Tidsrejser for hele familien</title>
<meta name="keywords" content="Video, Production, Video production, Story, Storytelling"/>
<meta name="description" content="Your story in focus"/>
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php

require_once( "common.inc.php" );
require_once( "../config.php" );
require_once( "classes/Member.class.php" );

$start = isset( $_GET["start"] ) ? (int)$_GET["start"] : 0;
$order = isset( $_GET["order"] ) ? preg_replace( "/[^ a-zA-Z]/", "", $_GET["order"] ) : "title";
list( $manors, $totalRows ) = Manor::getManors( $start, PAGE_SIZE, $order );

displayPageHeader( "View manors" );

?>
    <h2>Displaying manors <?php echo $start + 1 ?> - <?php echo min( $start +  PAGE_SIZE, $totalRows ) ?> of <?php echo $totalRows ?></h2>

    <table cellspacing="0" style="width: 30em; border: 1px solid #666;">
      <tr>
        <th><?php if ( $order != "title" ) { ?><a href="view_manors.php?order=title"><?php } ?>Id<?php if ( $order != "Id" ) { ?></a><?php } ?></th>
        <th><?php if ( $order != "address" ) { ?><a href="view_manors.php?order=title"><?php } ?>Title<?php if ( $order != "title" ) { ?></a><?php } ?></th>
        <th><?php if ( $order != "address" ) { ?><a href="view_manors.php?order=address"><?php } ?>Address<?php if ( $order != "address" ) { ?></a><?php } ?></th>
        <th><?php if ( $order != "latitude" ) { ?><a href="view_manors.php?order=function"><?php } ?>Latitude and longitude<?php if ( $order != "function" ) { ?></a><?php } ?></th>
      </tr>
<?php
$rowCount = 0;

foreach ( $manors as $manor ) {
  $rowCount++;
?>
      <tr<?php if ( $rowCount % 2 == 0 ) echo 'class="alt"' ?>>
        <td><a href="view_manor.php?manor_id=<?php echo $manor->getValueEncoded( "manor_id" ) ?>&amp;start=<?php echo $start ?>&amp;order=<?php echo $order ?>"><?php echo $manor->getValueEncoded( "manor_id" ) ?></a></td>
        <td><?php echo $manor->getValueEncoded( "title" ) ?></td>
        <td><?php echo $manor->getValueEncoded( "address" ) ?></td>
        <td><?php echo $manor->getValueEncoded( "latitude" ) . " & " . $manor->getValueEncoded( "longitude" ) ?></td>
      </tr>
<?php
}
?>
    </table>

    <div style="width: 30em; margin-top: 20px; text-align: center;">
<?php if ( $start > 0 ) { ?>
      <a href="view_members.php?start=<?php echo max( $start - PAGE_SIZE, 0 ) ?>&amp;order=<?php echo $order ?>">Previous page</a>
<?php } ?>
&nbsp;
<?php if ( $start + PAGE_SIZE < $totalRows ) { ?>
      <a href="view_members.php?start=<?php echo min( $start + PAGE_SIZE, $totalRows ) ?>&amp;order=<?php echo $order ?>">Next page</a>
<?php } ?>
    </div>

<?php
displayPageFooter();
?>

