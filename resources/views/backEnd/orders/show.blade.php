@extends('backEnd.app')

@section('title')
    Orders
@endsection
@section('dashboard')
    Orders
@endsection
@section('content')
   <div class="card">
       <div class="card-header">
           <strong class="card-title">Order Details</strong>
       </div>
       <div class="card-body">
           <table class="table">

               <tbody>
               <tr>
                   <th scope="row">Order Number</th>
                   <td>{{$orders->id}}</td>
               </tr>
               <tr>
                   <th scope="row">Customer Name</th>
                   <td>{{$orders->name}}</td>
               </tr>
               <tr>
                   <th scope="row">Customer Email</th>
                   <td>{{$orders->email}}</td>
               </tr>
               <tr>
                   <th scope="row">Address</th>
                   <td>{{$orders->address}}</td>
               </tr>
               <tr>
                   <th scope="row">State</th>
                   <td>{{$orders->prvince}}</td>
               </tr>
               <tr>
                   <th scope="row">City</th>
                   <td>{{$orders->city}}</td>
               </tr>
               <tr>
                   <th scope="row">Postal Code</th>
                   <td>{{$orders->postalcode}}</td>
               </tr>
               <tr>
                   <th scope="row"> Content</th>
                   <td>{{$orders->content}}</td>
               </tr>
               <tr>
                   <th scope="row"> Sub total</th>
                   <td>${{$orders->subtotal}}</td>
               </tr>
               <tr>
                   <th scope="row"> Tax</th>
                   <td>${{$orders->tax}}</td>
               </tr>
               <tr>
                   <th scope="row"> Total</th>
                   <td>${{$orders->total}}</td>
               </tr>
               <tr>
                   <th scope="row"> Time & Date</th>
                   <td>{{$orders->created_at}}</td>
               </tr>

               </tbody>
           </table>
       </div>
   </div>
@endsection
