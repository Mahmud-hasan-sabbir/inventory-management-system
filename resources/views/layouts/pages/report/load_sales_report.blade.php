

@foreach ($salesReport as $item )
<tr>
    <td scope="col">{{ $loop->iteration }}</td>
    <td scope="col">{{ $item->product->name }}</td>
    <td scope="col">{{ $item->product->code }}</td>
    <td scope="col">{{ $item->qty }}</td>
    <td scope="col">{{ $item->unit_price}}</td>
    <td scope="col">{{ $item->total}}</td>
</tr>
@endforeach


<t-footer style="display: none">
    <tr class="addr">

        <td style="border-top:1px solid; border-right:0px solid; border-bottom:1px solid">

        </td>
        <td style="border-top:1px solid; border-right:0px solid; border-bottom:1px solid">

        </td>
        <td style="border-top:1px solid; border-right:0px solid; border-bottom:1px solid">

        </td>

        <td style="border-top:1px solid; border-right:0px solid; border-bottom:1px solid;padding-top:6px;padding-bottom:6px">

        </td>
        <td style="border-top:1px solid; border-right:0px solid; border-bottom:1px solid;padding-top:6px;padding-bottom:6px">
            <h6 style="font-weight: bold;padding:0px;margin:0px">Total Sales Amount</h6>
        </td>
         <td style="border-top:1px solid; border-left:0px solid; border-bottom:1px solid">
            <h6 style="font-weight: bold;padding:0px;margin:0px" id="totalBalance" >
            </h6>
        </td>
        <td style="border-top:1px solid; border-left:0px solid; border-bottom:1px solid">

        </td>
    </tr>
</t-footer>


<script>
    // Set the content of the 'debitSumDisplay' and 'creditSumDisplay' elements
    var totalBalance = {{ $total }};
    document.getElementById('totalBalance').textContent = totalBalance;
</script>






