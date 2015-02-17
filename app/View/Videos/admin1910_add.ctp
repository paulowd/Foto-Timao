<?php 
	echo $this->Form->create('Video', array('type' => 'file'));

	echo $this->Form->input('Post.status_id', array('options' => $status, 'empty' => 'Escolha um status'));
	echo $this->Form->hidden('Post.user_id', array('value' => $user['id']));
	echo $this->Form->input('Post.categoria_id', array('options' => $categorias, 'empty' => 'Escolha uma categoria'));
	echo $this->Form->input('Post.campeonato_id', array('options' => $campeonatos, 'empty' => 'Escolha um campeonato'));
	echo $this->Form->input('player_id', array('options' => $players, 'empty' => 'Escolha o player'));
	echo $this->Form->input('titulo');
	echo $this->Form->input('codigo', array('label' => 'URL do vídeo', 'type' => 'url'));
	echo $this->Form->input('Post.legenda');
	echo $this->Form->input('Post.data');

	echo $this->Form->input('Image.1.attachment', array('type' => 'file', 'label' => false));
	echo $this->Form->input('Image.1.model', array('type' => 'hidden', 'value' => 'Post'));
	
	echo $this->Form->end('Salvar');