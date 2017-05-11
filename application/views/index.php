 <section id="feature" >
        <div class="container">
            <div class="row">
                <div class="features">
                    <div class="col-lg-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
				<div class="well">
					<p align="right" class="text-danger">
						Your Ip : <?php echo $_SERVER['REMOTE_ADDR'];?><br>
						Account Reset At: 00:00:01
					<p>
				</div>
                        </div>
                    </div><!--/.col-md-4-->
                </div><!--/.services-->
		<p align="center">Our SSH Account only for tunnelling protocol (port forwarding) without shell access.</p>
            </div><!--/.row-->
        </div><!--/.container-->
   </section><!--/#feature-->

<section id="services" class="service-item">
<div class="container">
		<div class="row">
			<?php foreach($benua as $name ):?>
			<div class="col-sm-6 col-md-4">
				<div class="media services-wrap wow fadeInDown">
					<h4>SSH Server <?php echo $name; ?></h4>
					<div class="pull-left">
                            			<img class="img-responsive" src="<?php echo base_url();?>images/services/services1.png">
                        		</div>
					<div class="media-body" style="height:120px;">
						Available Country: <br/>
						<?php foreach($this->WebApi->get_location(str_replace(' ','-',$name)) as $data):?>
								<?php echo '- '.$data['Country']. '<br/>'; ?>
							<?php endforeach; ?>
					</div>
					<a class="btn btn-danger" href="<?php echo site_url('page/secure-shell-server/continent/').str_replace(' ','-',$name)?>">Select In <?php echo $name;?></a>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
