<div class="row">
	<div class="span9 post">
		<h2 class="widget-title"><span>Blog</span></h2>
		<div class="sidebar-line"><span></span></div>
		<h2>{{$detailblog->judul}}</h2>
		<div class="row">
			<div class="span4 date">
				<cite>{{date("d M Y", strtotime($detailblog->created_at))}}</cite>
			</div>
			<div class="span5 sosmed">
				{{sosialShare(blog_url($detailblog))}}
			</div>
		</div>
		
		{{$detailblog->isi}}
		<hr>
		{{$fbscript}}
		{{fbcommentbox(blog_url($detailblog), '100%', '5', 'light')}}
	</div>

	<div class="span3 sidebar">
		@if(count(list_blog_category()) > 0)
		<div class="widget">
			<h2 class="widget-title"><span>Blog Category</span></h2>
			<div class="sidebar-line"><span></span></div>
			<ul class="nav nav-list bs-docs-sidenav">
				@foreach(list_blog_category() as $key=>$value)
				<li><a href="{{blog_category_url($value)}}">{{$value->nama}}</a></li>
				@endforeach
			</ul>
		</div>
		@endif
		<div class="widget powerup">
			{{pluginSidePowerup()}}
		</div>
	</div>
</div>