@extends('layouts.front')
@section('title','INDEX FRONT')
@section('content')
    <!-- Page Content -->
    <!-- Banner_ad -->
    <img class="img-responsive center-block banner-ad2" width="728" height="90" src="{{asset('img/banner_ad.png')}}" alt="banner_ad" style="padding-top:10px;padding-bottom:10px" />
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8 post">

            <div class="col-md-9" style="padding:0;margin-top: 15px;">
            <div id="carousel-1" class="carousel slide" data-ride="corousel">
                <!-- Indicadores -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-1" data-slide-to="1"></li>
                    <li data-target="#carousel-1" data-slide-to="2"></li>
                    <li data-target="#carousel-1" data-slide-to="3"></li>
                    <li data-target="#carousel-1" data-slide-to="4"></li>
                </ol>
                <!-- Contenedor de los slide -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="http://fondos-escritorio.org/wallpapers/2014/11/original/fondos-de-pantalla-paisaje-draw-hd-3904.jpg" class="img-responsive" alt="">
                        <div class="carousel-caption">
                            <h3 style="margin-left: 10px; font-size: 20px; padding: 0px; ">Titulo#1</h3>
                        </div>
                    </div>          

                    <div class="item">
                        <img src="http://www.imagexia.com/wp-content/uploads/2014/06/Paisaje-de-playa.jpg" class="img-responsive" alt="">
                        <div class="carousel-caption">
                            <h3 style="margin-left: 10px; font-size: 20px; padding: 0px; ">Titulo#2</h3>
                        </div>
                    </div>

                    <div class="item">
                        <img src="https://landscapeswag.files.wordpress.com/2014/11/ciudad-de-nueva-york-304.jpg" class="img-responsive" alt="">
                        <div class="carousel-caption">
                            <h3 style="margin-left: 10px; font-size: 20px; padding: 0px; ">Titulo#3</h3>
                        </div>
                    </div>                    
                    <div class="item">
                        <img src="http://4.bp.blogspot.com/-3-OGYJK18zw/Uc2oXFRd_fI/AAAAAAAAAPs/rzrgocvCTcQ/s1600/Los+paisajes+mas+hermosos+del+mundo+(10.jpg" class="img-responsive" alt="">
                        <div class="carousel-caption">
                            <h3 style="margin-left: 10px; font-size: 20px; padding: 0px; ">Titulo#4</h3>
                        </div>
                    </div>                    
                    <div class="item">
                        <img src="https://placehold.it/500x300" class="img-responsive" alt="">
                        <div class="carousel-caption">
                            <h3 style="margin-left: 10px; font-size: 20px; padding: 0px; ">Titulo#5</h3>
                        </div>
                    </div>
                </div>
                <!-- Controles -->
                <a href="#carousel-1" class="left carousel-control" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true" style="margin-left:-5px;"></span>
                </a>
                <a href="#carousel-1" class="right carousel-control" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="margin-right:-5px;"></span> 
                </a>
            </div>
        </div>
        <div class="carousel-indicators selector col-lg-4 col-md-12 col-sm-12" style="margin-top:15px">
            <div class="tabs center-block" style="width: 136px">
                <a href="#" style="margin-right:10px; font-weight: bold; font-size: 1.3em; text-decoration:none">Link #1</a><a href="#" style="font-weight: bold; font-size: 1.3em; text-decoration:none">Link #2</a>
            </div>
            <div class="titulos col-sm-12" style="text-align:left;padding:0">
            <p style="margin-top:10px">
            <div class="col-lg-12 col-md-12 col-sm-4 col-xs-4 sidebar-title-carousel">
            <a href="#" data-target="#carousel-1" data-slide-to="0" class="active"data-target="#carousel-1" data-slide-to="0"  style="text-decoration:none;font-size:15px;font-weight:bold;color:black;text-align:left">Titulo#1</a>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-4 col-xs-4 sidebar-title-carousel">
            <a href="#" data-target="#carousel-1" data-slide-to="1" style="text-decoration:none;font-size:15px;font-weight:bold;color:black;text-align:left">Titulo#2</a>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-4 col-xs-4 sidebar-title-carousel">
            <a href="#" data-target="#carousel-1" data-slide-to="2" style="text-decoration:none;font-size:15px;font-weight:bold;color:black;text-align:left">Titulo#3</a>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-4 col-xs-4 sidebar-title-carousel">
            <a href="#" data-target="#carousel-1" data-slide-to="3" style="text-decoration:none;font-size:15px;font-weight:bold;color:black;text-align:left">Titulo#4</a>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-4 col-xs-4 sidebar-title-carousel">
            <a href="#" data-target="#carousel-1" data-slide-to="4" style="text-decoration:none;font-size:15px;font-weight:bold;color:black;text-align:left">Titulo#5</a>
            </div>
            </p> 
            </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0; margin-top:50px">
                <div class="col-md-4 col-sm-6 col-xs-12" style="padding:0;border:1px solid #dcddde">
                    <div class="post-destacados col-lg-6 col-md-4 col-sm-3 col-xs-3" style="padding-top: 20px;padding-bottom: 20px;padding-left: 20px;padding-right: 0;"><a href="#"><img class="img-responsive center-block" src="https://placeholdit.imgix.net/~text?txtsize=9&txt=100%C3%97100&w=100&h=100" alt=""></a></div>
                    <div class="post-destacados-titulo col-lg-6 col-md-8 col-sm-9 col-xs-9" >
                        <br>
                        <p style="text-align:justify"><a href="#" style="text-decoration:none; color:#55505c; font-weight:bold;text-align:left">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a></p>
                        <p style="font-size:10px"><span class="glyphicon glyphicon-time"></span> 2 years 2 weeks ago</p>

                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12" style="padding:0;border:1px solid #dcddde">
                    <div class="post-destacados col-lg-6 col-md-4 col-sm-3 col-xs-3" style="padding-top: 20px;padding-bottom: 20px;padding-left: 20px;padding-right: 0;"><a href="#"><img class="img-responsive center-block" src="https://placeholdit.imgix.net/~text?txtsize=9&txt=100%C3%97100&w=100&h=100" alt=""></a></div>
                    <div class="post-destacados-titulo col-lg-6 col-md-8 col-sm-9 col-xs-9" >
                        <br>
                        <p style="text-align:justify"><a href="#" style="text-decoration:none; color:#55505c; font-weight:bold;text-align:left">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a></p>
                        <p style="font-size:10px"><span class="glyphicon glyphicon-time"></span> 2 years 2 weeks ago</p>

                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12" style="padding:0;border:1px solid #dcddde">
                    <div class="post-destacados col-lg-6 col-md-4 col-sm-3 col-xs-3" style="padding-top: 20px;padding-bottom: 20px;padding-left: 20px;padding-right: 0;"><a href="#"><img class="img-responsive center-block" src="https://placeholdit.imgix.net/~text?txtsize=9&txt=100%C3%97100&w=100&h=100" alt=""></a></div>
                    <div class="post-destacados-titulo col-lg-6 col-md-8 col-sm-9 col-xs-9" >
                        <br>
                        <p style="text-align:justify"><a href="#" style="text-decoration:none; color:#55505c; font-weight:bold;text-align:left">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a></p>
                        <p style="font-size:10px"><span class="glyphicon glyphicon-time"></span> 2 years 2 weeks ago</p>

                    </div>
                </div>
            </div>
                <div class="tabs col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:20px;padding:0">
                <a href="#" style="margin-right:10px; font-weight: bold; font-size: 1.3em; text-decoration:none">Link #1</a><a href="#" style="font-weight: bold; font-size: 1.3em; text-decoration:none">Link #2</a>
                </div>
                <hr>
                <!-- Project 1 -->
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <a href="#">
                    <img class="img-responsive" style="width:300px;height:200px" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-12" style="margin-top: 10px">
                <h3 style="margin:0">Project 1</h3>
                <a href="#" class="pull-left" style="margin-right:5px"><img src="{{asset('img/user-logo.png')}}" class="img-responsive" width="20px" height="20px" alt=""></a>Mahbuba Nasrin <span class="glyphicon glyphicon-time" style="margin-left:10px;margin-right:10px"> 12 minutes ago</span><span class="icon icon-eye"> Visitas</span>                
                <br><br>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>
                <a class="btn btn-primary" href="#">View More <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Project 2 -->
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <a href="#">
                    <img class="img-responsive" style="width:300px;height:200px" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-12" style="margin-top: 10px">
                <h3 style="margin:0">Project 2</h3>
                <a href="#" class="pull-left" style="margin-right:5px"><img src="{{asset('img/user-logo.png')}}" class="img-responsive" width="20px" height="20px" alt=""></a>Mahbuba Nasrin <span class="glyphicon glyphicon-time" style="margin-left:10px;margin-right:10px"> 12 minutes ago</span><span class="icon icon-eye"> Visitas</span>
                <br><br>               
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, odit velit cumque vero doloremque repellendus distinctio maiores rem expedita a nam vitae modi quidem similique ducimus! Velit, esse totam tempore.</p>
                <a class="btn btn-primary" href="#">View More <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Project 3 -->
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <a href="#">
                    <img class="img-responsive" style="width:300px;height:200px" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-12" style="margin-top: 10px">
                <h3 style="margin:0">Project 3</h3>
                <a href="#" class="pull-left" style="margin-right:5px"><img src="{{asset('img/user-logo.png')}}" class="img-responsive" width="20px" height="20px" alt=""></a>Mahbuba Nasrin <span class="glyphicon glyphicon-time" style="margin-left:10px;margin-right:10px"> 12 minutes ago</span><span class="icon icon-eye"> Visitas</span>
                <br><br>               
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, temporibus, dolores, at, praesentium ut unde repudiandae voluptatum sit ab debitis suscipit fugiat natus velit excepturi amet commodi deleniti alias possimus!</p>
                <a class="btn btn-primary" href="#">View More <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Project 4 -->
        <div class="row">

            <div class="col-md-4 col-sm-4 col-xs-12">
                <a href="#">
                    <img class="img-responsive" style="width:300px;height:200px" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-12" style="margin-top: 10px">
                <h3 style="margin:0">Project 4</h3>
                <a href="#" class="pull-left" style="margin-right:5px"><img src="{{asset('img/user-logo.png')}}" class="img-responsive" width="20px" height="20px" alt=""></a>Mahbuba Nasrin <span class="glyphicon glyphicon-time" style="margin-left:10px;margin-right:10px"> 12 minutes ago</span><span class="icon icon-eye"> Visitas</span>
                <br><br>               
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, quidem, consectetur, officia rem officiis illum aliquam perspiciatis aspernatur quod modi hic nemo qui soluta aut eius fugit quam in suscipit?</p>
                <a class="btn btn-primary" href="#">View More <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Project 5 -->
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <a href="#">
                    <img class="img-responsive" style="width:300px;height:200px" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-12" style="margin-top: 10px">
                <h3 style="margin:0">Project 5</h3>
                <a href="#" class="pull-left" style="margin-right:5px"><img src="{{asset('img/user-logo.png')}}" class="img-responsive" width="20px" height="20px" alt=""></a>Mahbuba Nasrin <span class="glyphicon glyphicon-time" style="margin-left:10px;margin-right:10px"> 12 minutes ago</span><span class="icon icon-eye"> Visitas</span>
                <br><br>               
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, quo, minima, inventore voluptatum saepe quos nostrum provident ex quisquam hic odio repellendus atque porro distinctio quae id laboriosam facilis dolorum.</p>
                <a class="btn btn-primary" href="#">View More <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Project 6 -->
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <a href="#">
                    <img class="img-responsive" style="width:300px;height:200px" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-12" style="margin-top: 10px">
                <h3 style="margin:0">Project 6</h3>
                <a href="#" class="pull-left" style="margin-right:5px"><img src="{{asset('img/user-logo.png')}}" class="img-responsive" width="20px" height="20px" alt=""></a>Mahbuba Nasrin <span class="glyphicon glyphicon-time" style="margin-left:10px;margin-right:10px"> 12 minutes ago</span><span class="icon icon-eye"> Visitas</span>
                <br><br>               
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>
                <a class="btn btn-primary" href="#">View More <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Project 7 -->
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <a href="#">
                    <img class="img-responsive" style="width:300px;height:200px" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-12" style="margin-top: 10px">
                <h3 style="margin:0">Project 7</h3>
                <a href="#" class="pull-left" style="margin-right:5px"><img src="{{asset('img/user-logo.png')}}" class="img-responsive" width="20px" height="20px" alt=""></a>Mahbuba Nasrin <span class="glyphicon glyphicon-time" style="margin-left:10px;margin-right:10px"> 12 minutes ago</span><span class="icon icon-eye"> Visitas</span>
                <br><br>               
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, odit velit cumque vero doloremque repellendus distinctio maiores rem expedita a nam vitae modi quidem similique ducimus! Velit, esse totam tempore.</p>
                <a class="btn btn-primary" href="#">View More <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Project 8 -->
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <a href="#">
                    <img class="img-responsive" style="width:300px;height:200px" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-12" style="margin-top: 10px">
                <h3 style="margin:0">Project 8</h3>
                <a href="#" class="pull-left" style="margin-right:5px"><img src="{{asset('img/user-logo.png')}}" class="img-responsive" width="20px" height="20px" alt=""></a>Mahbuba Nasrin <span class="glyphicon glyphicon-time" style="margin-left:10px;margin-right:10px"> 12 minutes ago</span><span class="icon icon-eye"> Visitas</span>
                <br><br>               
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, temporibus, dolores, at, praesentium ut unde repudiandae voluptatum sit ab debitis suscipit fugiat natus velit excepturi amet commodi deleniti alias possimus!</p>
                <a class="btn btn-primary" href="#">View More <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Project 9 -->
        <div class="row">

            <div class="col-md-4 col-sm-4 col-xs-12">
                <a href="#">
                    <img class="img-responsive" style="width:300px;height:200px" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-12" style="margin-top: 10px">
                <h3 style="margin:0">Projecto 9</h3>
                <a href="#" class="pull-left" style="margin-right:5px"><img src="{{asset('img/user-logo.png')}}" class="img-responsive" width="20px" height="20px" alt=""></a>Mahbuba Nasrin <span class="glyphicon glyphicon-time" style="margin-left:10px;margin-right:10px"> 12 minutes ago</span><span class="icon icon-eye"> Visitas</span>
                <br><br>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, quidem, consectetur, officia rem officiis illum aliquam perspiciatis aspernatur quod modi hic nemo qui soluta aut eius fugit quam in suscipit?</p>
                <a class="btn btn-primary" href="#">View More <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Project 10 -->
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <a href="#">
                    <img class="img-responsive" style="width:300px;height:200px" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-12" style="margin-top: 10px">
                <h3 style="margin:0">Projecto 10</h3>
                <a href="#" class="pull-left" style="margin-right:5px"><img src="{{asset('img/user-logo.png')}}" class="img-responsive" width="20px" height="20px" alt=""></a>Mahbuba Nasrin <span class="glyphicon glyphicon-time" style="margin-left:10px;margin-right:10px"> 12 minutes ago</span><span class="icon icon-eye"> Visitas</span>
                <br><br>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, quo, minima, inventore voluptatum saepe quos nostrum provident ex quisquam hic odio repellendus atque porro distinctio quae id laboriosam facilis dolorum.</p>
                <a class="btn btn-primary" href="#">View More <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <!-- /.row -->

        <img class="img-responsive center-block banner-ad" width="728" height="90" src="{{asset('img/banner_ad2.png')}}" alt="banner_ad" style="padding-bottom:10px;padding-top:10px;padding-bottom:10px">

        <!-- Project 11 -->
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <a href="#">
                    <img class="img-responsive" style="width:300px;height:200px" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-12" style="margin-top: 10px">
                <h3 style="margin:0">Projecto 11</h3>
                <a href="#" class="pull-left" style="margin-right:5px"><img src="{{asset('img/user-logo.png')}}" class="img-responsive" width="20px" height="20px" alt=""></a>Mahbuba Nasrin <span class="glyphicon glyphicon-time" style="margin-left:10px;margin-right:10px"> 12 minutes ago</span><span class="icon icon-eye"> Visitas</span>
                <br><br>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>
                <a class="btn btn-primary" href="#">View More <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Project 12 -->
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <a href="#">
                    <img class="img-responsive" style="width:300px;height:200px" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-12" style="margin-top: 10px">
                <h3 style="margin:0">Projecto 12</h3>
                <a href="#" class="pull-left" style="margin-right:5px"><img src="{{asset('img/user-logo.png')}}" class="img-responsive" width="20px" height="20px" alt=""></a>Mahbuba Nasrin <span class="glyphicon glyphicon-time" style="margin-left:10px;margin-right:10px"> 12 minutes ago</span><span class="icon icon-eye"> Visitas</span>
                <br><br>  
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, odit velit cumque vero doloremque repellendus distinctio maiores rem expedita a nam vitae modi quidem similique ducimus! Velit, esse totam tempore.</p>
                <a class="btn btn-primary" href="#">View More <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Project 13 -->
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <a href="#">
                    <img class="img-responsive" style="width:300px;height:200px" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-12" style="margin-top: 10px">
                <h3 style="margin:0">Projecto 13</h3>
                <a href="#" class="pull-left" style="margin-right:5px"><img src="{{asset('img/user-logo.png')}}" class="img-responsive" width="20px" height="20px" alt=""></a>Mahbuba Nasrin <span class="glyphicon glyphicon-time" style="margin-left:10px;margin-right:10px"> 12 minutes ago</span><span class="icon icon-eye"> Visitas</span>
                <br><br>          
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, temporibus, dolores, at, praesentium ut unde repudiandae voluptatum sit ab debitis suscipit fugiat natus velit excepturi amet commodi deleniti alias possimus!</p>
                <a class="btn btn-primary" href="#">View More <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Project 14 -->
        <div class="row">

            <div class="col-md-4 col-sm-4 col-xs-12">
                <a href="#">
                    <img class="img-responsive" style="width:300px;height:200px" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-12" style="margin-top: 10px">
                <h3 style="margin:0">Projecto 14</h3>
                <a href="#" class="pull-left" style="margin-right:5px"><img src="{{asset('img/user-logo.png')}}" class="img-responsive" width="20px" height="20px" alt=""></a>Mahbuba Nasrin <span class="glyphicon glyphicon-time" style="margin-left:10px;margin-right:10px"> 12 minutes ago</span><span class="icon icon-eye"> Visitas</span>
                <br><br>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, quidem, consectetur, officia rem officiis illum aliquam perspiciatis aspernatur quod modi hic nemo qui soluta aut eius fugit quam in suscipit?</p>
                <a class="btn btn-primary" href="#">View More <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Project 15 -->
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <a href="#">
                    <img class="img-responsive" style="width:300px;height:200px" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-12" style="margin-top: 10px">
                <h3 style="margin:0">Projecto 15</h3>
                <a href="#" class="pull-left" style="margin-right:5px"><img src="{{asset('img/user-logo.png')}}" class="img-responsive" width="20px" height="20px" alt=""></a>Mahbuba Nasrin <span class="glyphicon glyphicon-time" style="margin-left:10px;margin-right:10px"> 12 minutes ago</span><span class="icon icon-eye"> Visitas</span>
                <br><br>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, quo, minima, inventore voluptatum saepe quos nostrum provident ex quisquam hic odio repellendus atque porro distinctio quae id laboriosam facilis dolorum.</p>
                <a class="btn btn-primary" href="#">View More <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <!-- /.row -->
                <hr>

        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li class="active">
                        <a href="#">1</a>
                    </li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#">4</a>
                    </li>
                    <li>
                        <a href="#">5</a>
                    </li>
                    <li>
                        <a href="#">&raquo;</a>
                    </li>
                </ul>
            </div>
        </div>
                <hr>
            <div class="row" style="height:400px">
                <div class="col-md-10">
                <div class="tabs" style="margin-bottom:10px">
                    <a href="#" style="margin-right:10px; font-size: 1.3em; text-decoration:none">Link #1</a>
                    <a href="#" style="font-weight: bold; font-size: 1.3em; text-decoration:none">Link #2</a>
                </div>
                </div>
        <!--SLIDER-->

    <div class="col-lg-12" style="">
        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12" id="ninja-slider" style="float:left;">
            <div class="slider-inner">
                <ul>
                    <li><a class="ns-img" href="{{asset('img/11.jpg')}}"><p class="caption" style="background-color: rgba(0, 0, 0, 0.6); color: white; position: absolute; bottom: 0px; padding: 10px; margin: 0px;text-align:justify;"><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A excepturi, minus, sunt consectetur dolore nam illum voluptates eius totam itaque velit vel animi impedit doloremque nostrum repellendus expedita ducimus quisquam.</span></p></a></li>
                    <li><a class="ns-img" href="{{asset('img/8.jpg')}}"><p class="caption" style="background-color: rgba(0, 0, 0, 0.6); color: white; position: absolute; bottom: 0px; padding: 10px; margin: 0px;text-align:justify;"><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia dolorem cupiditate magni deserunt placeat reprehenderit beatae nihil optio nulla. Deleniti maiores dolores similique quam eos animi, cum excepturi exercitationem consequatur.</span></p></a></li>
                    <li><a class="ns-img" href="{{asset('img/9.jpg')}}"><p class="caption" style="background-color: rgba(0, 0, 0, 0.6); color: white; position: absolute; bottom: 0px; padding: 10px; margin: 0px;text-align:justify;"><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam excepturi, aut odit iste alias, adipisci facilis nobis, nemo quae fugiat quia autem voluptates eveniet nulla reprehenderit natus. Nemo asperiores, corporis!</span></p></a></li>
                    <li><a class="ns-img" href="{{asset('img/10.jpg')}}"><p class="caption" style="background-color: rgba(0, 0, 0, 0.6); color: white; position: absolute; bottom: 0px; padding: 10px; margin: 0px;text-align:justify;"><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam ea quas soluta, incidunt quidem, iusto illo, iste laudantium quia provident nulla aut ipsa! A cum aspernatur dolores ab, consectetur aliquid.</span></p></a></li>
                </ul>
            </div>
        </div>
        <div class="thumbnail-slider-padre col-lg-2 col-md-2 col-sm-12 col-xs-12" style="padding:0;">
        <div class="thumbnail-slider" id="thumbnail-slider">
            <div class="inner" style="padding:0;">
                <ul>
                    <li style="padding:0;margin:0;">
                        <a class="thumb" href="{{asset('img/11.jpg')}}"></a>
                        <p class="title"><a href="#" style="text-decoration:none;color:black"><strong>Post#1</strong></a></p>
                    <div class="oculto div-post col-md-8 col-sm-8 col-xs-12">
                        <a href="#" style="text-decoration:none"><h3>Post#1</h3></a>
                        <a href="#" class="pull-left" style="margin-right:5px"><img src="{{asset('img/user-logo.png')}}" class="img-responsive" width="20px" height="20px" alt=""></a>Mahbuba Nasrin <span class="glyphicon glyphicon-time" style="margin-left:10px;margin-right:10px"> 12 minutes ago</span><span class="icon icon-eye"> Visitas</span><br>
                        <a class="btn btn-primary" href="#" style="margin:10px 0px">View More <span class="glyphicon glyphicon-chevron-right"></span></a>
                    </div>
                    </li>
                    <li style="padding:0;margin:0;">
                        <a class="thumb" href="{{asset('img/8.jpg')}}"></a>
                        <p class="title"><a href="#" style="text-decoration:none;color:black"><strong>Post#2</strong></a></p>
                    <div class="oculto div-post col-md-8 col-sm-8 col-xs-12">
                        <a href="#" style="text-decoration:none"><h3>Post#2</h3></a>
                        <a href="#" class="pull-left" style="margin-right:5px"><img src="{{asset('img/user-logo.png')}}" class="img-responsive" width="20px" height="20px" alt=""></a>Mahbuba Nasrin <span class="glyphicon glyphicon-time" style="margin-left:10px;margin-right:10px"> 12 minutes ago</span><span class="icon icon-eye"> Visitas</span><br>
                        <a class="btn btn-primary" href="#" style="margin:10px 0px">View More <span class="glyphicon glyphicon-chevron-right"></span></a>
                    </div>
                    </li>
                    <li style="padding:0;margin:0;">
                        <a class="thumb" href="{{asset('img/9.jpg')}}"></a>
                        <p class="title"><a href="#"" style="text-decoration:none;color:black"><strong>Post#3</strong></a></p>
                    <div class="oculto div-post col-md-8 col-sm-8 col-xs-12">
                        <a href="#" style="text-decoration:none"><h3>Post#3</h3></a>
                        <a href="#" class="pull-left" style="margin-right:5px"><img src="{{asset('img/user-logo.png')}}" class="img-responsive" width="20px" height="20px" alt=""></a>Mahbuba Nasrin <span class="glyphicon glyphicon-time" style="margin-left:10px;margin-right:10px"> 12 minutes ago</span><span class="icon icon-eye"> Visitas</span><br>
                        <a class="btn btn-primary" href="#" style="margin:10px 0px">View More <span class="glyphicon glyphicon-chevron-right"></span></a>
                    </div>
                    </li>
                    <li style="padding:0;margin:0;">
                        <a class="thumb" href="{{asset('img/10.jpg')}}"></a>
                        <p class="title"><a href="#" style="text-decoration:none;color:black"><strong>Post#4</strong></a></p>
                    <div class="oculto div-post col-md-8 col-sm-8 col-xs-12">
                        <a href="#" style="text-decoration:none"><h3>Post#4</h3></a>
                        <a href="#" class="pull-left" style="margin-right:5px"><img src="{{asset('img/user-logo.png')}}" class="img-responsive" width="20px" height="20px" alt=""></a>Mahbuba Nasrin <span class="glyphicon glyphicon-time" style="margin-left:10px;margin-right:10px"> 12 minutes ago</span><span class="icon icon-eye"> Visitas</span><br>
                        <a class="btn btn-primary" href="#" style="margin:10px 0px">View More <span class="glyphicon glyphicon-chevron-right"></span></a>
                    </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
        <div class="contenedor_post col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0"></div> 
    </div>        
                <div class="col-md-12 col-sm-12 col-xs-12" style="padding:0">
                    <img class="img-responsive center-block" style="height:150px;" src="{{asset('img/ad.png')}}" alt="">
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
            <img class="img-responsive center-block banner-ad" src="{{asset('img/banner_ad2.png')}}" alt="banner_ad" style="padding-bottom:10px;padding-top:10px;padding-bottom:10px" height="90" width="728">
            </div>

            <div class="col-md-10 col-sm-12 col-xs-12" style="padding:0;margin-bottom:20px">
                <div class="tabs" style="margin-bottom:10px">
                    <a href="#" style="margin-right:10px; font-size: 1.3em; text-decoration:none">Link #1</a>
                    <a href="#" style="font-weight: bold; font-size: 1.3em; text-decoration:none">Link #2</a>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3 view video video1" style="margin-right:7px;padding:0px">
                    <img src="{{asset('img/Layer1.jpg')}}" class="img-responsive" alt="">
                    <div class="col-md-12 mask"> 
                            <a href="#" style="text-decoration:none"><span class="icon icon-play_circle_filled center-block" style="color:white; font-size:4em;"></span></a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3 view video video2" style="margin:0px 7px;padding:0px">
                    <img src="{{asset('img/Layer2.jpg')}}" class="img-responsive" alt="">
                    <div class="col-md-12 mask"> 
                            <a href="#" style="text-decoration:none"><span class="icon icon-play_circle_filled center-block" style="color:white; font-size:4em;"></span></a>
                    </div> 
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3 view video video3" style="margin:0px 7px;padding:0px">
                    <img src="{{asset('img/Layer3.jpg')}}" class="img-responsive" alt="">
                    <div class="col-md-12 mask"> 
                            <a href="#" style="text-decoration:none"><span class="icon icon-play_circle_filled center-block" style="color:white; font-size:4em;"></span></a>
                    </div> 
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3 descripcion desc1" style="margin-right:7px;padding:0px">
                    <h4>Video #1</h4>
                    <a href="#" class="pull-left" style="margin-right:5px"><img src="{{asset('img/user-logo.png')}}" class="img-responsive pull-left" style="margin-right:5px" width="20px" height="20px" alt="">Mahbuba Nasrin</a>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3 descripcion desc2" style="margin:0px 7px;padding:0px">
                    <h4>Video #2</h4>
                    <a href="#" class="pull-left" style="margin-right:5px"><img src="{{asset('img/user-logo.png')}}" class="img-responsive pull-left" style="margin-right:5px" width="20px" height="20px" alt="">Mahbuba Nasrin</a>
                </div> 
                <div class="col-md-3 col-sm-3 col-xs-3 descripcion desc3" style="margin:0px 7px;padding:0px">
                    <h4>Video #3</h4>
                    <a href="#" class="pull-left" style="margin-right:5px"><img src="{{asset('img/user-logo.png')}}" class="img-responsive pull-left" style="margin-right:5px" width="20px" height="20px" alt="">Mahbuba Nasrin</a>
                </div>    
                </div>
            </div>
            <!-- Blog Sidebar Widgets Column -->
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 sidebar">
            <div class="sidebar_ad col-center">
            <img class="img-responsive center-block" src="{{asset('img/Sidebar_ad.png')}}" style="padding-bottom:20px" alt="">
            </div>
                <!-- Side Widget Well -->
                <div class="col-lg-12 col-md-8 col-sm-8 col-xs-10 col-lg-offset-0 col-md-offset-2 col-sm-offset-2 col-xs-offset-1 first">
                    <h4 align="center"><a href="#" style="margin-right:10px; font-weight: bold; font-size: 1.3em; text-decoration:none">Link#1</a><a href="#" style="margin-right:10px;font-weight: bold; font-size: 1.3em; text-decoration:none">Link #2</a><a href="#" style="font-weight: bold; font-size: 1.3em; text-decoration:none">Link #3</a></h4>
                    <a href="#"><img class="img-responsive center-block" src="{{asset('img/girl.jpg')}}" alt="" style="margin-bottom:20px"></a>
                </div>

                <!-- Blog Search Well -->
                <div class="well col-lg-12 col-md-8 col-sm-8 col-xs-10 col-lg-offset-0 col-md-offset-2 col-sm-offset-2 col-xs-offset-1 first">
                    <div class="input-group">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well categories col-lg-12 col-md-8 col-sm-8 col-xs-10 col-lg-offset-0 col-md-offset-2 col-sm-offset-2 col-xs-offset-1">
                    <h4 style="text-align:center">Lorem Itsum</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.</h5><br>
                            <h6>Lorem ipsum dolor sit amet</h6>
                            <hr />
                            <h4 style="color:blue;">Lorem ipsum dolor sit amet</h4>
                            <div class="col-lg-12 col-md-10 col-sm-10 col-xs-12 col-lg-offset-0 col-md-offset-1 col-sm-offset-1 col-xs-offset-0" style="padding:0">
                                <div class="facebook col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding:0px;margin-right:10px">
                                <a href="#"><img src="{{asset('img/social_fb.png')}}" class="img-responsive center-block" alt="social" style="width:100%"></a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding:0px;margin-right:10px">
                                <a href="#"><img src="{{asset('img/social_tw.png')}}" class="img-responsive center-block" alt="social" style="width:100%"></a>
                                </div>                                
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding:0px;margin-right:10px">
                                <a href="#"><img src="{{asset('img/social_gl.png')}}" class="img-responsive center-block" alt="social" style="width:100%"></a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding:0px;margin-right:10px">
                                <a href="#"><img src="{{asset('img/social_in.png')}}" class="img-responsive center-block" alt="social" style="width:100%"></a>
                                </div>                                
                                <div class="youtube col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding:0px;margin-right:10px">
                                <a href="#"><img src="{{asset('img/social_yt.png')}}" class="img-responsive center-block" alt="social" style="width:100%"></a>
                                </div>
                                </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <img src="{{asset('img/ebook.png')}}" style="padding-bottom:50px" class="img-responsive center-block">
                <img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=300%C3%97600&w=300&h=600" style="padding-bottom:50px" class="img-responsive center-block">    
            </div>
        </div>
        </div>
        <!-- /.row -->
        

    </div>
    <!-- /.container -->
@endsection
