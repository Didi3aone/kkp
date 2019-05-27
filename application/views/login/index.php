<section id="wrapper">
	<div class="login-register">        
		<div class="login-box card">
			<div class="card-body">
				<form class="form-horizontal form-material" id="loginform" method="POST">
					<h3 class="box-title m-b-20"><?php echo $TITLE; ?></h3>
					<div class="form-group ">
						<div class="col-xs-12">
							<input class="form-control" name="username" id="username" type="text" placeholder="Username"> </div>
						</div>
						<div class="form-group">
							<div class="col-xs-12">
								<input class="form-control" name="password" id="password" type="password" placeholder="Password"> </div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<!-- <div class="checkbox checkbox-primary pull-left p-t-0">
										<input id="checkbox-signup" type="checkbox">
										<label for="checkbox-signup"> Remember me </label>
									</div> <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> </div> -->
								</div>
								<div class="form-group text-center m-t-20">
									<div class="col-xs-12">
										<button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light button-login" type="submit">Log In</button>
									</div>
								</div>
							</form>
							<form class="form-horizontal" id="recoverform" action="index.html">
								<div class="form-group ">
									<!-- <div class="col-xs-12">
										<h3>Recover Password</h3>
										<p class="text-muted">Enter your Email and instructions will be sent to you! </p>
									</div> -->
								</div>
								<div class="form-group ">
									<div class="col-xs-12">
										<input class="form-control" type="text" required="" placeholder="Email"> </div>
									</div>
									<div class="form-group text-center m-t-20">
										<div class="col-xs-12">
											<button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>

