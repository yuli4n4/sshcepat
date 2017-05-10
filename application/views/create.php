	<section id="about-us">
		<div class="container">
			<div class="list-group"><div class="list-group-item">
				<p style="font-family:lucida grande, tahoma, verdana, arial, sans-serif;" align="justify">
					Here we give you ssh server united states account for free for one month . Therefore , you are lucky to get it . may be useful and good use of our fast server. We always provide the best server , a virtual private server server jersey of America. The best that OpenVZ VPS server with 1GB of RAM . Equipped with a good transfer rate . All of these servers we provide for free for one month .
				</p>
			</div></div>
		</div>
	</section>
	<section id="contact-page">
		<div class="container"><div class="list-group"><div class="list-group-item">
			<div class="row contact-wrap">
				<div class="status alert alert-success" style="display: none"></div>
					<form action="<?php echo site_url('post');?>" method="POST">
						<input type="hidden" name="id" value="<?php echo $id;?>">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Username *</label>
								<input type="text" name="username" class="form-control"/>
							</div>
							<div class="form-group">
								<label>Password *</label>
								<input type="text" name="password" class="form-control"/>
							</div>
							<div class="form-group">
								<div class="response" align="center"></div>
								<table class="table table-condensed result"></table>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-info btn-sm">Create Account</button>
							</div>
						</div>
						<div class="col-sm-6">
							<ul>
								<h4>Tutorial create SSH account :</h4>
								<li>Enter your desired username and password.</li>
								<li>Press create an account and wait for the process.</li>
								<li>Copy of the manufacture of SSH.</li>
								<li>Enter into Bitvise SSH Client or in tunneling.</li>
								<li>Safely surf safely using secure shell our virtual private server.</li>
							</ul>
						</div>
					</form>
				</div>
			</div>
		</div></div>
			<div class="container"><div class="list-group"><div class="list-group-item">
				<p style="font-family:lucida grande, tahoma, verdana, arial, sans-serif;" align="justify">Welcome to the SSHGoogle.com . We provide SSH accounts for free every day . Virutal Private Server which we have very much and best . Our servers are of good quality and have a high -speed connection Here we give you ssh server united states account for free for one month . Therefore , you are lucky to get it . may be useful and good use of our fast server. We share premium virtual private server and ssh premium accounts for free for one week , with high- speed servers . We always provide the best server , a virtual private server server jersey of America. The best that OpenVZ VPS server with 1GB of RAM . Equipped with a good transfer rate . All of these servers we provide for free for one month .</p>
			</div></div></div>
	</section>
	<script>$(document).ready(function(){$('div[type="submit"]').on('click',function(){$('.alert').remove();$.ajax({type:'POST',dataType:'json',url:'<?php echo site_url("post");?>',data:$('form').serialize(),error: function(xhr,ajaxOptions,thrownError){$('#response').html(xhr);},cache:false,beforeSend:function(){$('.response').html('<img src="<?php echo base_url(); ?>images/loading.gif"\>');},success:function(s){if(s.status=='Failed'){$.each(s.result,function(x,y){$('.result').append('<div class="alert alert-danger"><tr><td>' + y + '</td>' + '</tr></div>');});$('.response').remove();return false;}$.each(s.result,function(x,y){$('.result').append('<tr><td>' + x + '</td>' + '<td>:</td>' + '<td>'+ y + '</td></tr>');});$('.response').remove();$('.btn').remove();return false;}});return false;});});</script>
