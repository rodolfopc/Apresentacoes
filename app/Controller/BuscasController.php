<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BuscasController
 *
 * @author m113346
 */
class BuscasController extends AppController{
public $helpers = array('Js');
public $components=array('RequestHandler');
    public function nova(){
        
    }
    public function avancada(){
     $this->layout = 'ajax';
    }
}

?>
