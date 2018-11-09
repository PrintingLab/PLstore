@extends('layouts.app')
@section('title')
Printing Lab: Signage, Vehicle Graphics, Large Format, Trade Shows, Custom Apparel, Marketing Products - New Jersey
@endsection
@section('content')
 <div style="display: none;"  id="carouselExampleIndicatorsM" class="carousel slide mobile" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicatorsM" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicatorsM" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicatorsM" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img src="images/mobile-slider-index-printing-lab-1.jpg">
    </div>
    <div class="carousel-item">
      <img src="images/mobile-slider-index-printing-lab-2.jpg">
    </div>
    <div class="carousel-item">
      <img src="images/mobile-slider-index-printing-lab-3.jpg">
    </div>
  </div>
</div>
<div style="display: none;"  id="carouselExampleIndicators" class="carousel slide pc" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img src="images/slider-index-printing-lab-1.jpg">
    </div>
    <div class="carousel-item">
      <img src="images/slider-index-printing-lab-2.jpg">
    </div>
    <div class="carousel-item">
      <img src="images/slider-index-printing-lab-3.jpg">
    </div>
  </div>
</div> 
<style>
@media (max-width:425px){.bg-video{display: none;}#carouselExampleIndicatorsM{display: block!important}}
.bg-video {
  height: 100vh;
  overflow: hidden;
  pointer-events: none;
  /*position: absolute;*/
  top: 0;
  left: 0;
  width: 100%;
  z-index: 0;
}
.bg-video #player {
  /*
  max-width: 1000%;
  margin-left: 0px;
  margin-top: -244px;*/
  width: 100%;
  /*  height: 890.438px;*/
height: 130vh;
}
.bg-video .overlay {
  top: 0;
  left: 0;
  width: 100%;
  height: 100vh;
  z-index: 0;
}
</style>
<div class="bg-video ">
  <div class="overlay">
  </div>
  <div id="player">
  </div>
</div>
<div class="text-video col-md-12">
  <h1>AMPLIFY</h1>
  <h2>YOUR BRAND </h2>
  <p>
    We use the highest quality material, produced and installed by the most experienced
  </p>
  <p>
    and professional individuals to deliver the best most durable and relieable solutions.
  </p>
  <button type="button" name="button">
    <a href="{{url('/contact-us')}}">
      GET A FREE QUOTE
    </a>
  </button>
</div>
<script>
  var tag = document.createElement('script');
  tag.src = "https://www.youtube.com/iframe_api";
  var firstScriptTag = document.getElementsByTagName('script')[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
  var player;
  function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
      videoId: 'f6AEXjVdHSY',
        height: '100%',
    width: '100%',
      events: {
      'onReady': onPlayerReady,
       },
      playerVars: {
        autoplay: 1,
        controls: 0,
        modestbranding: 1,
        loop: 1,
        playlist: 'f6AEXjVdHSY',
        start: 5
      }
    });
  }
  function onPlayerReady(event) {
  player.playVideo();
  player.mute();
}
</script>
<div class="col-md-12 box">
  <h2>SERVICES</h2>
</div>
<div class="container-fluid ">
  <div class="row divsservicios">
    <div class="col-md-4">
      <div class="servicios1">
        <a href="{{url('/signage')}}">
          <img src="images/printing-lab-co-new-york-nj-signage-design-online.jpg" alt="Avatar" class="image">
          <div class="overlay1 divtxt">
            <div class="text">SIGNAGE</div>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="servicios2">
        <a href="{{url('/vehicle-graphics')}}">
          <img src="images/printing-lab-co-new-york-nj-vehicle-graphics-design-online.jpg" alt="Avatar" class="image">
          <div class="overlay2  divtxt">
            <div class="text">VEHICLE GRAPHICS</div>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="servicios3">
        <a href="{{url('/large-format')}}">
          <img src="images/printing-lab-co-new-york-nj-large-format-design-online.jpg" alt="Avatar" class="image">
          <div class="overlay3 divtxt">
            <div class="text">LARGE FORMAT</div>
          </div>
        </a>
      </div>
    </div>
  </div>
  <div class="row divsservicios">
    <div class="col-md-4">
      <a href="{{url('/trade-shows')}}">
        <div class="servicios4">
          <img src="images/printing-lab-co-new-york-nj-trade-shows-design-online.jpg" alt="Avatar" class="image">
          <div class="overlay4 divtxt">
            <div class="text">TRADE SHOWS</div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-4">
      <div class="servicios5">
        <a href="{{url('/custom-apparel')}}">
          <img src="images/printing-lab-co-new-york-nj-custom-apparel-tshirts-mugs-clothes-design-online.jpg" alt="Avatar" class="image">
          <div class="overlay5 divtxt">
            <div class="text">CUSTOM APPAREL</div>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="servicios6">
        <a href="marketing-products">
          <img src="images/printing-lab-co-new-york-nj-marketing-products-design-online.jpg" alt="Avatar" class="image">
          <div class="overlay6 divtxt" >
            <div class="text">MARKETING PRODUCTS</div>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>
