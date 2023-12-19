
<!DOCTYPE html>
<html>
<head>
    <title>Larave Generate Invoice PDF - Nicesnippest.com</title>
</head>
<style type="text/css">
    body{
        font-family: 'Roboto Condensed', sans-serif;
    }
    .m-0{
        margin: 0px;
    }
    .p-0{
        padding: 0px;
    }
    .pt-5{
        padding-top:5px;
    }
    .mt-10{
        margin-top:10px;
    }
    .text-center{
        text-align:center !important;
    }
    .w-100{
        width: 100%;
    }
    .w-50{
        width:50%;   
    }
    .w-85{
        width:85%;   
    }
    .w-15{
        width:15%;   
    }
    .logo img{
        width:45px;
        height:45px;
        padding-top:30px;
    }
    .logo span{
        margin-left:8px;
        top:19px;
        position: absolute;
        font-weight: bold;
        font-size:25px;
    }
    .gray-color{
        color:#5D5D5D;
    }
    .text-bold{
        font-weight: bold;
    }
    .border{
        border:1px solid black;
    }
    table tr,th,td{
        border: 1px solid #d2d2d2;
        border-collapse:collapse;
        padding:7px 8px;
    }
    table tr th{
        background: #F4F4F4;
        font-size:15px;
    }
    table tr td{
        font-size:13px;
    }
    table{
        border-collapse:collapse;
    }
    .box-text p{
        line-height:10px;
    }
    .float-left{
        float:left;
    }
    .total-part{
        font-size:16px;
        line-height:12px;
    }
    .total-right p{
        padding-right:20px;
    }
</style>
<body>


    
<div class="w-50 float-left logo mt-0">


<img src="{{ public_path('img/log-med-menu.png') }}" alt="Logo" height="75px"> <span>Centro holístico Iyasu</span>    

</div>

@foreach($abonos as $abono)
    
<div class="head-title">

    <h3 class="text-center "w-50 m-0 p-0">Factura No. &nbsp;<span>{{ $abono->id }}</span></h3>

</div>

<div style="clear: both;"></div>

</br> </br>




<div class="table-section bill-tbl w-100 mt-10">

    <table class="table w-100 mt-10">

       

        <tr>
            <td class="w-50">Cliente: <p><span >{{ $abono->nombre }}</span></p></td>  

            <td class="w-50">Tel / Cel: <p><span >{{ $abono->celular }}</span></p></td>  
            
        </tr>

    </table>

</div>

<div class="table-section bill-tbl w-100 mt-10">

    <table class="table w-100 mt-10">

        <tr>
          
            <th class="w-50">Tratamiento</th>

            <th class="w-50">valor</th>

            <th class="w-50">Abono</th>

            <th class="w-50">Saldo</th>
            
        </tr>




        <tr align="center">

            <td>{{ $abono->descripcion}}</td>

            <td>{{ $abono->valor_tratamiento }}</td>

            <td>{{ $abono->valor_abono }}</td>

            <td>{{ $abono->saldo }}</td>
           
            
        </tr>
   
        
    </table>


</br></br></br></br></br></br>

<div 
            
       <p style="font:10px"> Impresión hecha por: <span>{{ $abono->responsable }}</span></p> 
     
       <p style="font:10px"> Fecha impresión :   <span> {{\Carbon\Carbon::now("America/bogota")->format('d-m-Y h:m A')}} </span> </p>

 
                       
        
 


    @endforeach


</div>
</html>