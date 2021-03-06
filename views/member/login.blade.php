<div class="row">
	<div class="span9 post">
		<div class="row-fluid">
			<div class="span5">
				<h2 class="widget-title"><span>New User?</span></h2>
				<div class="sidebar-line"><span></span></div>
				<p>Speed up your transaction by register your own account!!!</p>
				<a class="btn btn-general" href="{{url('member/create')}}">Register new account</a>
			</div>
			<div class="span7">
				<h2 class="widget-title"><span>Login Your Account</span></h2>
				<div class="sidebar-line"><span></span></div>
				<form class="signin-form" action="{{url('member/login')}}" method="post" enctype="multipart/form-data">
					<input class="input-block-level" name="email" type="text" placeholder="Enter your email address" id="inputEmail" required />
					<input class="input-block-level" name="password" placeholder="Enter your password" type="password" id="inputPassword" required />
					<label for="inputPassword">
						<a href="{{url('member/forget-password')}}">Forgot?</a>
					</label>
					<button class="btn btn-medium btn-general input-block-level span4" type="submit">Sign in</button>
				</form>
			</div>
		</div>
	</div>

	<div class="span3 sidebar">
		<div class="widget">
			<h2 class="widget-title"><span>User Pages</span></h2>
			<div class="sidebar-line"><span></span></div>
			<ul class="nav nav-list bs-docs-sidenav">
				<li class="active"><a href="{{url('member')}}">Login Page</a></li>
				<li><a href="{{url('member/create')}}">Register Page</a></li>
				<li><a href="{{url('member')}}">My Account</a></li>
				<li><a href="{{url('checkout')}}">Checkout</a></li>
			</ul>
		</div>
	</div>
</div>