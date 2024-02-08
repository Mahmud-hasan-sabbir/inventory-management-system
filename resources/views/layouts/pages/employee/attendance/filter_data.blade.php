@foreach ($filterData as $item )
<tr>
    <td scope="col">{{ $loop->iteration }}</td>
    <td scope="col">{{ $item->employee->name }}</td>
    <td scope="col">{{ \Carbon\Carbon::parse($item->att_date)->format('d-m-Y') }}</td>
    <td scope="col">{{ $item->att_month}}</td>
    <td scope="col">{{ $item->att_year}}</td>
    <td scope="col">{{ $item->attendance}}</td>
</tr>
@endforeach
