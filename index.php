<?php

// error_reporting( E_ALL );
// ini_set( "display_errors", 1 );

// decide which page we are going to show / show home page by default
if (isset($_GET['page'])) { $fileToLoad = $_GET['page']; } else { $fileToLoad = "home"; }

include_once "classes/Page_Data.class.php";
$pageData = new Page_Data();

// individual title for each page is set in the related subpage files - about.php, portfoilio.php and so on
//  for example title for home page would be $pageData->title = "Home";

// keywords
$pageData->keywords = "Video, Production, Video production, Story, Storytelling";

// page description
$pageData->description = "Your story in focus";

// necessary stylesheets
$pageData->addCSS('main_v2.0.css');
$pageData->addCSS('test.css');

// to divide current page from the rest of menu
$pageData->embeddedStyle = "<style> nav[role=navigation] a[href$='$fileToLoad'] { color: #dbdbdb; cursor: default; text-decoration: none; } </style>";

if ($fileToLoad === "home") { $pageData->embeddedStyle .= "\n<style> nav[role=navigation] li a { color: #fff; }
#all-in-all, #small-screen { background-color: #000; color: #fff; } </style>"; }  else { $pageData->embeddedStyle .= "<!-- -->"; }

// google analytics and facebook script
$pageData->analytics = include_once("views/analytics.php");

// navigation and socials
$pageData->navigation = include_once "views/navigation.php";

// banner
$pageData->banner = include_once "views/banner.php";

// content
$pageData->content = include_once "views/$fileToLoad.php";

// sidebar
$pageData->sidebar = include_once "views/sidebar.php";

// footer
$pageData->footer = include_once "views/footer.php";

// necessary scripts
$pageData->addScript('http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'); // jQ
$pageData->addScript('js/toggle.js'); // dropdown menu and so on
$pageData->addScript('js/isotope-docs.min.js'); // works in the portfolio

// let's magic begin :)
$page = include_once "templates/page.php";
echo $page;

/*

When the great man learns the Way, he follows it with diligence;
When the common man learns the Way, he follows it on occasion;
When the mean man learns the Way, he laughs out loud;
Those who do not laugh, do not learn at all.

Therefore it is said:
Who understands the Way seems foolish;
Who progresses on the Way seems to fail;
Who follows the Way seems to wander.

For the finest harmony appears plain;
The brightest truth appears coloured;
The richest character appears incomplete;
The bravest heart appears meek;
The simplest nature appears inconstant.

*/

?>