<div class="container containerClientes pc">
  <h2 class="box">SOME OF OUR CLIENTS</h2>
  <div class="row">
    <div class="col-md-12">
      <div class="carousel slide" data-ride="carousel" >
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <div class="slider-clientes row">
              <div class="col-md-2 col-sm-2 col-xs-2" id="cliente1">
              </div>
              <div class="col-md-2 col-sm-2 col-xs-2" id="cliente2">
              </div>
              <div class="col-md-2 col-sm-2 col-xs-2" id="cliente3">
              </div>
              <div class="col-md-2 col-sm-2 col-xs-2" id="cliente4">
              </div>
              <div class="col-md-2 col-sm-2 col-xs-2" id="cliente5">
              </div>
              <div class="col-md-2 col-sm-2 col-xs-2" id="cliente6">
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class=" slider-clientes row">
              <div class="col-md-2 col-sm-2 col-xs-2" id="cliente7" >
              </div>
              <div class="col-md-2 col-sm-2 col-xs-2" id="cliente8" >
              </div>
              <div class="col-md-2 col-sm-2 col-xs-2" id="cliente9" >
              </div>
              <div class="col-md-2 col-sm-2 col-xs-2" id="cliente10" >
              </div>
              <div class="col-md-2 col-sm-2 col-xs-2" id="cliente11" >
              </div>
              <div class="col-md-2 col-sm-2 col-xs-2" id="cliente12" >
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class=" slider-clientes row">
              <div class="col-md-2 col-sm-2 col-xs-2" id="cliente13">
              </div>
              <div class="col-md-2 col-sm-2 col-xs-2" id="cliente14">
              </div>
              <div class="col-md-2 col-sm-2 col-xs-2" id="cliente15">
              </div>
              <div class="col-md-2 col-sm-2 col-xs-2" id="cliente16">
              </div>
              <div class="col-md-2 col-sm-2 col-xs-2" id="cliente17">
              </div>
              <div class="col-md-2 col-sm-2 col-xs-2" id="cliente18">
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class=" slider-clientes row">
              <div class="col-md-2 col-sm-2 col-xs-2" id="cliente19">
              </div>
              <div class="col-md-2 col-sm-2 col-xs-2" id="cliente20">
              </div>
              <div class="col-md-2 col-sm-2 col-xs-2" id="cliente21">
              </div>
              <div class="col-md-2 col-sm-2 col-xs-2" id="cliente22">
              </div>
              <div class="col-md-2 col-sm-2 col-xs-2" id="cliente23">
              </div>
              <div class="col-md-2 col-sm-2 col-xs-2" id="cliente24">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container containerClientes mobile" >
  <h2 class="box">SOME OF OUR CLIENTS</h2>
  <div class="row">
    <div class="col-md-12">
      <div class="carousel slide movil-clientes" data-ride="carousel" >
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <div class="slider-clientes row">
              <div class="col-sm-4 col-4">
                <img src="images/clientes/client-printing-lab-1.png" >
              </div>
              <div class="col-sm-4 col-4">
                <img src="images/clientes/client-printing-lab-2.png" >
              </div>
              <div class="col-sm-4 col-4">
                <img src="images/clientes/client-printing-lab-3.png" >
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="slider-clientes row">
              <div class="col-sm-4 col-4">
                <img src="images/clientes/client-printing-lab-4.png" >
              </div>
              <div class="col-sm-4 col-4">
                <img src="images/clientes/client-printing-lab-5.png" >
              </div>
              <div class="col-sm-4 col-4">
                <img src="images/clientes/client-printing-lab-6.png" >
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="slider-clientes row">
              <div class="col-sm-4 col-4">
                <img src="images/clientes/client-printing-lab-7.png" >
              </div>
              <div class="col-sm-4 col-4">
                <img src="images/clientes/client-printing-lab-8.png" >
              </div>
              <div class="col-sm-4 col-4">
                <img src="images/clientes/client-printing-lab-9.png" >
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="slider-clientes row">
              <div class="col-sm-4 col-4">
                <img src="images/clientes/client-printing-lab-10.png" alt="">
              </div>
              <div class="col-sm-4 col-4">
                <img src="images/clientes/client-printing-lab-11.png" alt="">
              </div>
              <div class="col-sm-4 col-4">
                <img src="images/clientes/client-printing-lab-12.png" alt="">
              </div>
            </div>
          </div>
          <div class=" carousel-item">
            <div class=" slider-clientes row">
              <div class="col-sm-4 col-4">
                <img src="images/clientes/client-printing-lab-13.png" alt="">
              </div>
              <div class="col-sm-4 col-4">
                <img src="images/clientes/client-printing-lab-14.png" alt="">
              </div>
              <div class="col-sm-4 col-4">
                <img src="images/clientes/client-printing-lab-15.png" alt="">
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="slider-clientes row">
              <div class="col-sm-4 col-4">
                <img src="images/clientes/client-printing-lab-16.png" alt="">
              </div>
              <div class="col-sm-4 col-4">
                <img src="images/clientes/client-printing-lab-17.png" alt="">
              </div>
              <div class="col-sm-4 col-4">
                <img src="images/clientes/client-printing-lab-18.png" alt="">
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="slider-clientes row">
              <div class="col-sm-4 col-4">
                <img src="images/clientes/client-printing-lab-19.png" alt="">
              </div>
              <div class="col-sm-4 col-4">
                <img src="images/clientes/client-printing-lab-20.png" alt="">
              </div>
              <div class="col-sm-4 col-4">
                <img src="images/clientes/client-printing-lab-21.png" alt="">
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="slider-clientes row">
              <div class="col-sm-4 col-4">
                <img src="images/clientes/client-printing-lab-22.png" alt="">
              </div>
              <div class="col-sm-4 col-4">
                <img src="images/clientes/client-printing-lab-23.png" alt="">
              </div>
              <div class="col-sm-4 col-4">
                <img src="images/clientes/client-printing-lab-24.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-md-12 box2">
  <h2>LOCATE OUR JOBS</h2>
</div>
<div >
  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12083.4339750499!2d-74.0230317!3d40.787125!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x28b4aba3ce92a1b4!2sPrinting+Lab!5e0!3m2!1ses!2sco!4v1520367673415" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
@endsection
