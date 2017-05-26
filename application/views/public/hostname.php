<section id="services" class="service-item">
<div class="container-fluid" style="margin:10px;"><div class="row clearfix">
<div class="well" style="margin:15px;">
<p align="justify">
This site is the best free services provider premium account VPN, OpenVPN, PPTP, Dedicated VPN, Server SSH (Secure Shell), Config SSH and other. Also you can make a free private server for own use. You can create a server 1 week, 1 month, with a username and password that You want with automatic. We use servers from a variety of data center with best quality and fast connection.
</p>
<p align="justify">
We use premium servers data center of Asia (Japan, Korea, Hong Kong, Vietnam, Malaysia, Singapore (SG), Philippines, Thailand, United Arab Emirates, India, Iran, Australia). Europe (Ukraine, Spain, Italy, Netherlands (NL), Germany, France (FR), England (UK), Russia, Romania, Turkey, Poland, Luxembourg, Finland, Sweden), American (Brazil (BR), Peru, Nicaragua, US, Mexico, Canada (CA), Columbia, Chile, Argentina, Venezuela, Ecuador, Bolivia, Costa Rica) and Africa (Egypt, Nigeria, South Africa, Sudan, Uganda, Algeria). Our server also supports OpenSSH, Dropbear, UDP, TCP, Squid (Proxies). making internet access more quickly and safely.
</p>
</div>
<div class="well" style="margin:15px;">
<div align="center">
 <select>
  <option value="all">--Select Servers Program--</option>
  <option value="openssh">Openssh</option>
  <option value="openssh">Dropbear</option>
</select>
<select>
  <option value="any">Ani Port</option>
  <option value="22">22</option>
 <option value="22">443</option>
<option value="22">143</option>
</select>
  <input type="submit" value="Filter">

</div>
</div>
<?php $i = 0; ?>
                        <?php foreach($server as $ok ):?>
                                <?php $i=$i+1; ?>

	<div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms"">
		<div class="panel panel-default">
			<div class="panel-heading" style="background-color:#373735; color:white;">
				<span class="fa fa-rocket"></span> SSH Server <?php echo $ok['ServerName'];?></div>
			<div class="panel-body" style="background-color:white;">
				<table class="table table-condensed">
					<tr><td>Server Ip</td><td>:</td><td><?php echo $ok['HostName'];?></td></tr>
					<tr><td>Location</td><td>:</td><td><?php echo $ok['Location'];?></td></tr>
					<tr><td>Protocol</td><td>:</td><td>TCP/UDP</td></tr>
					<tr><td>OpenSSH</td><td>:</td><td><?php echo $ok['OpenSSH'];?></td></tr>
					<tr><td>Dropbear</td><td>:</td><td><?php echo $ok['Dropbear'];?></td></tr>
					<tr><td>Limit Acc</td><td>:</td><td><?php echo $ok['MaxUser'];?> / Day</td></tr>
				</table><hr>
					<a class="btn btn-primary btn-sm pull-right" href="<?php echo site_url('page/secure-shell-server/continent/').$ok['Location'].'/'.$ok['Location'].'/'.$ok['ServerName'].'/'.$ok['Id'];?>">Create Account</a>
			</div>
			<div class="panel-footer" style="background-color:#373735;"></div>
		</div>
	</div>
	<?php if ($i%3 == 0) { echo
					'
					<div class="container"><div class="row"><div class="team-bar">
					<div class="first-one-arrow hidden-xs">
						<hr>
					</div>
					<div class="first-arrow hidden-xs">
						<hr> <i class="fa fa-angle-up"></i>
					</div>
					<div class="second-arrow hidden-xs">
						<hr> <i class="fa fa-angle-down"></i>
					</div>
					<div class="third-arrow hidden-xs">
						<hr> <i class="fa fa-angle-up"></i>
					</div>
					<div class="fourth-arrow hidden-xs">
						<hr> <i class="fa fa-angle-down"></i>
					</div>
					</div></div></div> <!--skill_border--> 
			';} ?>
                        <?php endforeach; ?>
                </div></div>
</section>

