<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container" style="margin-top:100px;">
	<div class="row">
		<div class="col-lg-4"></div>
		<div class="col-lg-4">
			<form method="post" action="">
				<input type="text" class="form-control" name="A_uname" autofocus="on" placeholder="Username" /> 
				<input type="password" class="form-control" name="A_pass" placeholder="Password" />
				<input type="submit" value="Masuk" class="btn btn-primary btn-block btn-flat" />
			</form>

			<?php if(!empty($message)): ?>
			<div class="alert alert-warning alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-warning"></i> Alert!</h4>
				<?= $message; ?>
			</div>
			<?php endif;?>
		</div>
		<div class="col-lg-4"></div>
	</div>
</div>