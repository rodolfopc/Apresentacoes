<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Apresentacao
 *
 * @author Rodolfo
 */
class Apresentacao extends AppModel{
    public $useTable = 'apresentacoes';
    //public $hasMany = array('Tag');
    
    public $order = array('nome' => 'ASC');
    public $cacheQueries = true;
    public $hasMany = array('Imagem','Tag');
    
}