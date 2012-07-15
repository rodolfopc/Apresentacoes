<?php
echo $this->Form->create('apresentacoes', 
array('action' => 'arquivo'));
echo $this->Form->input('nome');
echo $this->Form->input('assunto');
echo $this->Form->input('autor');
echo $this->Form->input('local');
echo $this->Form->input('data', array('type' =>'date', 'class' => 'datepicker', 'dateFormat' => 'MY'));
echo $this->Form->input('tags', array('id' => 'tagapresentacao','onBlur'=>"tratarTags('apresentacao');", 'onkeypress'=>"OnEnter(evt,'apresentacao');"));
echo $this->Form->input('campo_tags',array('id'=>'campo_tagsapresentacao','type'=>'hidden'));
echo $this->Html->div('tags','',array('id'=>'tagsapresentacao'));
echo $this->Form->submit('Entrar');
echo $this->Form->end();