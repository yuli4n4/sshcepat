	<div class="container-fluid">
		<div class="row">
			<p class="lead" align="center"> Kami menyediakan SSH Tanpa shell access </p>
			<?php foreach($benua as $ok ):?>
			<div class="col-sm-4">
				<div class="panel panel-primary">
					<div class="panel-heading"><i class="glyphicon glyphicon-th-list"></i> SSH Server In <?php echo $ok['Name']; ?></div>
					<div class="panel-body" style="height:180px;">
						Available Country: <br/>
							<?php foreach($this->WebApi->get_country($ok['Cid']) as $data):?>
								<?php echo '- '.$data['Country']. '<br/>'; ?>
							<?php endforeach; ?>
					</div>
					<div class="panel-footer">
						<a class="btn btn-danger" href="<?php echo site_url('pages/secure-shell-server/continent/').$ok['Cid']?>">Select In <?php echo $ok['Name'];?></a>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
