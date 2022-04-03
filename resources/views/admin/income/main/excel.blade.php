<table>
    <thead>
    <tr>
      <th>SL</th>
      <th>Income Date</th>
      <th>Income Title</th>
      <th>Category</th>
      <th>Amount</th>
    </tr>
    </thead>
    <tbody>
      @php
       $i=1;
      @endphp
    @foreach($all as $data)
        <tr>
          @if($i<'10')
            <td>0{{$i++}}</td>
          @else
            <td>{{$i++}}</td>
          @endif
          <td>{{ $data->income_date }}</td>
          <td>{{ $data->income_title }}</td>
          <td>{{ $data->category->incate_name }}</td>
          <td>{{number_format($data->income_amount,2)}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
