<?php
namespace App\Controllers;

class BaseController {
    
    /**
     * Template to render
     * @var string $layout
     */
    protected $layout = 'app';

    /**
     * Before route HOOK
     * @param \Base $f3
     */
    public function beforeroute($f3) 
    {
      
    }

    /**
     * After route HOOK
     * @param \Base $f3
     */
    public function afterroute($f3) 
    {
      // Render HTML layout
		  echo \Template::instance()->render('layouts'.DS.$this->getLayout().'.html');
    }
    
    public function home($f3) 
    {
      $f3->set('inc', 'home');
    }

    public function error($f3)
    {
        var_dump($f3->get('ERROR'));die();
    }

    /**
     * @return string
     */
    public function getLayout()
    {
      return $this->layout;
    }

    /**
     * @param string $layout
     */
    public function setLayout($layout)
    {
      $this->layout = $layout;
    }

}