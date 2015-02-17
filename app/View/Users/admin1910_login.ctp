
	<div class="header">Bem vindo</div>
	<?php echo $this->Form->create('User', array('class' => 'form-signin'));?>
    <div class="body bg-gray">
    	<?php echo $this->Session->flash(); ?>
        <?php 
	        echo $this->Form->input('username', array('label' => false, 'placeholder' => 'Usuario'));
	        echo $this->Form->input('password', array('label' => false, 'placeholder' => 'Senha'));
	    ?>
    </div>
    <div class="footer"> 
		<?php echo $this->Form->button('Entrar', array('type' => 'submit', 'class' => 'btn bg-olive btn-block')); ?>
        
        <!-- <p><a href="#">I forgot my password</a></p>
        
        <a href="register.html" class="text-center">Register a new membership</a> -->
    </div>
	<?php echo $this->Form->end();?>
