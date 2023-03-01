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
            <div class="col-md-9 ">
                <main class="my-5">
                    <div class="container">
                   
                
                        <div class="row">
                            
                    @forelse($posts as $post)
                          <div class="col-lg-4 col-md-12 mb-4">
                            <div class="card">
                              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                <a href="{{ route('posts.show', $post) }}"><img style='width: 100%; height:100%;' src="/storage/{{ $post->image ? $post->image->path : 'placeholders/thumbnail_placeholder.svg' }}" class='img-responsive' alt="Post Thumbnail">
                                </a>
                                <a href="#!">
                                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                              </div>
                              <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text" style="text-align: justify">
                                    {{ $post->excerpt }}
                                </p>
                                <div  style="display:flex; font-size:20px; text-align: center">
                                    <div style="text-align: left"><i class="fa-solid fa-calendar"></i>
                                        <a class='date' href="#"><span class="icon-calendar">
                                            </span>  {{ $post->created_at->diffForHumans() }}
                                        </a>
                                    </div>
                                    &nbsp;&nbsp;&nbsp;<div><a href="#"><span class="icon-user2"><i class="fa-solid fa-user"></i>{{ $post->author->name }}</span></a></div>
                                    &nbsp;&nbsp;<div class="comments-count"><i class="fa-solid fa-comment"></i>
                                         <a href="{{ route('posts.show', $post) }}#post-comments">
                                             <span class="icon-chat"></span>Comment {{ $post->comments_count }}
                                         </a>
                                     </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          @empty
                          <p class='lead'>There are no posts to show.</p>
                         @endforelse
                        </div>
                
                     
                      </section>
                      <!--Section: Content-->
                
                      <!-- Pagination -->
                      <nav class="my-4" aria-label="...">
                        <ul class="pagination pagination-circle justify-content-center">
                            {{ $posts->links() }}
                        </ul>
                      </nav>
                    </div>
                  </main>
             </div>
          
            <div class="col-md-3 animate-box">
                <div class="sidebar">
                    <br><br><br>
                    <x-blog.side-categories :categories="$categories"/>

                    <x-blog.side-recent-posts :recentPosts="$recent_posts"/>

                    <x-blog.side-tags :tags="$tags"/>
                    
                </div>
            </div>
        </div>
    </div>

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
    </div> --}}


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
