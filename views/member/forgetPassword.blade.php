<div class="row">
	<div class="span9 post">
		<div class="row-fluid">
			<div class="span5">
				<h2 class="widget-title"><span>Login Your Account</span></h2>
				<div class="sidebar-line"><span></span></div>
				{{Form::open(array('url' => 'member/forgetpassword', 'class' => 'signin-form'))}}
					<input class="input-block-level" name="recoveryEmail" type="text" placeholder="Enter your email address" id="inputEmail" required />
					<button class="btn btn-medium btn-general input-block-level" type="submit">Reset Password</button>
				{{Form::close()}}
				<label for="inputPassword">
					<a href="{{url('member')}}">Login Here</a>
				</label>
			</div>
			<div class="span7">
				<h2 class="widget-title"><span>New User?</span></h2>
				<div class="sidebar-line"><span></span></div>
				<p>Speed up your transaction by register your own account!!!</p>
				<a class="btn btn-general" href="{{url('member/create')}}">Register new account</a>
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