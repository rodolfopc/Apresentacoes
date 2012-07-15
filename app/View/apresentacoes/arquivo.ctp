<?
echo $this->Form->create('apresentacoes', 
array('action' => 'upload','type' => 'file'));
echo $this->Form->input('arquivo', array('type' =>'file')); 
echo $this->Form->submit('Enviar');