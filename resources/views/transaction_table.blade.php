@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Amount</th>
                    <th scope="col">Currency</th>
                    <th scope="col">Merchant Name</th>
                    <th scope="col">Customer Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($response['data'] as $item)
                        <tr>
                            <td>{{ $item['originalAmount'] }}</td>
                            <td>{{ $item['originalCurrency'] }}</td>
                            <td>{{ $item['merchantName'] }}</td>
                            <td>{{ $item['customerEmail'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
