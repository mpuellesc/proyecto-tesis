<tr>
    <th scope="row">
        {{$time->id}}
    </th>
    <td>{{$time->type}}</td>
    <td>
        {{\Carbon\Carbon::parse($time->start)->format('Y-d-m h:i:s')}}
    </td>
    <td>
        {{\Carbon\Carbon::parse($time->end)->format('Y-d-m h:i:s')}}
    </td>
    
    <td>{{$time->difference}}</td>

</tr>