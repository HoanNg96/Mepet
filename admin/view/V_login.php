<?php
include('includes/header.php');
?>

	
<div class="row justify-content-center container-fluid">

<div class="col-xl-10 col-lg-12 col-md-9">

	<div class="card o-hidden border-0 shadow-lg my-5">
		<div class="card-body p-0">
				<!-- Nested Row within Card Body -->
			<div class="row ">
				<div class="col-lg-4 d-none d-lg-block bg-login-image"></div>
					<div class="col-lg-8">
						<div class="p-5">
							<div class="text-center">
								<h1 class="h4 text-gray-900 mb-4">Welcome Administrator!</h1>
							</div>
							<form class="user" action="?controller=login" method="POST">
								
								<div class="row mt-5">
									<h5 class="text col-md-3">Tài khoản</h5>
									<input type="text" name="username" class="form-control col-md-6" value="<?php echo (isset($username))?$username:'' ?>">
								</div>
								<div class="row mt-1">
								<?php if (isset($error['username'])) {?>
									<p class="text-danger"><?php echo $error['username'] ?></p>			
								<?php } ?>
								</div>
								<div class="row mt-5">
									<h5 class="text col-md-3">Mật khẩu</h5>
									<input type="password" name="password" class="form-control col-md-6" value="<?php echo (isset($password))?$password:'' ?>">
								</div>
								<div class="row mt-1">
								<?php if (isset($error['password'])) {?>
									<p class="text-danger"><?php echo $error['password'] ?></p>			
								<?php } ?>
								</div>
								<div class="row mt-5">
									<button type="submit" class="col-md-3 btn btn-info m-auto" name="btn_login">Đăng nhập</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
	
<?php
include('includes/scripts.php'); 
?>