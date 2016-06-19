<div class="container">
	<div class="row">
		<?php foreach ( $this->plan->payments->result_array() as $key => $payment ) { ?>
		<?php if ( 0 == $key ) { ?>
		<div class="col-md-5">
			<?php } ?>
			<?php if ( 26 == $key ) { ?>
			<div class="col-md-5 col-md-offset-1">
				<?php } ?>
				<?php if ( 0 == $key || 26 == $key ) { ?>
				<table class="table table-striped table-condensed table-payment">
					<thead>
					<th></th>
					<th>Deposit Amount</th>
					<th>Date Completed</th>
					</thead>
					<?php } ?>
					<tr class="<?php if ($payment['complete']) echo 'success'; ?>">
						<td>
							<?php if(!$payment['complete']) { ?>
							<a class="btn btn-default btn-xs" href="<?php echo base_url('/plans/deposit/' . $payment['id']) ?>">Deposit</a>
							<?php } ?>
						</td>
						<td>$<?php echo number_format($payment['amount']); ?></td>
						<td><?php echo $payment['payment_date']; ?></td>
					</tr>
					<?php if ( 25 == $key || 51 == $key ) { ?>
				</table>
			</div>
		<?php } ?>
			<?php } ?>
		</div>
	</div>