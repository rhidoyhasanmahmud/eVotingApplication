<!DOCTYPE html>
<html>
<head>
    <title>Sales Invoice</title>
</head>
<body>
    <h4 style="text-align: center;">Paharika Restaurant</h4>
    <h5  style="text-align: center;">Kotbari - Comilla road, Kotbari West side of Cantonment Gate</h5> 
    <h5  style="text-align: center;">Customer Bill</h5>

    <table style="width: 100%">
        <tr style="border: none;">
            <td style="width: 30%;border: none;">
            <p style="font-weight: bold;">Sale_ID:  {{$saleId}}</p>
            </td>
            <td style="text-align: center; width: 40%;border: none;">
                <p style="font-weight: bold;">Date:  {{ $date }} </p>
            </td>
            <td style="text-align: center; width: 30%;border: none;">
                
            </td>
        </tr>
    </table>
    <table style="width: 100%">
    <tr style="border: none;">
    <td style="width: 40%;border: none;"><strong>Item</strong></td>
    <td style="width: 20%;border: none;"><strong>Rate(TK)</strong></td>
    <td style="width: 20%;border: none;"><strong>Qty</strong></td>
    <td style="width: 20%;border: none;"><strong>SubTotal(TK)</strong></td>
     </tr>
     @if(!empty($sales_details))
							@foreach($sales_details as $ob)
    <tr style="border: none;">
    <td style="width: 40%;border: none;"><strong>{{$ob->product->name}}</strong></td>
    <td style="width: 20%;border: none;"><strong>{{$ob->per_product_rate}}</strong></td>
    <td style="width: 20%;border: none;"><strong>{{$ob->total_quantity}}</strong></td>
    <td style="width: 20%;border: none;"><strong>{{$ob->sub_total}} </strong></td>
     </tr>
     @endforeach
						@endif
     <tr style="border: none;">
    <td style="width: 40%;border: none;"><strong></strong></td>
    <td style="width: 20%;border: none;"><strong></strong></td>
    <td style="width: 20%;border: none;"><strong>Sub Total(TK)</strong></td>
    <td style="width: 20%;border: none;"><strong>{{ $total }}</strong></td>
     </tr>

     <tr style="border: none;">
    <td style="width: 40%;border: none;"><strong></strong></td>
    <td style="width: 20%;border: none;"><strong></strong></td>
    <td style="width: 20%;border: none;"><strong>VAT(TK)</strong></td>
    <td style="width: 20%;border: none;"><strong>{{ $vat }} </strong></td>
     </tr>

     <tr style="border: none;">
    <td style="width: 40%;border: none;"><strong></strong></td>
    <td style="width: 20%;border: none;"><strong></strong></td>
    <td style="width: 20%;border: none;"><strong>Discount(TK)</strong></td>
    <td style="width: 20%;border: none;"><strong>{{ $discount }} </strong></td>
     </tr>

     <tr style="border: none;">
    <td style="width: 40%;border: none;"><strong></strong></td>
    <td style="width: 20%;border: none;"><strong></strong></td>
    <td style="width: 20%;border: none;"><strong>Service Charge(TK)</strong></td>
    <td style="width: 20%;border: none;"><strong>{{$service_charge}} </strong></td>
     </tr>

     <tr style="border: none;">
    <td style="width: 40%;border: none;"><strong></strong></td>
    <td style="width: 20%;border: none;"><strong></strong></td>
    <td style="width: 20%;border: none;"><strong>Net Bill(TK)</strong></td>
    <td style="width: 20%;border: none;"><strong>{{$amount_total}} </strong></td>
     </tr>
</table>

<table style="width: 100%">
        <tr style="border: none;">
            <td style="width: 50%;border: none;">
            <p style="font-weight: bold;">Served By:: {{$servedBy}}</p>
            </td>
            <td style="width: 50%;border-radius: 1px; text-align: right">
            <p style="font-weight: bold;">Billed By:: {{ $billedBy }}</p>
            </td>
        </tr>
    </table>
</body>
</html>