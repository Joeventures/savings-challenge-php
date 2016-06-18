<div class="container">
	<div class="jumbotron">
		<h1>Welcome!</h1>
		<p>Save money for peace of mind. Make it a weekly thing.</p>
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active">
				<a href="#login" aria-controls="login" role="tab" data-toggle="tab">
					Login
				</a>
			</li>
			<li role="presentation">
				<a href="#new" aria-controls="new" role="tab" data-toggle="tab">
					New Account
				</a>
			</li>
		</ul>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="login">
				<?php
				echo form_open('login/go');
				echo form_input(array(
					'name'  => 'email',
					'id'    => 'email',
					'class' => 'form-control',
					'placeholder' => 'Email Address'
				));
				echo form_password(array(
					'name'  => 'password',
					'id'    => 'password',
					'class' => 'form-control',
					'placeholder' => 'Password'
				));
				echo form_submit('login', 'Login', array('class' => 'btn btn-default'));
				echo form_close();
				?>
			</div>
			<div role="tabpanel" class="tab-pane" id="new">
				<?php
				echo form_open('login/newacct');
				echo form_input(array(
					'name'   => 'name',
					'id'     => 'name',
					'class'  => 'form-control',
					'placeholder' => 'Your Name'
				));
				echo form_input(array(
					'name'  => 'email',
					'id'    => 'email',
					'class' => 'form-control',
					'placeholder' => 'Email Address'
				));
				echo form_password(array(
					'name'  => 'password',
					'id'    => 'password',
					'class' => 'form-control',
					'placeholder' => 'Password'
				));
				echo form_submit('newacct', 'Sign Up', array('class' => 'btn btn-default'));
				echo form_close();
				?>
			</div>
		</div>
	</div>
</div>