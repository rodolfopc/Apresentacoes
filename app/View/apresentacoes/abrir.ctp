<h3>Login</h3>
<?php
echo $this->Form->create('apresentacoes', 
array('action' => 'arquivo'));
echo $this->Form->input('nome');
echo $this->Form->input('assunto');
echo $this->Form->input('autor');
echo $this->Form->input('local');
echo $this->Form->input('data', array('type' =>'date', 'class' => 'datepicker', 'dateFormat' => 'MY'));
echo $this->Form->input('tags', array('id' => 'tags'));
echo $this->Form->submit('Entrar');
echo $this->Form->end();