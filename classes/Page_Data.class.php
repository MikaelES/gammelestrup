<?php

//class declaration
class Page_Data {
    public $title = "";
    public $keywords = "";
    public $description = "";
    public $css = "";
    public $embeddedStyle = "";
    public $navigation = "";
    public $banner = "";
    public $content = "";
    public $footer = "";
    public $script = "";
    
    // method for adding CSS stylesheets
    public function addCSS( $href ){
        $this->css .= "<link href=\"css/$href\" rel=\"stylesheet\">\r\n";
    }
    
    // method for adding scripts
    public function addScript( $src ){
        $this->script .= "<script src=\"$src\"></script>\r\n";
    }
    
}

?>

