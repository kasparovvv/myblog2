@extends('layouts.master')

@section('content')

   <!--================Blog Area =================-->
   <section class="blog_area single-post-area all_post section_padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  <div class="feature-img">
                     <img class="img-fluid" src="{{$posts['image_path']}}" width="700px" height="200px" alt="">
                  </div>
                  <div class="blog_details">
                     <h2>{{$posts["title"]}}</h2>
                     <ul class="blog-info-link mt-3 mb-4">
                        <li><a href="#"><i class="far fa-user"></i>
                           @forEach($posts["phc"] as $phc)
                              {{$phc->category_name}} /
                           @endforeach
                        </a></li>
                     </ul>
                     {!! html_entity_decode($posts["content"]) !!}
                  </div>
               </div>
               <div class="navigation-top mt-5">
                  <div class="d-sm-flex justify-content-between text-center">
                     <!-- <p class="like-info"><span class="align-middle"><i class="far fa-heart"></i></span> Lily and 4
                        people like this</p> -->
                     <div class="col-sm-4 text-center my-2 my-sm-0">
                        <!-- <p class="comment-count"><span class="align-middle"><i class="far fa-comment"></i></span> 06 Comments</p> -->
                     </div>
                     <ul class="social-icons">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fab fa-behance"></i></a></li>
                     </ul>
                  </div>
                  <!-- <div class="navigation-area">
                     <div class="row">
                        <div
                           class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                           <div class="thumb">
                              <a href="#">
                                 <img class="img-fluid" src="https://technext.github.io/lifeleck/img/post/preview.png" alt="">
                              </a>
                           </div>
                           <div class="arrow">
                              <a href="#">
                                 <span class="text-white ti-arrow-left"></span>
                              </a>
                           </div>
                           <div class="detials">
                              <p>Prev Post</p>
                              <a href="#">
                                 <h4>Space The Final Frontier</h4>
                              </a>
                           </div>
                        </div>
                        <div
                           class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                           <div class="detials">
                              <p>Next Post</p>
                              <a href="#">
                                 <h4>Telescopes 101</h4>
                              </a>
                           </div>
                           <div class="arrow">
                              <a href="#">
                                 <span class="text-white ti-arrow-right"></span>
                              </a>
                           </div>
                           <div class="thumb">
                              <a href="#">
                                 <img class="img-fluid" src="https://technext.github.io/lifeleck/img/post/next.png" alt="">
                              </a>
                           </div>
                        </div>
                     </div>
                  </div> -->
               </div>
             
            </div>
            <div class="col-lg-4">
                  <div class="sidebar_widget">
                        <div class="single_sidebar_wiget search_form_widget">
                           @include('pages/search_form')
                        </div>
                        <div class="single_sidebar_wiget">
                              <div class="sidebar_tittle">
                              <h3>Categories</h3>
                              </div>
                              <div class="single_catagory_item category">
                                <ul class="list-unstyled">
                                    @forEach($categorytData as $category)
                                        <li><a href="#">{{$category["category_name"]}}</a> <span>({{$category["count"]}})</span> </li>
                                    @endforeach
                                </ul>
                              </div>
                        </div>
                        <div class="single_sidebar_wiget">
                              <div class="sidebar_tittle">
                              <h3>Popular Feeds</h3>
                              </div>
                              @forEach($popularFeeds as $feeds)
                                <div class="single_catagory_post post_2">
                                    <div class="category_post_img">
                                        <img src="{{$feeds['image_path']}}">
                                    </div>
                                    <div class="post_text_1 pr_30">
                                        <a href="{{url('blog/detail' , [ 'id' => $feeds['post_url'] ]) }}"><h3>{{$feeds['title']}}</h3></a>
                                        <a href="#"><h5>
                                            @forEach($feeds["phc"] as $phc)
                                                {{$phc->category_name}} /
                                            @endforeach
                                        </h5></a>  
                                        <!-- <p><span> By Michal</span> / March 30</p> -->
                                    </div>
                                </div>
                            @endforeach 
                              
                             
                        </div>
                        
                        <div class="single_sidebar_wiget">
                              <div class="sidebar_tittle">
                              <h3>Share this post</h3>
                              </div>
                              <div class="social_share_icon tags">
                              <ul class="list-unstyled">
                                    <li><a href="#"><i class="ti-facebook"></i></a></li>
                                    <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                    <li><a href="#"><i class="ti-pinterest"></i></a></li>
                                    <li><a href="#"><i class="ti-instagram"></i></a></li>
                              </ul>
                              </div>
                        </div>
                  </div>
            </div>
         </div>
      </div>
   </section>
   <!--================Blog Area end =================-->
 @endsection



 