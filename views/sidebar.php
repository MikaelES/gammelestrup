<?php 

if (isset($_POST['subscribe'])) {
    //this code runs if form was submitted
    $output = subscribe(); 
} elseif ($fileToLoad === "home") {
    //this runs if form was NOT submitted
    $output = "<aside role=\"complementary\" class=\"mod\">
                <h2>Our showreel</h2>
                  <iframe height=\"250\" src=\"https://www.youtube.com/embed/uB-1ZZ2ilAQ\" frameborder=\"0\" allowfullscreen></iframe>  
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
    $output = "<div><p>Cvr nummer: 35546286<br />Telefon: <a href=\"tel:+4526585981\">+45 2658 5981</a><br />E-mail: <a href=\"mailto:info@dukedenverfilm.dk\">info@dukedenverfilm.dk</a></p>
 
                 <p><br />Find us at
               Godsbanen,<br />
             Skovgaarsgade 3<br />
               8000 Aarhus C<br /></p><br /></div>
               
               <iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2222.183746591283!2d10.192521815946161!3d56.153927580662554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x464c3f932896e263%3A0x47cb306d576a605!2sSkovgaardsgade+3%2C+8000+Aarhus!5e0!3m2!1sen!2sdk!4v1464272516687\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>";
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