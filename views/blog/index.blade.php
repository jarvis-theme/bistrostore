<!-- ========== -->
<!-- Blog index -->
<!-- ========== -->		
<div class="row">
	<div class="span9 post">
		<h2 class="widget-title"><span>Blog</span></h2>
		<div class="sidebar-line"><span></span></div>
		@if(count(list_blog(null, @$blog_category)) > 0)	
			@foreach(list_blog(null, @$blog_category) as $value)	
			<a href="{{blog_url($value)}}"><h2>{{$value->judul}}</h2></a>
			<cite title><strong>{{date("d M Y", strtotime($value->updated_at))}}</strong></cite><br>
			{{short_description($value->isi,350)}}
			<p><a href="{{blog_url($value)}}"}}>Baca Selengkapnya →</a></p>
			@endforeach	
			
			{{list_blog(null,@$blog_category)->links()}}	
        @else 	
        <article style="font-style:italic; text-align:center;">
            Blog tidak ditemukan.
        </article>
        @endif	
	</div>

	<div class="span3 sidebar">
		<div class="widget">
			<h2 class="widget-title"><span>Blog Category</span></h2>
			<div class="sidebar-line"><span></span></div>
			<ul class="nav nav-list bs-docs-sidenav">
				@foreach(list_blog_category() as $value)
				<li><a href="{{blog_category_url($value)}}">{{$value->nama}}</a></li>
				@endforeach
			</ul>
		</div>
	</div>
</div>