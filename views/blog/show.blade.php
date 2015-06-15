<div class="row">
	<div class="span9 post">
		<h2 class="widget-title"><span>Blog</span></h2>
		<div class="sidebar-line"><span></span></div>
		<h2>{{$detailblog->judul}}</h2>
		<cite title>{{date("d M Y", strtotime($detailblog->updated_at))}}</cite>
		{{$detailblog->isi}}

		<div class="span12">
			{{$fbscript}}
			{{$fbcomment}}
		</div>
	</div>

	<div class="span3 sidebar">
		<div class="widget">
			<h2 class="widget-title"><span>Blog Category</span></h2>
			<div class="sidebar-line"><span></span></div>
			<ul class="nav nav-list bs-docs-sidenav">
			@foreach(list_blog_category() as $key=>$value)
				<li><a href="{{blog_category_url($value)}}">{{$value->nama}}</a></li>
			@endforeach
			</ul>
		</div>
	</div>
</div>