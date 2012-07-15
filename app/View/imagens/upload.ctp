<?php
    $count=0;
    echo $this->Html->div('caixatags');
    echo $this->Form->create('tags', 
         array('action' => 'salvar'));
    $tagids='';
    foreach($imagens as $k1){
        $tagids = $k1['imagens']['id'].'_'.$tagids;
        $id = $k1['imagens']['id'];
        echo $this->Html->div('tag');
        echo $this->Html->image("../imagens_files/".$imagens[$count]['imagens']['nome'], array('class'=>'imagem'));
        echo $this->Form->textarea("tags".$id."", array('class'=>'tags','id' => "tag".$id."",'onBlur'=>"tratarTags('".$id."');", 'onkeypress'=>"OnEnter(evt,'".$id."');"));
        echo $this->Form->input("campo_tags".$id."",array('id'=>"campo_tags".$id."",'type'=>'hidden'));
        echo $this->Html->div("tagscaixa".$id."",'',array('id'=>"tags".$id."",));
        echo "</div>";
        $count++;
        }
    echo $this->Form->input('tagids',array('value'=>$tagids,'type'=>'hidden'));
    echo $this->Form->input('enviar',array('type'=>'submit'));
    echo $this->Form->end();
    echo "</div>";
