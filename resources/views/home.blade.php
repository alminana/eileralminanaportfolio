@extends('main_layouts.master')

@section('title', 'MyBlog | Home')

@section('content')

<div id="service" class="colorlib-blog">
    <div class="container">
        <div class="row">
            <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="position-relative d-inline text-primary ps-4">All Projects</h1>
                <h1 class="mt-2">List of Finish Projects</h1>
            </div>
            <div class="col-md-9 posts-col">

            @forelse($posts as $post)

            <div class="block-21 d-flex animate-box post">
                <a 
                href="{{ route('posts.show', $post) }}" 
                class="blog-img" 
                style="background-image: url({{ asset('storage/' . $post->image->path. '')  }});"></a>
                {{-- <div class="text">
                   <h3 class="heading"><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h3>
                   <p class="excerpt">{{ $post->excerpt }}</p>
                   <div class="meta">
                       <div><a class='date' href="#"><span class="icon-calendar"></span>  {{ $post->created_at->diffForHumans() }}</a></div>
                       <div><a href="#"><span class="icon-user2"></span> {{ $post->author->name }}</a></div>
                        <div class="comments-count">
                            <a href="{{ route('posts.show', $post) }}#post-comments">
                                <span class="icon-chat"></span> {{ $post->comments_count }}
                            </a>
                        </div>
                   </div>
                </div> --}}
            </div> 
            <div>
                <h3 class="heading"><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h3>
                <div class="text" style="display: flex;  ;
                font-size: 20px;
                margin-right: 10px; margin- ">
                   &nbsp; <div><a class='date' href="#"><span class="icon-calendar"></span>  {{ $post->created_at->diffForHumans() }}</a></div>
                    &nbsp; <div><a href="#"><span class="icon-user2"></span> {{ $post->author->name }}</a></div>
                    &nbsp; <div class="comments-count">
                         <a href="{{ route('posts.show', $post) }}#post-comments">
                             <span class="icon-chat"></span> {{ $post->comments_count }}
                         </a>
                     </div>
                </div>
                <br>
            </div>

            @empty
                <p class='lead'>There are no posts to show.</p>
            @endforelse
            
            {{ $posts->links() }}

             </div>

            <!-- SIDEBAR: start -->
            <div class="col-md-3 animate-box">
                <div class="sidebar">
                    
                    <x-blog.side-categories :categories="$categories"/>

                    <x-blog.side-recent-posts :recentPosts="$recent_posts"/>

                    <x-blog.side-tags :tags="$tags"/>
                    
                </div>
            </div>
        </div>
    </div>

      <!-- Tools -->
      <div id="tools" class="container logo-slider">
        <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="position-relative d-inline text-primary ps-4">My Tools</h1>
            <h2 class="mt-2">These are the tools im using for the future Projects</h2>
        </div>
        <div class="logo-slide-track">
            <div class="slide">
                <img style="width:auto; height:100px;" src="{{{asset('template2/img/vue.png')}}}" alt="" />
            </div>
            <div class="slide">
                <img style="width:auto; height:100px;" src="{{{asset('template2/img/git.png')}}}" alt="" />
            </div>
            <div class="slide">
                <img style="width:auto; height:100px;" src="{{{asset('template2/img/githu.png')}}}" alt="" />
            </div>
            <div class="slide">
                <img style="width:auto; height:100px;" src="{{{asset('template2/img/html.png')}}}" alt="" />
            </div>
            <div class="slide">
                <img style="width:auto; height:100px;" src="{{{asset('template2/img/laravel.png')}}}" alt="" />
            </div>
            <div class="slide">
                <img style="width:auto; height:100px;" src="{{{asset('template2/img/linux.png')}}}" alt="" />
            </div>
            <div class="slide">
                <img style="width:auto; height:100px;" src="{{{asset('template2/img/photoshop.png')}}}" alt="" />
            </div>
            <div class="slide">
                <img style="width:auto; height:100px;" src="{{{asset('template2/img/scss.png')}}}" alt="" />
            </div>
            <div class="slide">
                <img style="width:auto; height:100px;" src="{{{asset('template2/img/son.png')}}}" alt="" />
            </div>
            <div class="slide">
                <img style="width:auto; height:100px;" src="{{{asset('template2/img/wordpress.png')}}}" alt="" />
            </div>
            <div class="slide">
                <img style="width:auto; height:100px;" src="{{{asset('template2/img/php.png')}}}" alt="" />
            </div>
            <div class="slide">
                <img style="width:auto; height:100px;" src="{{{asset('template2/img/jira.png')}}}" alt="" />
            </div>
            <div class="slide">
                <img style="width:auto; height:100px;" src="{{{asset('template2/img/node.png')}}}" alt="" />
            </div>
        </div>
    </div>
    <!-- Tools -->

    {{-- contact --}}
    <div class="colorlib-contact" id="contact">
        <div class="container">
            <div class="row row-pb-md">
                <div class="col-md-12 animate-box">
                    <h2>Contact Information</h2>
                    <div class="row">
                        <div class="col-md-12">
                            @foreach($information as $informations)
                            <div class="contact-info-wrap-flex">
                                <div class="con-info">
                                    <p><span><i class="icon-location-2"></i></span>{{$informations->address}}</p>
                                </div>
                                <div class="con-info">
                                    <p><span><i class="icon-phone3"></i></span> <a href="{{$informations->mobile}}">{{$informations->mobile}}</a></p>
                                </div>
                                <div class="con-info">
                                    <p><span><i class="icon-paperplane"></i></span> <a href="mailto:info@yoursite.com">{{$informations->email}}</a></p>
                                </div>
                                <div class="con-info">
                                    <p><span><i class="icon-globe"></i></span> <a href="{{$informations->website}}">{{$informations->website}}</a></p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div id="contact" class="row">
                <div class="col-md-12">
                    <h2>Message Us</h2>
                </div>

                <div class="col-md-12">
                    <form onsubmit="{{route('home')}}" method="POST">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-6">
                                <x-blog.form.input value='{{ old("first_name") }}' placeholder='Your Firstname' required name="first_name" />
                                <small class='error text-danger first_name'></small>
                            </div>
                            <br>
                            <div class="col-md-6">
                                <x-blog.form.input value='{{ old("last_name") }}' placeholder='Your Lastname' required name="last_name" />
                                <small class='error text-danger last_name'></small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <x-blog.form.input value='{{ old("email") }}' placeholder='Your Email' type='email'  required name="email" />
                                <small class='error text-danger email'></small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <x-blog.form.input value='{{ old("subject") }}'  name="subject"  placeholder='Your Subject' />
                                <small class='error text-danger subject'></small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <x-blog.form.textarea value='{{ old("message") }}' placeholder='What you want to tell us.' required name="message" />
                                <small class='error text-danger message'></small>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary send-message-btn">
                        </div>
                    </form>

                    <x-blog.message :status="'success'" />
                    
                </div>
                {{-- <div class="col-md-6">
                    <div id="map" class="colorlib-map"></div>
                </div> --}}
            </div>
        </div>
    </div>
    {{-- contact --}}
</div>

@endsection
