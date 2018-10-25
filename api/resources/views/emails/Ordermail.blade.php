<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<style media="screen">
.container {width: 80%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;}
.center{text-align: center;}
li{list-style-type: none;}
</style>
<body>
  <div class="container">
    <img src="{{url('/')}}/images/logo-printing-lab-new-york.svg" alt="" style="padding-top: 60px;width: 20%;position: relative;left: 40%;padding-bottom: 100px;">
    <div style="padding: 0% 15% 0% 15%;text-align: center;">
      <h1 class="center">A new order is resived</h1>
      <p style="font-size: 19px;">Merchant Email Receipt
      </p>
      <br>
      @foreach ($datos['result'] as $dto )
      <p style="font-size: 25px;
      text-decoration: underline;">Order: #{{$dto->numero_venta}}</p>
      @endforeach
    </div>
    <div style="width: 100%;">
      <table class="table"  style="margin: auto;">
        <thead>
          <tr>
            <th scope="col">PRODUCT DETAILS</th>
            <th scope="col">PAY METHOD </th>
            <th scope="col">SHIPPING METHOD</th> 
            <th scope="col">TAX</th>
            <th scope="col">ORDER DATE</th>
            <th scope="col">TOTAL</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($datos['sales'] as $dt )
          <tr>
            <td style="width: 50%; border: 1px gray solid;padding: 5px">
              <div style="float: left;width:30%">
                <img src="{{url('/')}}/upload-products/{{$dt->archivo_a}}" style="width: 80%;padding: 15% 10% 0% 10%">
                <a href="{{url('/')}}/upload-products/{{$dt->archivo_a}}" download >Download preview</a>
                <br>
                <img src="{{url('/')}}/upload-products/{{$dt->archivo_b}}" style="width: 80%;padding: 0% 10% 0% 10%">
                <a href="{{url('/')}}/upload-products/{{$dt->archivo_b}}" download >Download preview</a>
              </div>
              <div style="float: left;">
                <h2>{{$dt->nombre}}</h2>
                <li><strong>Size: </strong>{{$dt->attr1}}
                </li>
                <li><strong>Paper Type: </strong>{{$dt->attr2}}
                </li>
                <li><strong>Edge Color: </strong>{{$dt->attr6}}
                </li>
                <li><strong> Printed Side: </strong>{{$dt->attr3}}
                </li>
                <li><strong>Coating: </strong>{{$dt->attr4}}
                </li>
                <li><strong>Corners: </strong>{{$dt->attr5}}
                </li>
                <li><strong>Ships In: </strong>{{$dt->attr11}}
                </li>
                <li><strong>Quantity: </strong>{{$dt->attr10}}
                </li>
              </div>
            </td>
            <td style="text-align: center;border: 1px gray solid;padding: 5px">{{$datos['paytype']}}</td>
            <td style="text-align: center;border: 1px gray solid;padding: 5px">{{$dt->Shiping}}<br>{{$dt->Shipingtotal}}</td>
            <td style="text-align: center;border: 1px gray solid;padding: 5px">{{$dt->tax}}</td>
            <td style="text-align: center;border: 1px gray solid;padding: 5px">{{$dt->date}}</td>
            <td style="text-align: center;font-size: 30px;color:#f4005b;border: 1px gray solid;padding: 5px"><b>${{$dt->attr12}}</b></td>
          </tr>
          @endforeach
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
              @foreach ($datos['result'] as $dto )
              <li style="float: right"><strong>ORDER TOTAL: </strong><b style="font-weight: 900;color:#f4005b;font-size: 30px;">{{$dt->total}}</b>
              </li>
              @endforeach
            </td>
          </tr>
        </tbody>  
      </table>
    </div>
    <div style="width: 50%;float: left;padding-top: 160px;"><img src="{{url('/')}}/images/logo-printing-lab-new-york.svg" alt="" style="width:25%;position: relative;left:0%;">
    </div>
    <div style="width: 50%;float: right;padding-top: 160px;">
      <p style="position: relative;float: right;">(201) 305 0404  /  info@printinglab.com  /  609 55th Street, West New York, NJ 07093</p>
    </div>
  </div>
</body>
</html>
