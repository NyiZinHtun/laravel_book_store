@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Order List</h1>
    @foreach($orders as $order)
       <ul>
            <li>{{ $order->name }}</li>
                {{ $order->email }}<br>
                {{ $order->phone }}<br>
                {{ $order->address }}           
        </ul>
        
        <table class="table-bordered">
            <tr>
                <th>Title</th>
                <th>Qty</th>
            </tr>
            @foreach($order->order_items as $item)
            <tr>
               <td>{{$item->book->title}}</td>
               <td>{{ $item->qty }}</td>
            </tr>
            @endforeach
        </table>
        <label for="checkbox" value="status">
          <input type="checkbox" name="check" {{$order->status ? 'checked' : ''}}>Delivered
        </label><br>
    <!-- <a href="{{ url('/orders/'.$order->id.'/edit') }}" class="btn btn-primary">Edit</a> -->
    <!-- <form action="{{ url('orders/'.$order->id)}}" method="POST">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button type="submit" class="btn btn-danger">DELETE</button>
    </form> -->

    @endforeach
</div>
@endsection