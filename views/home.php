<?php
//include_once "classes/Portfolio_Item.class.php";

// home sweet home
$pageData->title = "Home";

// $latest = portfolioItem::showManorsItem(4);

return "                
                <section>    
                    <h2>Aarhus 2017</h2>

                    <p>Old manors in new perspective</a>
                    </p>

                </section>

                <section>
                    <h2>Latest tours</h2>
                    
                    $latest
                    
                    <p><a href=\"index.php?page=tours\">See more</a></p>
                </section>
                
                <section> 
                
                    <h2>References</h2>

                    <p>Recently took part in one tours. 
                    In the future we are planning to take part in new tours again.
                     <a href=\"h/index.php?page=_\">Lars &amp; Peter</a>
                    </p>

                </section>
";
?>