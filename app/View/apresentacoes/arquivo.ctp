<?
echo $this->Form->create('imagens', 
array('action' => 'imagens','type' => 'file'));
echo $this->Form->input('arquivo', array('type' =>'file')); 
echo $this->Form->input('id', array('type'=>'hidden'));
echo $this->Form->submit('Enviar');