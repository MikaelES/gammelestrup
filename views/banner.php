<?php

// decide which banner we are going to show

// video is turned off
if ($fileToLoad === "home") {
    return "
        <div id=\"video-wrapper\">
        <!--     
        <video id=\"movie\" poster=\"../img/video_poster.jpg\" width=\"320\" height=\"240\" style=\"width: 100%; height: 100%;\" preload autoplay muted loop>                
        <source src=\"video/video.mp4\" type='video/mp4' />
        <source src=\"video/video.webm\" type='video/webm; codecs=\"vp8, vorbis\"' />
        <source src=\"video/video.ogv\" type='video/ogg; codecs=\"theora, vorbis\"' />
        <p>You can not see this promotional video because this browser does not support our video formats.</p>
        </video> -->
            
        </div>";
} elseif (isset($_GET['id'])) {
   // $ok = print_r($item->id);
   return " 
       <!-- $ok -->
       <div id=\"video-wrapper\">
       <img src=\"$portfolioItem->poster\" width=\"100%\" alt=\"$portfolioItem->title\" />
       </div>";
} else {
    return "
        <div id=\"video-wrapper\">
        <img src=\"img/$fileToLoad.jpg\" width=\"100%\" alt=\"$fileToLoad\" />
        </div>
";
}

?>
