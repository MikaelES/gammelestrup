<?php

// Once upon a time...
return "<!doctype html>
<html lang=\"en\">
<head>
<meta charset=\"utf-8\">
<title>$pageData->title - Duke Denver Film</title>
<meta name=\"keywords\" content=\"$pageData->keywords\"/>
<meta name=\"description\" content=\"$pageData->description\"/>
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">

$pageData->css

<!-- additional style -->
$pageData->embeddedStyle

<!-- html5shiv.js - Get the styling of new HTML5 elements to work in Internet Explorer prior to version 9 -->
<!-- respond.min.js - IE8 and below will understand min-width and max-width media queries and render the styles accordingly -->
<!--[if lt IE 9]>
    <script src=\"js/html5shiv.js\"></script>
    <script src=\"js/respond.min.js\"></script>
<![endif]-->
</head>
<body>
    
    $pageData->analytics
    
    <!-- ====|   START PAGE   |==== -->
    <div class=\"page\">
    
        <!-- ====|   START MASTHEAD   |==== -->
        <header class=\"masthead\" role=\"banner\">
        
        $pageData->navigation
        
        $pageData->banner
        
        </header>
        <!-- end masthead -->
        
        <!-- ====|   START CONTAINER   |==== -->
        <div class=\"container clearfix\">

        <!-- ====|   START MAIN   |==== --> 
        <main role=\"main\">

            <!-- ====|   ARTICLE   |==== -->
            <article>
             
             $pageData->content
             
            </article>
            <!-- end article -->

        </main>
        <!-- end main -->
        
        <!-- ====|   SIDEBAR   |==== -->
        <div class=\"sidebar\">
        
        $pageData->sidebar    

        </div>
        <!-- end sidebar -->
        
        </div>
        <!-- end container -->
        
        $pageData->footer
        
    </div>
    <!-- end page -->
    
    $pageData->script
</body>
</html>";

// end of story
?>        