
@foreach ($allExpense as $item )
<tr>
    <td scope="col">{{ $loop->iteration }}</td>
    <td scope="col">{{ $item->date}}</td>
    <td scope="col">{{ $item->expense_name }}</td>
    <td scope="col">{{ $item->amount}}</td>
</tr>
@endforeach


<t-footer>
    <tr>
        <td style="border-top:1px solid; border-right:0px solid; border-bottom:1px solid">

        </td>
        <td style="border-top:1px solid; border-right:0px solid; border-bottom:1px solid">

        </td>
        <td style="border-top:1px solid; border-right:0px solid; border-bottom:1px solid;padding-top:6px;padding-bottom:6px">
            <h6 style="font-weight: bold;padding:0px;margin:0px"><b>Total : </b></h6>
        </td>
        <td style="border-top:1px solid; border-left:0px solid; border-bottom:1px solid">
            <h6 style="font-weight: bold;padding:0px;margin:0px" id="total">
            </h6>
        </td>
    </tr>
</t-footer>

<script>
    var amount = {{ $amount }};
    document.getElementById('total').textContent =  amount;
</script>







