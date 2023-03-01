@extends('main_layouts.master')

@section('title', $post->title . ' | MyBlog')

@section('custom_css')

	<style>
		@media (max-width: 767px) {
			.class-single .classes-img {
				align-items: center !important;
				width: 350px !important;
				height: 200px !important;
			}
		}

		@media (max-width: 1024) {
			.class-single .classes-img {
				align-items: center !important;
				width: auto !important;
				height: auto !important;
			}
		}

		.class-single .classes-img {
		
		
		}
	</style>

@endsection

@section('content')


<div class="colorlib-classes">
			<div class="container" style="align-items: center;">
				<div class="row">
					<div class="col-md-12">
						<div class="row row-pb-lg">
							<div class="col-md-12 animate-box">
								<div class="classes class-single">
									<img style='width: 100%; height:100%;' src="/storage/{{ $post->image ? $post->image->path : 'placeholders/thumbnail_placeholder.svg' }}" class='img-responsive' alt="Post Thumbnail">
									<div class="desc desc2">
										{!! $post->body !!}
									</div>
								</div>
							</div>
						</div>
						<div class="row row-pb-lg animate-box">

							<div class="col-md-12">
								<h2 class="colorlib-heading-2">{{ count($post->comments) }} Comments</h2>

								@foreach($post->comments as $comment)
								<div id="comment_{{ $comment->id }}" class="review">
							   		<div 
							   		class="user-img" 
							   		style="background-image: url({{ $comment->user->image ? asset('storage/' . $comment->user->image->path. '') : 'https://images.assetsdelivery.com/compings_v2/salamatik/salamatik1801/salamatik180100019.jpg'  }});"></div>
							   		<div class="desc">
							   			<h4>
							   				<span class="text-left">{{ $comment->user->name }}</span>
							   				<span class="text-right">{{ $comment->created_at->diffForHumans() }}</span>
							   			</h4>
							   			<p>{{ $comment->the_comment }}</p>
							   			<p class="star">
						   					<span class="text-left"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
							   			</p>
							   		</div>
							   	</div>
							   	@endforeach


							</div>
						</div>
				
						<div class="row animate-box">
							<div class="col-md-12">

								<x-blog.message :status="'success'"/>

								<h2 class="colorlib-heading-2">Say something</h2>

								@auth

								<form method="POST" action="{{ route('posts.add_comment', $post) }}">
									@csrf
									
									<div class="row form-group">
										<div class="col-md-12">
											<!-- <label for="message">Message</label> -->
											<textarea name="the_comment" id="the_comment" cols="30" rows="10" class="form-control" placeholder="Say something about us"></textarea>
										</div>
									</div>
									<div class="form-group">
										<input type="submit" value="Post Comment" class="btn btn-primary">
									</div>
								</form>

								@endauth

								@guest
								<p class="lead"><a href="{{ route('login') }}">Login </a> OR <a href="{{ route('register') }}">Register</a> to write comments</p>
								@endguest	
							</div>
						</div>
					</div>

					<!-- SIDEBAR: start -->
					{{-- <div class="col-md-3 animate-box">
						<div class="sidebar">

							<x-blog.side-categories :categories="$categories"/>

		                    <x-blog.side-recent-posts :recentPosts="$recent_posts"/>

		                    <x-blog.side-tags :tags="$tags"/>
		                    
						</div>
					</div> --}}
				</div>
			</div>	
		</div>
@endsection

@section('custom_js')

<script>
	setTimeout(() => {
		$(".global-message").fadeOut();
	}, 5000);
</script>

@endsection