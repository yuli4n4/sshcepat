<section class="team" id="about-us"><div class="container-fluid" style="margin:15px;">
                <div class="row">
			<?php $i = 0; ?>
                        <?php foreach($server as $ok ):?>
				<?php $i=$i+1; ?>
                        <div class="col-sm-4">
				<div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                                <div class="media">
					<div class="pull-left">
						<a href="#"><img class="media-object" src="<?php echo base_url();?>images/man.jpg" alt="145x137" height="145" width="137"></a>
					</div>
                                        <div class="media-body">
						<h4><?php echo $ok['ServerName'];?></h4>
						<h5>Server Service</h5>
							<ul class="tag clearfix">
							<li class="btns"><a href="#">SSH</a></li>
							<li class="btns"><a href="#">VPN</a></li>
							<li class="btns"><a href="#">Squid</a></li>
							</ul>
					</div>
                                         <table class="table table-condensed">
					<tbody>
			<tr><td>Hostname/Ip</td><td>:</td><td><?php echo $ok['HostName']; ?></td></tr>
			<tr><td>Location</td><td>:</td><td><?php echo $ok['Location']; ?></td></tr>
			<tr><td>Limit/Acc</td><td>:</td><td><?php echo $ok['MaxUser']; ?> / Day</td></tr>
					</tbody>
					</table>
				<a class="btn btn-danger pull-right" href="<?php echo site_url('page/secure-shell-server/continent/').$ok['ServerName'].'/'.$ok['HostName'];?>">Create Account</a>
				</div>
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
                </div>
</div></section>

