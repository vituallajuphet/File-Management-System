<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->

<div id="myApp">
	<div class="page-wrapper profilepage">
		<div class="main_con">
			<div class="container-fluid">
				<div class="row page-titles">
					<div class="col-md-5 align-self-center">
						<h3 class="text-themecolor">Profile
						</h3>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
							<li class="breadcrumb-item active">Profile</li>
						</ol>
					</div>
					<div class="col-md-7 align-self-center text-right d-none d-md-block">

					</div>
				</div>
				<!-- ============================================================== -->
				<!-- Start Page Content -->
				<!-- ============================================================== -->
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-md-3">
										<div class="proCont">
											<div class="prof">
												<img src="<?=base_url("assets/images/placeholder.jpg")?>"
													style="width:90px;" class="img-circle" alt="">
											</div>
											<div class="prof protxt">
												<h3>{{user.firstname +' '+ user.lastname}} </h3>
												<p>Company: <a href="javascript:;" @click="showCompanies()">Show</a> </p>
												
											</div>
										</div>
										<div class="cont-prof">
											<ul>
												<li>Contact: <span>{{user.contact_number}}</span></li>
												<li>Email Address: <span>{{user.email_address}}</span></li>
												<li>User Type: <span>{{user.user_type}}</span></li>
												<li>Username: <span>{{user.username}}</span></li>
												<li>Password: <span>{{getpass}}</span><a @click="showpass()"
														href="javascript:;">{{(is_show_pass ? 'Hide' : 'Show')}}</a>
												</li>
											</ul>

										</div>
									</div>
									<div class="col-md-9">
										<div class="profileFields">
											<h3>Edit Profile</h3>
											<div class="profileform">
												<form class="mt-4">
													<div class="row">
														<div class="col-md-4">
															<div class="form-group">
																<label for="#">Firstname</label>
																<input type="text" required class="form-control"
																	readonly v-model="user.firstname"
																	placeholder="* First Name">
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label for="#">Lastname</label>
																<input type="text" required class="form-control"
																	readonly v-model="user.lastname"
																	placeholder="* Last Name">
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label for="#">Email Address</label>
																<input type="email" required class="form-control"
																	readonly v-model="user.email_address"
																	placeholder="* Email Address">
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label for="#">Contact Number</label>
																<input type="text" class="form-control"
																	v-model="user.contact_number" readonly
																	placeholder="* Contact Number">
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label for="#">User Type</label>
																<input type="text" v-model="user.user_type"
																	class="form-control" readonly
																	placeholder="User type">
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label for="#">Username</label>
																<input type="text" v-model="user.username"
																	class="form-control" readonly
																	placeholder="Username">
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label for="#">Password</label>
																<input type="password" v-model="user.password"
																	class="form-control" readonly
																	placeholder="Password">
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label for="#">Confirm Password</label>
																<input type="password" type="password"
																	class="form-control" readonly
																	placeholder="Confirm Password">
															</div>
														</div>
														<div class="col-md-12 text-right">
															<div class="form-group frmprofilebtn-con">
																<button type="button" class="btn btn-primary"><i
																		class="fa fa-edit"></i> Edit</button>
																<button type="submit" class="btn btn-primary"><i
																		class="fa fa-check"></i> Apply Changes</button>
															</div>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- ============================================================== -->
				<!-- End PAge Content -->
				<!-- ============================================================== -->
			</div>

		<?php 
			if(!empty($has_modal)){
				$this->load->view($has_modal);
			}
		?>
			

		</div>
</div>