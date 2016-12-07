<?php

require_once( "./common.inc.php" );
require_once( "../config.php" );
require_once( "classes/Member.class.php" );

// Manors
$pageData->title = "Manors";

// $latest = portfolioItem::showManorsItem(4);

$start = isset( $_GET["start"] ) ? (int)$_GET["start"] : 0;
$order = isset( $_GET["order"] ) ? preg_replace( "/[^ a-zA-Z]/", "", $_GET["order"] ) : "title";
list( $members, $totalRows ) = Member::getMembers( $start, PAGE_SIZE, $order );


?>

    <h2>Displaying members <?php echo $start + 1 ?> - <?php echo min( $start +  PAGE_SIZE, $totalRows ) ?> of <?php echo $totalRows ?></h2>

    <table cellspacing="0" style="width: 30em; border: 1px solid #666;">
      <tr>
        <th><?php if ( $order != "title" ) { ?><a href="view_members.php?order=title"><?php } ?>Title<?php if ( $order != "title" ) { ?></a><?php } ?></th>
        <th><?php if ( $order != "address" ) { ?><a href="view_members.php?order=address"><?php } ?>Address<?php if ( $order != "address" ) { ?></a><?php } ?></th>
        <th><?php if ( $order != "function" ) { ?><a href="view_members.php?order=function"><?php } ?>Function<?php if ( $order != "function" ) { ?></a><?php } ?></th>
      </tr>
<?php
$rowCount = 0;

foreach ( $members as $member ) {
  $rowCount++;
?>
      <tr<?php if ( $rowCount % 2 == 0 ) echo ' class="alt"' ?>>
        <td><a href="view_member.php?manor_id=<?php echo $member->getValueEncoded( "manor_id" ) ?>&amp;start=<?php echo $start ?>&amp;order=<?php echo $order ?>"><?php echo $member->getValueEncoded( "manor_id" ) ?></a></td>
        <td><?php echo $member->getValueEncoded( "title" ) ?></td>
        <td><?php echo $member->getValueEncoded( "latitude" ) & $member->getValueEncoded( "longtitude" )?></td>
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