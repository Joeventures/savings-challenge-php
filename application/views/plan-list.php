<div class="container">
	<div class="jumbotron">
		<h1>Hey there, <?php echo $this->user->current->name; ?>!</h1>
		<p>Let's check on your progress and see how you're doing.</p>
	</div>

	<div class="lead">
		<?php if($plans->conn_id->affected_rows) { ?>
		<div class="panel panel-default">
			<div class="panel-heading">Your Savings Plans:</div>
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					<table class="table table-striped" style="margin-top: 20px;">
						<thead>
						<tr><th></th>
							<th>Goal</th>
							<th>Progress</th>
						</tr></thead>
						<tbody>
						<?php foreach($plans->result_array() as $plan) { ?>
						<tr>
							<td>
								<a class="btn btn-default" href="http://challenge.money/plans/1">Laptop</a>
							</td>
							<td>$1,500</td>
							<td style="vertical-align: middle;">
								<div class="progress" style="margin-bottom: 0;">
									<div class="progress-bar" role="progressbar" aria-valuenow="6" aria-valuemin="0" aria-valuemax="100" style="width: 6%; min-width: 2em;">
										6%
									</div>
								</div>
							</td>

						</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<?php } ?>
		<div class="panel panel-default">
			<div class="panel-heading">Create a new savings plan:</div>
			<div class="panel-body">
				<form method="post" accept-charset="UTF-8" action="<?php echo base_url('/plans/create'); ?>" id="new_plan" class="form-horizontal">
					<div class="form-group">
						<label for="plan_title" class="col-sm-5 control-label">What are you saving up for?</label>
						<div class="col-sm-4 input-group">
							<input type="text" id="plan_title" name="title" placeholder="Laptop, Car, Rainy Day, etc." class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="plan_total" class="col-sm-5 control-label">How much do you plan to save?</label>
						<div class="col-sm-4 input-group">
							<input type="text" id="plan_total" name="total" placeholder="Enter a number greater than 1378." class="form-control">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-5">
							<input type="submit" class="btn btn-default" value="Create a Plan" name="commit">
						</div>
					</div>
				</form>      </div>
		</div>
	</div>

<pre>
	<?php print_r( $plans ); ?>
</pre>
</div>