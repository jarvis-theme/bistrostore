<!-- ========== -->
<!-- Blog index -->
<!-- ========== -->		
<div class="row">
	<div class="span9 post">
		<h2 class="widget-title"><span>Blog</span></h2>
		<div class="sidebar-line"><span></span></div>
		@foreach($data as $key=>$value)	
			<a href={{"'".URL::to("blog/".$value->slug)."'"}}><h2>{{$value->judul}}</h2></a>
			<cite title><strong>{{date("d M Y", strtotime($value->updated_at))}}</strong></cite><br>
			{{substr($value->isi,0,250)}}
			<p><a href={{"'".URL::to("blog/".$value->slug)."'"}}>Baca Selengkapnya →</a></p>
		@endforeach	
	</div>

	<div class="span3 sidebar">
		<div class="widget">
			<h2 class="widget-title"><span>Blog Category</span></h2>
			<div class="sidebar-line"><span></span></div>
			<ul class="nav nav-list bs-docs-sidenav">
			@foreach($categoryList as $key=>$value)
				<li><a href="{{URL::to('blog/category/'.generateSlug($value))}}">{{$value->nama}}</a></li>
			@endforeach
			</ul>
		</div>
	</div>
</div>