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
                        <form class="form-horizontal" action="{{ route('new-product') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-md-3"><strong>Category Name:</strong></label>
                                <div class="col-md-12">
                                    <select class="form-control" name="category_id" id="categoryId">
                                    	<option>--Select Category Name--</option>
                                    	@foreach($categories as $category)
                                    	    <option value="{{ $category->id }}"> {{ $category->category_name }} </option>
                                    	@endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 text-bold"><strong>Brand Name:</strong></label>
                                <div class="col-md-12">
                                    <select class="form-control" name="brand_id" id="brandId">
                                    	<option>--Select Brand Name--</option>
                                    	@foreach($brands as $brand)
                                    	<option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                    	@endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 text-bold"><strong>Product Name:</strong></label>
                                <div class="col-md-12">
                                    <input type="text" name="product_name" id="productName" class="form-control" onblur="setProductCode()"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 text-bold"><strong>Product Code:</strong></label>
                                <div class="col-md-12">
                                    <input type="text" name="product_code" id="productCode" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 text-bold"><strong>Product Price:</strong></label>
                                <div class="col-md-12">
                                    <input type="text" name="product_price" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 text-bold"><strong>Product Quantity:</strong></label>
                                <div class="col-md-12">
                                    <input type="text" name="product_quantity" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 text-bold"><strong>Product Short Description:</strong></label>
                                <div class="col-md-12">
                                    <textarea class="form-control" name="product_short_description"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 text-bold"><strong>Product Long Description:</strong></label>
                                <div class="col-md-12">
                                    <textarea class="form-control" name="product_long_description"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3"><strong>Product Image:</strong></label>
                                <div class="col-md-12">
                                    <input type="file" class="form-control-file" name="product_image">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3"><strong>Product Sub Image:</strong></label>
                                <div class="col-md-12">
                                    <input type="file" class="form-control-file" name="file[]" multiple/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3"><strong>Public Status:</strong></label>
                                <div class="col-md-12">
                                    <input type="radio" name="publication_status" value="1" checked>Published
                                    <input type="radio" name="publication_status" value="0">Unpublished
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3"></label>
                                <div class="col-md-12">
                                    <input type="submit" name="btn" class="btn btn-success btn-block" value="Create New Product">
                                </div>
                            </div>
                        </form>
                        <br><br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

