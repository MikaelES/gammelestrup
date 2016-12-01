<?php 

if (isset($_POST['subscribe'])) {
    //this code runs if form was submitted
    $output = subscribe(); 
} elseif ($fileToLoad === "home") {
    //this runs if form was NOT submitted
    $output = "<aside role=\"complementary\" class=\"mod\">
                <h2>Just happened</h2>
                  <iframe height=\"250\" src=\"https://www.youtube.com/embed/leq1hcocgBM\" frameborder=\"0\" allowfullscreen></iframe>  
            </aside>
            
            <aside role=\"complementary\" class=\"mod\">
                <h2>Sign up for newsletter</h2>
                <p>Get our recap e-mail once a month with all of the latest news and updates.</p>
                <form name=\"newsletter\" method=\"post\" class=\"s_form\" action=\"index.php?page=home\">

                    <fieldset>
                    <legend>Subscribe</legend>
                    <input type=\"email\" id=\"email\" name=\"email\" required>
                    <label for=\"\" placeholder=\"Your email\" alt=\"Email\"></label>
                    <input type=\"text\" id=\"name\" name=\"name\" required>
                    <label for=\"\" placeholder=\"Your Full Name\" alt=\"Full Name\"></label>
                    <input type=\"submit\" value=\"Submit\" name=\"subscribe\" id=\"button-blue\">
                    </fieldset>
                    
                </form>
                
            </aside>";
} else {
    $output = "<div><p>Cvr nummer: 35546286<br />Telefon: <a href=\"tel:+4586483001\">+45 8648 3001</a><br />E-mail: <a href=\"mailto:post@gammelestrup.dk\">post@gammelestrup.dk</a></p>
 
                 <p><br />Find us at<br />
             Randersvej 2<br />
               8963 Auning<br /></p><br /></div>
               
               <iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d8822.920731051547!2d10.344315!3d56.437949!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x18d1915b6fde2c77!2sGammel+Estrup+-+Herreg%C3%A5rdsmuseet!5e0!3m2!1sen!2sdk!4v1480600747577\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>";
}
return $output;

function subscribe() {
    $visitorName = $_POST['name'];
    $visitorEmail = $_POST['email'];
    // pseudo code
    // this code shoud save provided data to file so it can be used later to send newsletter
    $dataSaved = "ok";
        
    if ( $dataSaved ) {
        $out = "<section><p>Dear $visitorName, your email has been added to our newletter. We appreciate your interest.</p></section>";
    } else {
        $out = "Sorry, something went wrong :/";
    } 
    return $out;
}

?>