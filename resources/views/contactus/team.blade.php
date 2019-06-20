<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Our Team</title>
    
 <link href="{{ asset('') }}css/font.css" rel="stylesheet">    
<link rel="stylesheet" href="{{ asset('') }}css/css1.css">
<link rel="stylesheet" href="{{ asset('') }}css/css2.css">
<link rel="stylesheet" href="{{ asset('') }}css/css3.css">

<style>
        
body{
    font-family: 'Roboto Condensed', sans-serif;
    background: url('{{ asset('') }}img/swift.jpg');
    background-position: 1%;
    overflow: hidden;
    color: white;
    
}
    
.testimonial-arrow {
    z-index: 1;
    bottom: -14px;
    left: 45%;
    width: 10px;
    height:0;
    border-top: 15px solid #ffffff;
    border-left: 13px solid transparent;
    border-right: 13px solid transparent;
}
.testimonial-text {
    background: #ffffff;
    padding: 3rem 1.4rem;
    padding-bottom: 15px;
    border-radius: 10px;
    color:black;
    font-size: 14px;
}
.testimonial-text p {
    padding-bottom: 1.8rem;
    line-height: 24px;
}
.testimonial-date {
    font-size: 14px;
    color: #acacac;
}
.testimonial-photo {
    height: 89px;
    width: 89px;
    margin: 10px auto 0 auto;
}
.testimonial-photo > img {
    -webkit-border-radius: 50%; border-radius: 50%;
}
.testimonial-item h5 {
    font-size: 18px;
}
.testimonial-item p{
    font-size: 14px;
}
.testimonial-item {
    cursor: pointer;
}
.testimonial-text:hover {
    background: rgb(3, 95, 42);
}
.testimonial-text:hover p {
    color: #ffffff;
}
.testimonial-text:hover .testimonial-date {
    color: #fff;
}
.testimonial-text:hover .testimonial-arrow {
    border-top-color: rgb(3, 95, 42);
}

/* testimonial two */
.testimonial-two{
    background: #fff;
    border-radius: 10px;
    padding: 30px;
}
.testimonial-post {
    overflow: hidden;
    display: table;
}
.testimonial-post .post, .testimonial-post .text-content {
    display: table-cell;
}
.testimonial-post .post {
    height: 60px;
    width: 60px;
}
.testimonial-post .post > img {
    width: 100%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}
.testimonial-post .text-content {
    vertical-align: middle;
    padding-left: 10px;
}
.testimonial-post:hover a, .testimonial-post:focus a {
    color: #f1c30f;
}
.testimonial-two .testimonial-para:before{
    display: block;
    font-size: 33px;
    color: #ffffff;
    margin-bottom: 15px;
    content: "\e67f";
    font-family: 'themify';
}
.testimonial-two .testimonial-item h5{
    margin-top: 10px;
    margin-bottom: 4px;
}
.testimonial-two .testimonial-item .rating{
    margin-top: 5px;
}
.testimonial-two .testimonial-item .rating i{
    font-size: 15px;
    color: #f1c30f;
}

</style>


