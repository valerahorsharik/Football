<?php

namespace core;


class Controller {
   
    /**
     * Title of the page
     * 
     * @var string
     */
    protected $title = "Main Page";
    
    /**
     *
     * Path to the header of the page
     * 
     * @var string
     */
    protected $header = "layouts/header";
    
    /**
     *
     * Path to the main content of the page
     * 
     * @var string
     */
    protected $view = '';
    
    /**
     *
     * Path to the footer of the page
     * 
     * @var string
     */
    protected $footer = "layouts/footer";
    
    public function __construct() {
        
    }
    
    /**
     * 
     * Display $view with $data
     * 
     * @param string $view
     * @param array $data
     * 
     * @return void
     */
    protected function display($view,$data){
        include_once "views/{$this->header}.php";
        include_once "views/{$view}.php";
        include_once "views/{$this->footer}.php";
    }
    
    /**
     * 
     * Checking if $path is a real file.
     * 
     * @param string $path
     * 
     * @return bool
     */
    protected function checkPath($path) {
        if (!is_file("views/{$path}.php")){
            $this->notFound("views/{$path}.php");
            return false;
        }
        return true;
    }
    /**
     * 
     * Set title of the current page.
     * 
     * @param string $title
     * 
     * @return void
     */
    protected function setPageTitle($title){
        $this->title = $title;
    }
    
    /**
     * 
     * Set a new path for the header
     * 
     * @param string $viewPath
     * 
     * @return void
     */
    protected function setView($viewPath){
        if ($this->checkPath($viewPath)){
            $this->view = $viewPath;
        }
    }
    
    /**
     * 
     * Set a new path for the header
     * 
     * @param string $headerPath
     * 
     * @return void
     */
    protected function setHeader($headerPath) {
        if ($this->checkPath($headerPath)){
            $this->header = $headerPath;
        }
    }
    
    /**
     * 
     * Set a new path for the footer
     * 
     * @param string $footerPath
     * 
     * @return void
     */
    protected function setFooter($footerPath) {
        if($this->checkPath($footerPath)){
            $this->footer = $footerPath;
        }
    }
    
    /**
     * Display error message, that source isnt exist
     * 
     * @param string $source
     * 
     * @return void
     */
    protected function notFound($source) {
        include_once "views/404.php";
    }
}
