<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ImagensController
 *
 * @author Rodolfo
 */
class ImagensController extends AppController{
    public $uses = array('Imagem');
    
    
    public function inserir(){
    }
    
    public function upload(){
        $imagens=array();
        $key=0;
        foreach ($this->request->data['imagens']['arquivos'] as $k1){
      if ($this->request->data['imagens']["arquivos"][$key]["error"] > 0)
            {
            echo "Return Code: " . $this->request->data['imagens']["arquivos"][$key]["error"] . "<br />";
            }
        else
            {
            if (file_exists(WWW_ROOT ."imagens_files\\" . $this->request->data['imagens']["arquivos"][$key]["name"]))
                {
                $this->Session->setFlash($this->request->data['imagens']["arquivos"][$key]["name"] . " already exists. ");
                }
            else
                {
                move_uploaded_file($this->request->data['imagens']["arquivos"][$key]["tmp_name"],
                WWW_ROOT."imagens_files/" . $this->request->data['imagens']["arquivos"][$key]["name"]);
                
                $nomeArquivo=$this->request->data['imagens']["arquivos"][$key]["name"];
                $dados=array('id'=>'','nome'=>$nomeArquivo,'id_apresentacao'=>$this->Session->read('id'));
                if ($this->Imagem->save($dados)) {
                    }
                }
            }
            $key++;
            }
         $id_apresentacao=$this->Session->read('id');
         $imagens = $this->Imagem->query("SELECT * FROM imagens where id_apresentacao=".$id_apresentacao.";");
         $this->set('imagens',$imagens);
        }
        
        

}

?>
