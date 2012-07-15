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
    
        public function inserir(){
        }
        
     public function arquivo(){
            $isPost = $this->request->is('Post');
            $data = $this->request->data['apresentacoes']['data']['month']." ".$this->request->data['apresentacoes']['data']['year'];
            $this->request->data['apresentacoes']['data'] = $data;
  
            // Se é um POST e recebemos dados do formulário
            if ($isPost && !empty($this->request->data['apresentacoes'])) {
                // Tenta salvar os dados da inscrição
                if ($this->Apresentacao->save($this->request->data['apresentacoes'])) {
                    $id_apresentacao= $this->Apresentacao->getInsertID();
                    $this->Session->write('id', $id_apresentacao);
                    $tags = $this->request->data['apresentacoes']['campo_tags'];
                    $this->loadModel('Tag');
                    $tags = explode("_", $tags);
                        foreach ($tags as $a)
                            {
                            if(!empty($a)){
                            $numtag = $this->Tag->find('count',array('conditions' => array('Tag.nome' => 'A_'.$a)));
                            if($numtag>0){
                                //recupera dados tag inserida
                                $tagsdados = $this->Tag->query("SELECT * FROM tags where nome=\"A_".$a."\";");
                                //cria variável documentos e insere lista de documentos da TAG
                                $documentos=$tagsdados[0]['tags']['documentos'];
                                //cria variável id_tag e insere a id da tag
                                $id_tag=$tagsdados[0]['tags']['id'];
                                //Define a id da TAG no modelo, para que possa ser atualizado o campo documento
                                $this->Tag->id = $id_tag;
                                //insere a ID do documento à lista de documentos
                                $documentos=$documentos."".$id_apresentacao.";";
                                //grava no banco de dados
                                $this->Tag->saveField('documentos',$documentos);
                                }
                            else{
                                $data=array('id'=>'','nome'=>"A_".$a,'documentos'=>$id_apresentacao.";");
                                $this->Tag->save($data);
                                }
                            }
                        }
                }
            }
       }
        
      public function upload(){
 
      if ($this->request->data['apresentacoes']["arquivo"]["error"] > 0)
            {
            echo "Return Code: " . $this->request->data['apresentacoes']["arquivo"]["error"] . "<br />";
            }
        else
            {
            if (file_exists(WWW_ROOT ."apresentacoes_files\\" . $this->request->data['apresentacoes']["arquivo"]["name"]))
                {
                $this->Session->setFlash($this->request->data['apresentacoes']["arquivo"]["name"] . " already exists. ");
                }
            else
                {
                move_uploaded_file($this->request->data['apresentacoes']["arquivo"]["tmp_name"],
                WWW_ROOT."apresentacoes_files/" . $this->request->data['apresentacoes']["arquivo"]["name"]);
                $this->Session->setFlash("Salvo em: " . "apresentacoes_files\\" . $this->request->data['apresentacoes']["arquivo"]["name"]);
                $this->Apresentacao->id = $this->Session->read('id');
                $nomeArquivo=$this->request->data['apresentacoes']["arquivo"]["name"];
                $this->Session->setFlash($nomeArquivo);

                $this->Apresentacao->saveField('arquivo',$nomeArquivo);
                $this->redirect('/imagens/inserir');
                }
            }
      }  
    
    
}