@extends('layouts.master')

@section('content')
<!-- <section class="banner_post">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <div class="banner_post_1 banner_post_bg_1">
                    <div class="banner_post_iner text-center">
                        <a href="category.html"><h5> Fashion / Life style</h5></a> 
                        <a href="single-blog.html"><h2>All said replenish years void
                            kind say void </h2></a> 
                        <p>Posted on April 15, 2019</p>
                    </div>
                </div><div class="banner_post_1 banner_post_bg_2">
                    <div class="banner_post_iner text-center">
                        <a href="category.html"><h5> Fashion / Life style</h5></a> 
                        <a href="single-blog.html"><h2>All said replenish years void
                            kind say void </h2></a> 
                        <p>Posted on April 15, 2019</p>
                    </div>
                </div>
                <div class="banner_post_1 banner_post_bg_3">
                    <div class="banner_post_iner text-center">
                        <a href="category.html"><h5> Fashion / Life style</h5></a> 
                        <a href="single-blog.html"><h2>All said replenish years void
                            kind say void </h2></a> 
                        <p>Posted on April 15, 2019</p>
                    </div>
                </div>
            </div>
        </div>
</section> -->
  
    <section class="all_post section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        @forEach($posts as $post)
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_post post_1">
                                    <div class="single_post_img">
                                        <img src="{{$post['image_path']}}" alt="">
                                    </div>
                                    <div class="single_post_text text-center">
                                        <a href="#"><h5>
                                            @forEach($post["phc"] as $phc)
                                                {{$phc->category_name}} /
                                            @endforeach
                                        </h5></a> 
                                        <a href="{{url('blog/detail' , [ 'id' => $post['post_url'] ]) }}"><h2>{{$post['title']}}</h2></a> 
                                        <p> Posted on {{$post['created_at']}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="page_pageniation">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                {!! $posts->withQueryString()->links('pagination::bootstrap-5') !!}
                            </ul>
                        </nav>
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
 @endsection



 