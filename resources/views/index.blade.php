@extends('layouts.master')

@section('content')

 <!--BLOG AREA-->
 <section class="blog-area gray-bg padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    <div class="single-blog wow fadeInUp" data-wow-delay="0.2s">
                        <div class="blog-image">
                            <img src="img/blog/blog_1.jpg" alt="">
                        </div>
                        <div class="blog-details text-center">
                            <div class="blog-meta"><a href="#"><i class="fa fa-ship"></i></a></div>
                            <h3><a href="single-blog.html">Ocean Freight</a></h3>
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout..</p>
                            <a href="single-blog.html" class="read-more">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    <div class="single-blog wow fadeInUp" data-wow-delay="0.3s">
                        <div class="blog-image">
                            <img src="img/blog/blog_2.jpg" alt="">
                        </div>
                        <div class="blog-details text-center">
                            <div class="blog-meta"><a href="#"><i class="fa fa-plane"></i></a></div>
                            <h3><a href="single-blog.html">Air Freight</a></h3>
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout..</p>
                            <a href="single-blog.html" class="read-more">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="single-blog wow fadeInUp" data-wow-delay="0.4s">
                        <div class="blog-image">
                            <img src="img/blog/blog_3.jpg" alt="">
                        </div>
                        <div class="blog-details text-center">
                            <div class="blog-meta"><a href="#"><i class="fa fa-truck"></i></a></div>
                            <h3><a href="single-blog.html">Street Freight</a></h3>
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout..</p>
                            <a href="single-blog.html" class="read-more">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--BLOG AREA END-->

    <!--SERVICE AREA-->
    <section class="service-area">
        <div class="service-top-area padding-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 col-sm-12 col-xs-12">
                        <div class="area-title text-center wow fadeIn">
                            <h2>Our Service</h2>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                        <div class="service-content wow fadeIn">
                            <h2>we offer quick & powerful logistics solution</h2>
                            <p>I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you.</p>
                            <a href="service.html" class="read-more">Learn More</a>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                        <div class="service-catalouge-content-area wow fadeIn">
                            <div class="service-catalouge-bg"></div>
                            <div class="row">
                                <div class="col-md-7 col-lg-7 col-md-offset-5 col-lg-offset-5 col-sm-12 col-xs-12">
                                    <div class="catalouge-content">
                                        <h3>Why Choose Us ?</h3>
                                        <p>I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you.</p>
                                        <ul>
                                            <li><i class="fa fa-check"></i> Lorem ipsum dolor sit amet, consectetur.</li>
                                            <li><i class="fa fa-check"></i> Sed quia consequuntur magni dolores eos.</li>
                                            <li><i class="fa fa-check"></i> Nemo enim ipsam voluptatem .</li>
                                            <li><i class="fa fa-check"></i> We denounce with righteous indignation.</li>
                                        </ul>
                                        <a href="service.html" class="read-more">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

    <section class="promo-area">
        <div class="promo-top-area section-padding wow fadeIn">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                        <div class="single-promo">
                            <div class="promo-icon"><i class="fa fa-anchor"></i></div>
                            <div class="promo-details">
                                <h3>Our Location</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                        <div class="single-promo">
                            <div class="promo-icon"><i class="fa fa-newspaper-o"></i></div>
                            <div class="promo-details">
                                <h3>Latest News</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                        <div class="single-promo">
                            <div class="promo-icon"><i class="fa fa-umbrella"></i></div>
                            <div class="promo-details">
                                <h3>24/7 Support</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                        <div class="single-promo">
                            <div class="promo-icon"><i class="fa fa-bicycle"></i></div>
                            <div class="promo-details">
                                <h3>Fast Delevery</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </section>
    <!--PROMO AREA END-->




@endsection