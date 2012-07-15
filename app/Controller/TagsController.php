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
class TagsController extends AppController{
        public $uses = array('Tag');
        
    function inserir()
        {
        $this->layout = 'ajax';
        $campo = $this->request->data['id'];
        $tags = $this->request->data['tags'];
        if ($tags!="")
            {
            $tags = explode("_", $tags);
            $i=0;
            foreach ($tags as $a)
                {
                ?>
                <a href="#" onClick="removerTags(<?=$i?>,'<?=$campo?>');"><div class="tag_mini"><div class="t"></div><?=$a?></div></a>
                <?
                $i++;
                echo " ";
                }
            }
    }
    
    function salvar(){
        $tagids = $this->request->data['tags']['tagids'];
        $tagids = explode("_", $tagids);
        $tags = $this->request->data['tags'];
        foreach($tagids as $t){
            if($t!=''){
             $tags = $this->request->data['tags']["campo_tags".$t];  
             $tags = explode("_", $tags);
                foreach ($tags as $a)
                            {
                            if(!empty($a)){
                            $numtag = $this->Tag->find('count',array('conditions' => array('Tag.nome' => 'I_'.$a)));
                            if($numtag>0){
                                //recupera dados tag inserida
                                $tagsdados = $this->Tag->query("SELECT * FROM tags where nome=\"I_".$a."\";");
                                //cria variável documentos e insere lista de documentos da TAG
                                $documentos=$tagsdados[0]['tags']['documentos'];
                                //cria variável id_tag e insere a id da tag
                                $id_tag=$tagsdados[0]['tags']['id'];
                                //Define a id da TAG no modelo, para que possa ser atualizado o campo documento
                                $this->Tag->id = $id_tag;
                                //insere a ID do documento à lista de documentos
                                $documentos=$documentos."".$t.";";
                                //grava no banco de dados
                                $this->Tag->saveField('documentos',$documentos);
                                }
                            else{
                                $data=array('id'=>'','nome'=>"I_".$a,'documentos'=>$t.";");
                                $this->Tag->save($data);
                                }
                            }
                }
            }
            
        }
        
        /*
        
                    //$tags = $this->request->data["tags']['campo_tags'];
                    //$this->loadModel('Tag');
                    //$tags = explode("_", $tags);
                    foreach ($tags as $a)
                        {
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
        
        
        */
        
        
        
    }
    
}
