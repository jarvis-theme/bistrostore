<!-- Register Page -->
<div class="row">
	<div class="span9 post">
		<div class="row-fluid">
			<div class="span5">
				<h2 class="widget-title"><span>Have An Account?</span></h2>
				<div class="sidebar-line"><span></span></div>
				<form class="signin-form" action="{{url('member/login')}}" method="post" enctype="multipart/form-data">
					<input class="input-block-level" name="email" type="text" placeholder="Enter your email address" id="inputEmail" />
					<input class="input-block-level" name="password" placeholder="Enter your password" type="password" id="inputPassword" />
					<label for="inputPassword">
						<a href="{{url('member/forget-password')}}">Forgot?</a>
					</label>
					<button class="btn btn-medium btn-general input-block-level" type="submit">Sign in</button>
				</form>
			</div>
			<div class="span7">
				<h2 class="widget-title"><span>Register An Account</span></h2>
				<div class="sidebar-line"><span></span></div>
				{{Form::open(array('url'=>'member','method'=>'post','class'=>'register-form'))}}
					<label for="inputEmail"><span class="required">*</span> Your Personal Details</label>
					<input class="input-block-level" type="text" placeholder="* Name" id="inputname" name="nama" value="{{Input::old('nama')}}" required />
					<input class="input-block-level" placeholder="* Enter your email address" type="text" id="inputemail" name="email" value="{{Input::old('email')}}" required/>
					<input class="input-block-level" placeholder="Enter your phone number" type="text" id="inputphone" name="telp" value="{{Input::old('telp')}}" required/>
					<label for="inputEmail"><span class="required">*</span> Address Details</label>
					<input class="input-block-level" type="text" placeholder="* Enter your address" id="inputaddress" name="alamat" value="{{Input::old('alamat')}}" required/>
					<input class="input-block-level" placeholder=" Enter your post code" type="text" id="inputcode" name="kodepos" value="{{Input::old('kodepos')}}"/>
					<label for="inputEmail"><span class="required">*</span> Country / Region / State</label>
					<div style="margin-bottom: -25px;">
						{{Form::select('negara',array('' => '-- Pilih Negara --') + $negara, Input::old("negara"), array('required', "class"=>"span5", "name"=>"negara", "id"=>"negara", "data-rel"=>"chosen", "onchange"=>"searchProvinsi(this.value)"))}}
					</div>
					<br>
					<div style="margin-bottom: -25px;">
						{{Form::select('provinsi',array('' => '-- Pilih Provinsi --') + $provinsi, Input::old("provinsi"),array('required', "class"=>"span5", "name"=>"provinsi", "id"=>"provinsi", "data-rel"=>"chosen", "onchange"=>"searchKabupaten(this.value)"))}}
					</div>
					<br>
					<div>
						{{Form::select('kota',array('' => '-- Pilih Kota --') + $kota, Input::old("kota"), array('required', "class"=>"span5", "name"=>"kota", "id"=>"kota", "data-rel"=>"chosen"))}}
					</div>

					<label for="inputEmail"><span class="required">*</span> Choose Password</label>
					<input class="input-block-level" placeholder="* Enter your password" type="text" id="inputpassword" name="password" required />
					<input class="input-block-level" placeholder="* Enter your password again" type="text" id="inputpassword" name="password_confirmation" required/>
					<label class="checkbox inline">
						<input type="checkbox" id="inlineCheckbox1" value="1" name="readme" required checked > Saya telah membaca dan menyetujui&nbsp;<a href="{{url('service')}}">Persyaratan Member</a>
					</label>
					<button class="btn btn-medium btn-general input-block-level" type="submit">Register your account today!</button>
				{{Form::close()}}
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