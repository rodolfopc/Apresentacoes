<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Imagem
 *
 * @author Rodolfo
 */
class Imagem extends AppModel{
    public $useTable = 'imagens';
    public $belongsTo = array('Apresentacao');
    public $hasMany = array('Tag');
}

?>