<section id="client"  >
        <div class="container-fluid testimonial-container">
            <div class="row">
            
                <div class="col-md-12">
                    <div class="main-title wow fadeIn" data-wow-delay="300ms">
                       <br><br>
                        <h1 class="text-center">
                            <div class="testimonial-photo" ><a href="/"><img alt="" style="width: 100px" src="{{ Storage::url(setting()->logo) }}"></a></div>
                        </h1>
                         
                    </div>
                </div>
            </div>
            <br><br>
            <div class="row m-0">
                <div class="col-sm-12 align-items-center">
                    <div class="owl-testimonial owl-carousel owl-theme">
                        <div class="testimonial-item  text-center">
                            <div class="testimonial-box">
                                <div class="testimonial-text">
                                    <p>As the project leader, this website is heavly inspired by his ideas.<br> He provided the database and the whole concept of the site. </p>
                                    {{-- <span class="testimonial-arrow position-absolute"></span> --}}
                                </div>
                            </div>
                            <div class="testimonial-photo"><img alt="" src="{{ asset('') }}img/Gomaa.jpg"></div>
                            <h5 class="text-capitalize color-black mt-3 mb-1">Mohamed Gomaa</h5>
                            <p class="color-pink">Back-End Developer</p>
                        </div>
                        <div class="testimonial-item item text-center">
                            <div class="testimonial-text position-relative mb-4">
                                <p>Followed Gomaa's footsteps in designing and working with database and managed to put his touches and improve the functionality of the site.</p>
                                <span class="testimonial-arrow position-absolute"></span>
                            </div>

                            <div class="testimonial-photo"><img alt="" src="{{ asset('') }}img/Omda.jpg"></div>
                            <h5 class="text-capitalize color-black mt-3 mb-1">Mohamed Ebrahim</h5>
                            <p class="color-pink">Oracale Developer</p>
                        </div>
                        <div class="testimonial-item  item text-center">
                            <div class="testimonial-text position-relative mb-4">
                                <p>As the main designer of the project, Belal worked with Hamdy to help provide a magnificent and interactive user interface.</p>
                                <span class="testimonial-arrow position-absolute"></span>
                            </div>
                            <div class="testimonial-photo"><img alt="" src="{{ asset('') }}img/Belal.jpg"></div>
                            <h5 class="text-capitalize color-black mt-3 mb-1">Belal Mahmoud</h5>
                            <p class="color-pink">Web Designer</p>
                        </div>
                        <div class="testimonial-item item text-center">
                            <div class="testimonial-text position-relative mb-4">
                                <p>As one of the designers on this project, He worked with Belal on designing most of the pages on the site and the result was fruitful.</p>
                                <span class="testimonial-arrow position-absolute"></span>
                            </div>


                            <div class="testimonial-photo"><img alt="" src="{{ asset('') }}img/Hamdy.jpg"></div>
                            <h5 class="text-capitalize color-black mt-3 mb-1">Ahmed Hamdy</h5>
                            <p class="color-pink">Web Designer</p>
                        </div>
                        <div class="testimonial-item  item text-center">
                            <div class="testimonial-text position-relative mb-4">
                                <p>Worked hard with Omar to provide the project's book that explains and discusses the concepts and purposes of the project.</p>
                                <span class="testimonial-arrow position-absolute"></span>
                            </div>
                            <div class="testimonial-photo"><img alt="" src="{{ asset('') }}img/adel.jpg"></div>
                            <h5 class="text-capitalize color-black mt-3 mb-1">Ahmed Adel</h5>
                            <p class="color-pink">Web Developer</p>
                        </div>
                        
                        <div class="testimonial-item  item text-center">
                            <div class="testimonial-text position-relative mb-4">
                                <p>Worked with Adel on the book and didn't fail to add his wonderful touches to make the book more understandable and constructive.</p>
                                <span class="testimonial-arrow position-absolute"></span>
                            </div>
                            <div class="testimonial-photo"><img alt="" src="{{ asset('') }}img/Omar.jpg"></div>
                            <h5 class="text-capitalize color-black mt-3 mb-1">Omar Essam</h5>
                            <p class="color-pink">Web Designer</p>
                        </div>
                        <div class="testimonial-item  item text-center">
                            <div class="testimonial-text position-relative mb-4">
                                <p>Managed to get some work done in the designing area and pitched a few ideas all over the site in addition to working on the "Contact us!" Page. </p>
                                <span class="testimonial-arrow position-absolute"></span>
                            </div>
                            <div class="testimonial-photo"><img alt="" src="{{ asset('') }}img/Gohary.jpg"></div>
                            <h5 class="text-capitalize color-black mt-3 mb-1">Mohamed ElGohary</h5>
                            <p class="color-pink">Web Developer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('') }}js/jq1.js"></script>
    
    <script src="{{ asset('') }}js/jq2.js"></script>
    
    <script>
    $(function(){
   
     if ($("body").hasClass("rtl-layout")) {
        $(".owl-team").owlCarousel({
            items: 3,
            margin: 30,
            dots: true,
            nav: true,
            loop: true,
            autoplay: true,
            smartSpeed: 1000,
            navSpeed: true,
            autoplayHoverPause: true,
            responsiveClass: true,
            rtl: callback,
            responsive: {
                992: {
                    items: 4,
                },
                600: {
                    items: 2,
                },
                320: {
                    items: 1,
                },
            }
        });
        $(".owl-testimonial").owlCarousel({
            autoplay: 1000,
            smartSpeed: 1500,
            margin: 30,
            slideBy: 1,
            autoplayHoverPause: true,
            loop: true,
            dots: true,
            nav: true,
            rtl: callback,
            responsive: {
                1200: {
                    items: 4
                },
                992: {
                    items: 3
                },
                600: {
                    items: 2
                },
                320: {
                    items: 1
                },
            }
        });
    }

   

    /* Testimonial One */
    $(".owl-testimonial").owlCarousel({
        autoplay: 1000,
        smartSpeed: 1500,
        margin: 30,
        slideBy: 1,
        autoplayHoverPause: true,
        loop: true,
        dots: true,
        nav: true,
        responsive: {
            1200: {
                items: 4
            },
            992: {
                items: 3
            },
            600: {
                items: 2
            },
            320: {
                items: 1
            },
        }
    });

     
    
    });
    
    
    </script>

</head>
</html>