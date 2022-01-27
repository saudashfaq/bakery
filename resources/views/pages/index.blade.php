{{--@extends('layouts.appss')--}}
{{--@section('content')--}}
    <!DOCTYPE html>
<html lang="en">
<head>
<!-- business pro heads code  -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta content='width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1' name='viewport'/>

    <meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>
    <!-- Chrome, Firefox OS and Opera -->
    <meta content='#f8f8f8' name='theme-color'/>
    <!--[if IE]> <script> (function() { var html5 = ("abbr,article,aside,audio,canvas,datalist,details," + "figure,footer,header,hgroup,mark,menu,meter,nav,output," + "progress,section,time,video").split(','); for (var i = 0; i < html5.length; i++) { document.createElement(html5[i]); } try { document.execCommand('BackgroundImageCache', false, true); } catch(e) {} })(); </script> <![endif]-->
    <script type='application/ld+json'>{"@context":"http://schema.org","@type":"WebSite","name":"Affiliation","url":"https://affiliation-sora-templates.blogspot.com/","potentialAction":{"@type":"SearchAction","target":"https://affiliation-sora-templates.blogspot.com/search?q={search_term_string}","query-input":"required name=search_term_string"}}</script>
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,400i,600,700,700i' media='all' rel='stylesheet' type='text/css'/>
    <link href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'/>
    <!-- Global Variables -->

    <!-- Google Analytics -->
    <meta name='google-adsense-platform-account' content='ca-host-pub-1556223355139109'/>
    <meta name='google-adsense-platform-domain' content='blogspot.com'/>
    {{--    ..............................--}}
    {{--<!-- Styles -->--}}
    <link rel="stylesheet" href="{{asset('/css/index.css')}}">

    <!--    -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
{{--    <link rel="icon" href="images/favicon.ico" type="image/ico"/>--}}

    <title>{{config('app.name' , 'Baker’s Bites')}}</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
{{--    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">--}}
    <!-- NProgress -->
{{--    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">--}}
    <!-- iCheck -->
{{--    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">--}}

    <!-- bootstrap-progressbar -->
{{--    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">--}}
    <!-- JQVMap -->
{{--    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>--}}
    <!-- bootstrap-daterangepicker -->
{{--    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">--}}

    <!-- Custom Theme Style -->
{{--    <link href="../build/css/custom.min.css" rel="stylesheet">--}}


    <!-- for without theme header link  -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
{{--    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>--}}

{{--    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>--}}

{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>--}}
{{--    <link rel="stylesheet"--}}
{{--          href=" https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">--}}
{{--    <link rel="stylesheet"--}}
{{--          href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css"--}}
{{--          integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">--}}
    {{--    <link rel="stylesheet" href="{{asset('/css/app.css')}}">--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">--}}
    {{--    for datata table link for boostrap 4 --}}
{{--    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">--}}

    <title>{{config('app.name' , 'Baker’s Bites')}}</title>

    {{--    ajax github--}}
<!-- Script -->

    {{--  Font Awesome JS --}}
    {{--    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' type='text/css'>--}}
    {{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />--}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!--/end for without theme header link  -->
    <style>
        .carousel-item {
            height: 100vh;
            min-height: 350px;
            background: no-repeat center center scroll;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>
</head>
<body>
<!-- Navigation -->

<header>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active"
                 style="background-image: url('images/background bakry.jpg')">
                <div class="carousel-caption" >
                    <h5>WELCOME  TO  BAKER'S  BITES</h5>
                    <div style="margin: 20px;  color: #ffffff;text-transform: capitalize; margin-bottom: 15px; font-weight: 700;line-height: 1.5;font-family: 'Berkshire Swash', cursive;} ">
                    <h1>Maximize your Production efficiency</h1>
                    </div>
                    <p style="margin: 50px;"><a class="btn btn-primary btn-lg" href="/dashboard" role="button">Login</a> <a
                            class="btn btn-success btn-lg" href="/register" role="button">Register</a></p>
                </div>
            </div>
            <div class="carousel-item"
                 style="background-image: url('https://source.unsplash.com/szFUQoyvrxM/1920x1080')">
                <div class="carousel-caption" >
                    <h5>WELCOME TO BAKER'S BITES</h5>
                    <div style="margin: 20px;  color: #ffffff;text-transform: capitalize; margin-bottom: 15px; font-weight: 700;line-height: 1.5;font-family: 'Berkshire Swash', cursive;} ">
                        <h1>Maximize your Production efficiency</h1>
                    </div>
                    <p style="margin: 50px;"><a class="btn btn-primary btn-lg" href="/dashboard" role="button">Login</a> <a
                            class="btn btn-success btn-lg" href="/register" role="button">Register</a></p>
                </div>
            </div>
            <div class="carousel-item"background bakry
                 style="background-image: url('images/bakeabby.jpg')">
                <div class="carousel-caption" >
                    <h5>WELCOME TO BAKER'S BITES</h5>
                    <div style="margin: 20px;  color: #ffffff;text-transform: capitalize; margin-bottom: 15px; font-weight: 700;line-height: 1.5;font-family: 'Berkshire Swash', cursive;} ">
                        <h1>Maximize your Production efficiency</h1>
                    </div>
                    <p style="margin: 50px;"><a class="btn btn-primary btn-lg" href="/dashboard" role="button">Login</a> <a
                            class="btn btn-success btn-lg" href="/register" role="button">Register</a></p>
                </div>
            </div>
        </div>

    </div>
</header>
<div class='theme-options' style='display:none'>
    <div class='sora-panel section' id='sora-panel' name='Theme Options'><div class='widget LinkList' data-version='2' id='LinkList71'>

            <script type='text/javascript'>
                var disqusShortname = "soratemplates";


                var commentsSystem = "blogger";


                var postPerPage = 8;


                //]]>
            </script>

        </div></div>
</div>
<!-- Outer Wrapper -->
<div id='outer-wrapper'>

    <div class='clearfix'></div>
    <div id='intro-author-wrap' style="background-color: whitesmoke" >
        <div class='container row' style="background-color: whitesmoke">
{{--            <div class='author-content text-center'>--}}
{{--                <h1 class='author-title'>What we are porviding in our Services </h1>--}}
{{--                <p class='author-snippet text-center'>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>--}}
{{--            </div>--}}
            <div class='section' id='intro-author-heading' name='Main Author Intro Heading'><div class='widget HTML' data-version='2' id='HTML1'>
                    <div class='author-content'>
                        <h3 class='author-title'>What we are porviding in our Services</h3>
                        <p class='author-snippet'>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                    </div>

                </div></div>
            <div class='clearfix'></div>
            <div class='author-intro-widgets'>
                <div class='author-list left-side-widget section' id='intro-services-left' name='Left Author Services'><div class='widget Image' data-version='2' id='Image18'>
                        <div class='widget-content'>
                            <style type='text/css'>
                                #intro-services-left{display:block}
                            </style>
                            <div class='service-content'>
                                <span class='service-icon'><i class='fa fa-bullhorn'></i></span>
                                <div class='service-content-details'>
                                    <h3 class='service-title'>Inventory Management </h3>
                                    <p class='service-snippet'>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                </div>
                            </div>
                        </div>
                    {{--        ...............................................--}}
                    <!--</div><div class='widget Image' data-version='2' id='Image19'>
        <div><img src='C:\xampp\hassan pic.jpg ' width="500" height="600" ></div>
        <div>
            <img src="https://api.thecatapi.com/v1/images/search?format=src" alt="">
        </div>-->
                        {{--  ..................................................................--}}
                        <div class='widget-content'>
                            <style type='text/css'>
                                #intro-services-left{display:block}
                                //4.bp.blogspot.com/-P9JKL3gNPLw/W1JALZWqyEI/AAAAAAAACd4/CVUxHZ9ol9cPwqTaR-9Rw9tvWmCmIUoiACK4BGAYYCw/s1600/service2.png
                            </style>
                            <div class='service-content'>
                                <span class='service-icon'><i class='fa fa-clock-o'></i></span>
                                <div class='service-content-details'>
                                    <h3 class='service-title'>Stock Management </h3>
                                    <p class='service-snippet'>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                </div>
                            </div>
                        </div>
                    </div><div class='widget Image' data-version='2' id='Image20'>
                        <div class='widget-content'>
                            <style type='text/css'>
                                #intro-services-left{display:block}
                                //4.bp.blogspot.com/-P9JKL3gNPLw/W1JALZWqyEI/AAAAAAAACd4/CVUxHZ9ol9cPwqTaR-9Rw9tvWmCmIUoiACK4BGAYYCw/s1600/service2.png
                            </style>
                            <div class='service-content'>
                                <span class='service-icon'><i class='fa fa-envelope-o'></i></span>
                                <div class='service-content-details'>
                                    <h3 class='service-title'>Simply Dummy Text</h3>
                                    <p class='service-snippet'>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                </div>
                            </div>
                        </div>
                    </div></div>
                <div class='author-list section' id='intro-author' name='Main Author Image'><div class='widget Image' data-version='2' id='Image2'>
                        <div class='widget-content'>
                            <style type='text/css'>
                                #intro-author-wrap{display:block}
                                #intro-author-photo .author-image{background-image:url('https://3.bp.blogspot.com/-B6YHZUcUn6w/XUAZIPcgvPI/AAAAAAAAHA8/nfDBaBT2J9cHj4A5ej9KJ3uiyo5QKrFgwCK4BGAYYCw/s1600/Business%20Man%20Png.png')}
                            </style>
                            <div id='intro-author-photo'>
                                <span class='author-image'></span>
                            </div>
                        </div>
                    </div></div>
                <div class='author-list right-side-widget section' id='intro-services-right' name='Right Author Services'><div class='widget Image' data-version='2' id='Image21'>
                        <div class='widget-content'>
                            <style type='text/css'>
                                #intro-services-right{display:block}
                            </style>
                            <div class='service-content'>
                                <span class='service-icon'><i class='fa fa-shopping-cart'></i></span>
                                <div class='service-content-details'>
                                    <h3 class='service-title'>Manage Productivity </h3>
                                    <p class='service-snippet'>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                </div>
                            </div>
                        </div>
                    </div><div class='widget Image' data-version='2' id='Image22'>
                        <div class='widget-content'>
                            <style type='text/css'>
                                #intro-services-right{display:block}
                                //4.bp.blogspot.com/-P9JKL3gNPLw/W1JALZWqyEI/AAAAAAAACd4/CVUxHZ9ol9cPwqTaR-9Rw9tvWmCmIUoiACK4BGAYYCw/s1600/service2.png
                            </style>
                            <div class='service-content'>
                                <span class='service-icon'><i class='fa fa-cloud'></i></span>
                                <div class='service-content-details'>
                                    <h3 class='service-title'>Simply Dummy Text</h3>
                                    <p class='service-snippet'>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                </div>
                            </div>
                        </div>
                    </div><div class='widget Image' data-version='2' id='Image23'>
                        <div class='widget-content'>
                            <style type='text/css'>
                                #intro-services-right{display:block}
                                //4.bp.blogspot.com/-P9JKL3gNPLw/W1JALZWqyEI/AAAAAAAACd4/CVUxHZ9ol9cPwqTaR-9Rw9tvWmCmIUoiACK4BGAYYCw/s1600/service2.png
                            </style>
                            <div class='service-content'>
                                <span class='service-icon'><i class='fa fa-plane'></i></span>
                                <div class='service-content-details'>
                                    <h3 class='service-title'>Simply Dummy Text</h3>
                                    <p class='service-snippet'>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                </div>
                            </div>
                        </div>
                    </div></div>
            </div>
        </div>
    </div>
    <div class='clearfix'></div>
    <div id='intro-services-wrap'>
        <div class='container row'>
            <div class='section' id='intro-services' name='Main Intro Services'><div class='widget Image' data-version='2' id='Image3'>
                    <div class='widget-content'>
                        <style type='text/css'>
                            #intro-services-wrap{display:block}
                        </style>
                        <div class='service-content'>
                            <span class='service-icon'><i class='fa fa-magic'></i></span>
                            <h3 class='service-title'>Branding And Identity</h3>
                            <p class='service-snippet'>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been.</p>
                        </div>
                    </div>
                </div><div class='widget Image' data-version='2' id='Image4'>
                    <div class='widget-content'>
                        <style type='text/css'>
                            #intro-services-wrap{display:block}
                            //4.bp.blogspot.com/-P9JKL3gNPLw/W1JALZWqyEI/AAAAAAAACd4/CVUxHZ9ol9cPwqTaR-9Rw9tvWmCmIUoiACK4BGAYYCw/s1600/service2.png
                        </style>
                        <div class='service-content'>
                            <span class='service-icon'><i class='fa fa-code'></i></span>
                            <h3 class='service-title'>Web Development</h3>
                            <p class='service-snippet'>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been.</p>
                        </div>
                    </div>
                </div><div class='widget Image' data-version='2' id='Image5'>
                    <div class='widget-content'>
                        <style type='text/css'>
                            #intro-services-wrap{display:block}
                            //3.bp.blogspot.com/-RLAerjh690g/W1JAOxKnfzI/AAAAAAAACeA/8vdT4ih2hG4jRJjmj153-hT8punUWAbdgCK4BGAYYCw/s1600/service3.png
                        </style>
                        <div class='service-content'>
                            <span class='service-icon'><i class='fa fa-paper-plane-o'></i></span>
                            <h3 class='service-title'>Social Media Marketing</h3>
                            <p class='service-snippet'>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been.</p>
                        </div>
                    </div>
                </div></div>
        </div>
    </div>
    <!-- Content Wrapper -->
    <div id='content-wrapper'>
        <div class='clearfix'></div>
        <div id='testimonial-wrap'>
            <div class='container row'>
                <div class='head-text section' id='head-text2' name='Headline Text 02'><div class='widget Text' data-version='2' id='Text2'>
                        <div class='widget-title'>
                            <h3 class='title'>
                                What our clients say
                            </h3>
                        </div>
                        <p class='widget-content'>Lorem Ipsum has been the industry's standard dummy text.</p>
                    </div></div>
                <div class='section' id='testimonial' name='Main Testimonials'><div class='widget Image' data-version='2' id='Image6'>
                        <div class='widget-content'>
                            <style type='text/css'>
                                #testimonial-wrap{display:block}
                            </style>
                            <div class='testi-avatar'><img alt='Richard Roe' src='../1.bp.blogspot.com/-DSIbDKXimos/WiF8S_gbs1I/AAAAAAAAEVQ/JtpWT4R_n04Ulh4LXEIZFX9OZZ7_uDdcQCEwYBhgL/s280/13.jpg'/></div>
                            <div class='testi-info'>
                                <h3 class='testi-title'>Richard Roe</h3>
                                <span class='testi-meta'>UX Designer</span>
                                <p class='testi-snippet'>Lorem Ipsum passages, and more recently with desktop publishing software.</p>
                            </div>
                        </div>
                    </div><div class='widget Image' data-version='2' id='Image7'>
                        <div class='widget-content'>
                            <style type='text/css'>
                                #testimonial-wrap{display:block}
                            </style>
                            <div class='testi-avatar'><img alt='Janie Doe' src='../3.bp.blogspot.com/-y7hzgwZ7Yxg/WiF8RpkgYuI/AAAAAAAAEVQ/-c6PNrxIkyoUmhB0IKXH79f_MPVrpA0gQCEwYBhgL/s280/11.jpg'/></div>
                            <div class='testi-info'>
                                <h3 class='testi-title'>Janie Doe</h3>
                                <span class='testi-meta'>UI Designer</span>
                                <p class='testi-snippet'>Lorem Ipsum passages, and more recently with desktop publishing software.</p>
                            </div>
                        </div>
                    </div><div class='widget Image' data-version='2' id='Image8'>
                        <div class='widget-content'>
                            <style type='text/css'>
                                #testimonial-wrap{display:block}
                            </style>
                            <div class='testi-avatar'><img alt='Katie Fox' src='../1.bp.blogspot.com/-T_NhfWZeL7E/XRoCNN73WvI/AAAAAAAAGzE/JwMAAJZaNVEjuZqbhCn1P1XXi9KfBxq5wCLcBGAs/s280/6.jpg'/></div>
                            <div class='testi-info'>
                                <h3 class='testi-title'>Katie Fox</h3>
                                <span class='testi-meta'>Fashion Blogger</span>
                                <p class='testi-snippet'>Lorem Ipsum passages, and more recently with desktop publishing software.</p>
                            </div>
                        </div>
                    </div><div class='widget Image' data-version='2' id='Image9'>
                        <div class='widget-content'>
                            <style type='text/css'>
                                #testimonial-wrap{display:block}
                            </style>
                            <div class='testi-avatar'><img alt='Melisa Edwards' src='../1.bp.blogspot.com/-wHVf1CDEwEg/W1q42OF8OcI/AAAAAAAACpE/K9U1nKqRcUsU_2BnbbZWiEI4ay9aoGi8gCK4BGAYYCw/w280/glo3.jpg'/></div>
                            <div class='testi-info'>
                                <h3 class='testi-title'>Melisa Edwards</h3>
                                <span class='testi-meta'>Food Critic</span>
                                <p class='testi-snippet'>Lorem Ipsum passages, and more recently with desktop publishing software.</p>
                            </div>
                        </div>
                    </div></div>
            </div>
        </div>
        <div class='clearfix'></div>
        <div class='email-folower'>
            <div class='row container email-folower-wrap'>
                <div class='custom-email-follow no-items section' id='Email Subscription Widget'>
                </div>
            </div>
        </div>
        <div class='clearfix'></div>
        <!-- Footer Wrapper -->
        <div id='footer-wrapper'>
            <div id='contact-area'>
                <div class='container row'>
                    <div class='contact-col section' id='contact-left' name='Contact Left'><div class='widget Text' data-version='2' id='Text3'>
                            <div class='widget-title'>
                                <h3 class='title'>
                                    Contact Info
                                </h3>
                            </div>

                            <style type='text/css'>
                                #contact-area{display:block}
                            </style>
                            <p class='widget-content'>Lorem Ipsum is simply dummy text of the printing and typesetting has been the industry's.</p>
                        </div><div class='widget LinkList' data-version='2' id='LinkList2'>
                            <div class='widget-title'>
                                <h3 class='title'>
                                    Contact List
                                </h3>
                            </div>

                            <style type='text/css'>
                                #contact-area{display:block}
                            </style>
                            <div class='widget-content'>
                                <div class='contact-item item-0'>
                                    <div class='contact-icon'><i class='fa fa-skype'></i></div><span class='item-desc'>Skype: skype.username </span>
                                </div>
                                <div class='contact-item item-1'>
                                    <div class='contact-icon'><i class='fa fa-behance'></i></div><span class='item-desc'>Behance.net/username</span>
                                </div>
                                <div class='contact-item item-2'>
                                    <div class='contact-icon'><i class='fa fa-whatsapp'></i></div><span class='item-desc'>WhatsApp: +01 99 8877-6655</span>
                                </div>
                            </div>
                        </div></div>
                    <div class='contact-col section' id='contact-right' name='Contact Right'><div class='widget ContactForm' data-version='2' id='ContactForm1'>
                            <div class='widget-title'>
                                <h3 class='title'>
                                    Contact Form
                                </h3>
                            </div>

                            <style type='text/css'>
                                #contact-area{display:block}
                            </style>
                            <div class='contact-form-widget'>
                                <div class='form'>
                                    <form name='contact-form'>
                                        <input class='contact-form-name' id='ContactForm1_contact-form-name' name='name' placeholder='Name' size='30' type='text' value=''/>
                                        <input class='contact-form-email' id='ContactForm1_contact-form-email' name='email' placeholder='Email *' size='30' type='text' value=''/>
                                        <textarea class='contact-form-email-message' cols='25' id='ContactForm1_contact-form-email-message' name='email-message' placeholder='Message *' rows='5'></textarea>
                                        <input class='contact-form-button contact-form-button-submit' id='ContactForm1_contact-form-submit' type='button' value='Send'/>
                                        <p class='contact-form-error-message' id='ContactForm1_contact-form-error-message'></p>
                                        <p class='contact-form-success-message' id='ContactForm1_contact-form-success-message'></p>
                                    </form>
                                </div>
                            </div>
                        </div></div>
                </div>
            </div>
            <div class='clearfix'></div>
            <div id='footer-copyright'>
                <div class='container row'>
                    <div class='social-footer section' id='social-footer' name='Social Footer'><div class='widget LinkList' data-version='2' id='LinkList76'>
                            <div class='widget-content'>
                                <ul class='social'>
                                    <li class='facebook'><a href='#' target='_blank'></a></li>
                                    <li class='twitter'><a href='#' target='_blank'></a></li>
                                    <li class='pinterest'><a href='#' target='_blank'></a></li>
                                    <li class='instagram'><a href='#' target='_blank'></a></li>
                                </ul>
                            </div>
                        </div></div>
                    <div class='copyright-area'>Copyright &#169; <script type='text/javascript'>var creditsyear = new Date();document.write(creditsyear.getFullYear());</script>
                        <a href='index.html' itemprop='url'><span itemprop='name'>Affiliation</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="../vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="../vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="../vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="../vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="../vendors/Flot/jquery.flot.js"></script>
<script src="../vendors/Flot/jquery.flot.pie.js"></script>
<script src="../vendors/Flot/jquery.flot.time.js"></script>
<script src="../vendors/Flot/jquery.flot.stack.js"></script>
<script src="../vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="../vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="../vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="../vendors/moment/min/moment.min.js"></script>
<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>


<!--for without theme script -->

{{--modal js --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"
        integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/"
        crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.js"></script>
{{--for data tanbe script boosttrap 4 --}}
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
{{--for datatable --}}
<script>
    $(document).ready(function () {
        $('#datatableid').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [7, 10, 25, 50, -1],
                [7, 10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                // search: "_INPUT_",
                searchPlaceholder: "Search record"
            }
        });

    });
</script>

{{--for --}}
<script type="text/javascript">
    $(document).ready(function () {
        var table = $('#table_id').DataTable();
    });
</script>
<!--/endfor without theme script -->


</body>
</html>

