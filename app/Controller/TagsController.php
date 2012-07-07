<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TagsController
 *
 * @author Rodolfo
 */
class TagsController {
   public function inserir(){
              $isPost = $this->request->is('Post');
        // Se é um POST e recebemos dados do formulário
        if ($isPost && !empty($this->request->data)) {
        // Tenta salvar os dados da inscrição
        print_r ($this->request->data);
        }
        
   }
}
