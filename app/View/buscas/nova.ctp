<?
echo $this->Html->script('jquery',FALSE);
echo $this->Form->create('buscas',array('action'=>'resultado'));
echo $this->Form->input('termo');
echo $this->Html->div('div',null,array('id'=>'divavancada'));
echo $this->Html->link('Avançada','#',array('id'=>'linkavancada'));
echo '</div>';
echo $this->Form->submit('Buscar');
echo $this->Form->end();

echo $this->Js->get('#linkavancada')->event(
    'click',
    $this->Js->request(
        array('action' => 'avancada'),
        array('async' => true, 'update' => '#divavancada')
    )
);

