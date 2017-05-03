	<div class="container-fluid">
		<div class="row">
			<p class="lead" align="center"> Kami menyediakan SSH Tanpa shell access </p>
			<?php foreach($benua as $ok ):?>
			<div class="col-sm-4">
				<div class="panel panel-primary">
					<div class="panel-heading"><i class="glyphicon glyphicon-th-list"></i> SSH Server In <?php echo $ok['Country']; ?></div>
					<div class="panel-body" style="height:120px;">
						Click to Select: <br/>
						<a class="btn btn-danger" href="<?php echo site_url('page/secure-shell-server/continent/').$ok['Cid'].'/'.$ok['Country'];?>">Select In <?php echo $ok['Country']?></a>
					</div>
					<div class="panel-footer">
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
