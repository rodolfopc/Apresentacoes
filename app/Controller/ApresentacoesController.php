<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ApresentacoesController
 *
 * @author Rodolfo
 */
class ApresentacoesController extends AppController{
    public $uses = array('Apresentacao');
    
    public function criar(){
       $isPost = $this->request->is('Post');
        // Se é um POST e recebemos dados do formulário
        if ($isPost && !empty($this->request->data)) {
        // Tenta salvar os dados da inscrição
        print_r ($this->request->data);
        } 
    }
    
}
