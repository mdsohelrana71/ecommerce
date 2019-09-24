@extends('admin.master')

@section('body')

    <div class="container"><br/>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Product</h4>
                    </div>
                    <div calss="card-body">
                        <p class="text-center text-success text-strong">{{ Session:: get('message') }}</p>

                        <table class="table">
                            <tr>
                                <th>Category Id:</th>
                                <td>{{ $product->category_id }}</td>
                            </tr>
                            <tr>
                                <th>Category Name:</th>
                                <td>{{ $product->category->category_name }}</td>
                            </tr>
                            <tr>
                                <th>Brand Id:</th>
                                <td>{{ $product->brand_id }}</td>
                            </tr>
                            <tr>
                                <th>Brand Name:</th>
                                <td>{{ $product->brand->brand_name }}</td>
                            </tr>
                            <tr>
                                <th>Product Name:</th>
                                <td>{{ $product->product_name }}</td>
                            </tr>
                            <tr>
                                <th>Product Price:</th>
                                <td>{{ $product->product_price }}</td>
                            </tr>
                            <tr>
                                <th>Product Code:</th>
                                <td>{{ $product->product_code }}</td>
                            </tr>
                            <tr>
                                <th>Product Short Description:</th>
                                <td>{{ $product->product_short_description }}</td>
                            </tr>
                            <tr>
                                <th>Product Long Description:</th>
                                <td>{{ $product->product_long_description }}</td>
                            </tr>
                            <tr>
                                <th>Product Image:</th>
                                <td><img src="{{ asset($product->product_image) }}"></td>
                            </tr>
                            <tr>
                                <th>Product Sub Image:</th>
                                <td>
                                    <?php  $productSubImage = \App\SubImage::where('product_id',$product->id)->get(); ?>
                                    @foreach($productSubImage as $item)
                                        <img src="{{ asset($item->sub_image) }}" alt="" height="100" width="100">
                                        @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Public Status:</th>
                                <td>{{ $product->publication_status ==1 ? 'Published' : 'Unpublished'}}</td>
                            </tr>
                        </table>

                    </div><br><br><br>
                </div>
            </div>
        </div>
    </div>



@endsection

