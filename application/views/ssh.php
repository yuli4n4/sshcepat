<div class="container-fluid">
                <div class="row">
                        <p class="lead" align="center"> Kami menyediakan SSH Tanpa shell access </p>
                        <?php foreach($server as $ok ):?>
                        <div class="col-sm-4">
                                <div class="panel panel-primary">
                                        <div class="panel-heading"><i class="glyphicon glyphicon-th-list"></i> SSH Server <?php echo $ok['ServerName']; ?></div>
                                        <div class="panel-body" style="height:120px;">
                                                <table class="table table-condensed">
							<tbody>
		<tr><td>Hostname/Ip</td><td>:</td><td><?php echo $ok['HostName']; ?></td></tr>
		<tr><td>Location</td><td>:</td><td><?php echo $ok['Location']; ?></td></tr>
		<tr><td>Limit/Acc</td><td>:</td><td><?php echo $ok['MaxUser']; ?> / Day</td></tr>
							</tbody>
						</table>
					</div>
					<div class="panel-footer">
						<a class="btn btn-danger" href="<?php echo site_url('page/secure-shell-server/continent/').$ok['ServerName'].'/'.$ok['HostName'];?>">Create Account</a>
                                        </div>
                                </div>
                        </div>
                        <?php endforeach; ?>
                </div>
 </div>

