<?
echo $this->Form->create('imagens', 
array('action' => 'upload','type' => 'file'));
echo $this->Form->input('arquivos.', array('type' => 'file', 'multiple')); 
echo $this->Form->end('Enviar');