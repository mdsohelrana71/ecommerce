@extends('front.master')
@section('title')
    Category
@endsection
@section('body')
    <div class="ads-grid">
        <div class="container">
            <div class="col-md-12">
                <div class="checkout-right">
                    <h4>Your shopping cart contains:
                        <span style="color: #2ECC71">{{ $cartCollection->count() }} Products</span>
                    </h4>
                    <div class="table-responsive">
                        <table class="timetable_sub">
                            <thead>
                            <tr>
                                <th>SL No.</th>
                                <th>Product</th>
                                <th>Product Name</th>
                                <th>Quality</th>
                                <th>Unit Price</th>
                                <th>Sub Total</th>
                                <th>Remove</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i = 1)
                            @php($total=0)
                            @foreach($cartCollection as $item)
                                <tr class="rem1">
                                    <td class="invert">{{ $i++ }}</td>
                                    <td class="invert-image">
                                        <a href="single2.html">
                                            <img src="{{ asset($item->attributes->image) }}" alt=" " class="img-responsive"style="height: 50px;width: 60px;">
                                        </a>
                                    </td>
                                    <td class="invert">{{ $item->name }}</td>
                                    <td class="invert">
                                        <form action="{{ route('update-cart-product') }}" method="post">
                                            {{ csrf_field() }}
                                            <input type="number" name="qty" min="1" value="{{ $item->quantity }}">
                                            <input type="hidden" name="id"  value="{{ $item->id }}">
                                            <input type="submit" name="btn" value="Update">
                                        </form>
                                    </td>
                                    <td class="invert">{{ $item->price }}</td>
                                    <td class="invert">{{ $itemTotal = $item->price * $item->quantity }}</td>
                                    <td class="invert">
                                        <div class="rem">
                                            <a href="{{  route('remove-cart-product',['id'=>$item->id]) }}" class="close1"> </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                $total =$total + $itemTotal;
                                ?>
                            @endforeach
                            </tbody>
                        </table>
                        <table class="table table-bordered">
                            <tr>
                                <th>Sub Total = </th>
                                <td style="text-align:right;">{{ $total }}/=</td>
                            </tr>
                            <tr>
                                <th>Tax Total = </th>
                                <td style="text-align:right;">
                                    <?php $tax = ($total* 0.15)?>
                                    {{ $tax }}/=
                                </td>
                            </tr>
                            <tr>
                                <th>Grand Total = </th>
                                <td style="text-align:right;">{{ $total + $tax }} Tk</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

