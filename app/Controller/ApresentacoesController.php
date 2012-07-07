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
    
    
    public function abrir(){
    }
    

        public function inserir(){
            $isPost = $this->request->is('Post');
            // Se é um POST e recebemos dados do formulário
            if ($isPost && !empty($this->request->data['apresentacoes'])) {
                // Tenta salvar os dados da inscrição
                if ($this->Apresentacao->save($this->request->data['apresentacoes'])) {
                $this->set('dataSave', true);                
                }
            }
    
        }
        
     public function arquivo(){
       $data = $this->request->data['apresentacoes']['data']['month']." ".$this->request->data['apresentacoes']['data']['year'];
       $this->request->data['apresentacoes']['data'] = $data;
       $this->inserir();
       $this->set('id',$this->Apresentacao->getInsertID());
    }
        
        
}