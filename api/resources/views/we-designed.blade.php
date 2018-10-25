@extends('layouts.app')
@section('title')
We Design It For You - Printing Lab
@endsection
@section('content')
<div class="container textoscontainer">
  <div class="col-md-12 title-wedesign">
    <h2><strong>We Design It For You</strong></h2>
  </div>
  <form  name="formdata" action="{{route('cart')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="hidden" name="idP" value="{{$id_products}}">
    <input type="hidden" name="idC" value="{{$id_category}}">
    <input type="hidden" name="idF" value="{{$id_specs}}">
    <input type="hidden" name="idE" value="{{$id_specs}}">
    <input type="hidden" name="caras" value="{{$face}}">
    <input type="hidden" name="we_designed" value="true">
    <div class="row">
      <div class="col-md-6">
        <h5><strong>UPLOAD AN EXANPLE OF WHAT YOU WANT:</strong></h5>
        <p><i>Only JPG,PNG,PDF,DOC,PPT</i></p>
      </div>
      <div class="col-md-6">
        <div class="row" style="text-align: -webkit-center;">
          @if($face=='2')
          <div class="col-md-6">
            <div class="filex">
              <div class="outputx">
                <p></p>
              </div>
              <p>UPLOAD YOUR FILE - FRONT</p>
              <input type="file" id="archivox" name="file21" >
            </div>
          </div>
          <div class="col-md-6">
            <div class="filey">
              <div class="outputy">
                <p></p>
              </div>
              <p>UPLOAD YOUR FILE- BACK</p>
              <input type="file" id="archivoy" name="file22">
            </div>
          </div>
          @else
          <div class="col-md-12">
            <div class="file">
              <div class="output">
                <p></p>
              </div>
              <p>UPLOAD YOUR FILE</p>
              <input type="file" id="archivounouno" name="archivo">
            </div>
          </div>
          @endif
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h5><strong>DETAILS ABOUT YOUR PRODUCT:</strong></h5>
      </div>
      <div class="col-md-12">
        <p><i>How do you want your design {{$nombre}} </i></p>
      </div>
    </div>
    <div class="col-md-12">
      <textarea class="form-control-designed" id="text" rows="5" name="comentario" required></textarea>
    </div>
    <div class="col-md-12" style="text-align: -webkit-right;">
      <button type="submit" class="btnsubmitWeDesigned" value="Submit">
        CONTINUE TO CHECKOUT
      </button>
    </div>
  </form>
</div>
@endsection
@section('scripts')
<script>
$('.btnsubmitWeDesigned').click(function(){
  if ($.trim($('#text').val()).length < 1) {
    $.confirm({
      title: 'Alert!',
      content: 'The field is empty, please fill it.',
      draggable: false,
      buttons: {
        confirm: function () {
        },
      }
    })
    return false;
  }  else{
    return true;
  }
});

$("#archivounouno").on('change', function(e){
  var input = document.getElementById('archivounouno');
  var clicked = e.target;
  var file = clicked.files[0];
  if (file.size>20000000 ) {
    $('.output p').text('');
    $("#archivounouno").val('');
    $.confirm({
      title: 'Alert!',
      content: 'The file can not exceed 3MB',
      draggable: false,
      buttons: {
        confirm: function () {
        },
      }
    })
  }else {

    var filePath = 	document.getElementById('archivounouno').value;
    var allowedExtensions = /(.jpg|.psd|.png|.ai|.pdf|.zip|.ZIP|.PSD|.PNG|.AI|.PDF|.jpeg)$/i;
    if (!allowedExtensions.exec(filePath)) {

      $('.output p').text('');
      $("#archivounouno").val('');
      $.confirm({
        content: 'The extension of the file is not allowed',
        draggable: false,
        buttons: {
          confirm: function () {
          },
        }
      })
    }else{
      var ruta = $(this).val();
      var substr = ruta.replace('C:\\fakepath\\', '');
      $('.output p').text(substr);
      $('.output').css({
        "opacity": 1,
        "transform": "translateY(0px)"
      });
      $('.file > p').addClass('change');
    }
  }
});

$('#archivox').on('change', function(e){
  //validación peso del archivo en by
  var input = document.getElementById('archivox');
  var clicked = e.target;
  var file = clicked.files[0];
  if (file.size>20000000 ) {
    $('.outputx p').text('');
    $("#archivox").val('');
    $.confirm({
      title: 'Alert!',
      content: 'The file can not exceed 20Mb',
      draggable: false,
      buttons: {
        confirm: function () {
        },
      }
    })
  }else {
    var filePath = 	document.getElementById('archivox').value;
    var allowedExtensions = /(.jpg|.psd|.png|.ai|.pdf|.zip|.ZIP|.PSD|.PNG|.AI|.PDF|.jpeg)$/i;
    //validacion extension
    if (!allowedExtensions.exec(filePath)) {
      $('.outputx p').text('');
      $("#archivox").val('');
      $.confirm({
        title: 'Alert!',
        content: 'The extension of the file is not allowed',
        draggable: false,
        buttons: {
          confirm: function () {
          },
        }
      })
    }else{
      var ruta = $(this).val();
      var substr = ruta.replace('C:\\fakepath\\', '');
      $('.outputx p').text(substr);
      $('.outputx').css({
        "opacity": 1,
        "transform": "translateY(0px)"
      });
      $('.filex > p').addClass('change');
    }
  }
});

$('#archivoy').on('change', function(e){
  //validación peso del archivo en by
  var input = document.getElementById('archivoy');
  var clicked = e.target;
  var file = clicked.files[0];
  if (file.size>20000000 ) {
    $('.outputy p').text('');
    $("#archivoy").val('');
    $.confirm({
      title: 'Alert!',
      content: 'The file can not exceed 20Mb',
      draggable: false,
      buttons: {
        confirm: function () {
        },
      }
    })
  }else {
    var filePath = 	document.getElementById('archivoy').value;
    var allowedExtensions = /(.jpg|.psd|.png|.ai|.pdf|.zip|.ZIP|.PSD|.PNG|.AI|.PDF|.jpeg)$/i;
    //validacion extension
    if (!allowedExtensions.exec(filePath)) {
      $('.outputy p').text('');
      $("#archivoy").val('');
      $.confirm({
        title: 'Alert!',
        content: 'The extension of the file is not allowed',
        draggable: false,
        buttons: {
          confirm: function () {
          },
        }
      })
    }else{
      var ruta = $(this).val();
      var substr = ruta.replace('C:\\fakepath\\', '');
      $('.outputy p').text(substr);
      $('.outputy').css({
        "opacity": 1,
        "transform": "translateY(0px)"
      });
      $('.filey > p').addClass('change');
    }
  }
});
</script>
@endsection
