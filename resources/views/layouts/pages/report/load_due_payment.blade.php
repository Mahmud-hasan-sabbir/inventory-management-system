

@foreach ($duePayment as $item )
<tr>
    <td scope="col">{{ $loop->iteration }}</td>
    <td scope="col">{{ $item->invoice_no }}</td>
    <td scope="col">{{ $item->customer->name }}</td>
    <td scope="col">{{ $item->customer->number }}</td>
    <td scope="col">{{ $item->customer->address }}</td>
    <td scope="col">{{ $item->total}}</td>
    <td scope="col">{{ $item->pay_amount}}</td>
    <td scope="col">{{ $item->due_amount}}</td>
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
           
        </td>
         <td style="border-top:1px solid; border-left:0px solid; border-bottom:1px solid">
           
            
        </td>
        <td style="border-top:1px solid; border-left:0px solid; border-bottom:1px solid">
            <h6 style="font-weight: bold;padding:0px;margin:0px">Total Due Amount</h6>
        </td>
        <td style="border-top:1px solid; border-left:0px solid; border-bottom:1px solid">
            <h6 style="font-weight: bold;padding:0px;margin:0px" id="duePaymetTotal" >
            </h6>
        </td>
    </tr>
</t-footer>


<script>
    // Set the content of the 'debitSumDisplay' and 'creditSumDisplay' elements
    var duePaymetTotal = {{ $duePaymetTotal }};
    document.getElementById('duePaymetTotal').textContent = duePaymetTotal;
</script>






