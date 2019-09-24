@extends('admin.master')

@section('body')

    <div class="container"><br/>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Brand</h4>
                    </div>
                    <div calss="card-body">
                        <p class="text-center text-success text-strong">{{ Session:: get('message') }}</p>
                        <form class="form-horizontal" action="{{ route('update-brand') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-md-3"><strong>Brand Name:</strong></label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="brand_name" value="{{$brand->brand_name}}">
                                     <input type="hidden" class="form-control" name="brand_id" value="{{$brand->id}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 text-bold"><strong>Brand Description:</strong></label>
                                <div class="col-md-12">
                                    <textarea class="form-control" name="brand_description">{{ $brand->brand_description }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3"><strong>Brand Image:</strong></label>
                                <div class="col-md-12">
                                    <input type="file" class="form-control-file" name="brand_image">
                                    <img src="{{ asset($brand->brand_image) }}" height="60" width="80">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3"><strong>Public Status:</strong></label>
                                <div class="col-md-12">
                                    <input type="radio" name="publication_status" value="1" {{ $brand->publication_status == 1 ? 'checked' : '' }} />Published
                                    <input type="radio" name="publication_status" value="0" {{ $brand->publication_status == 0 ? 'checked' : '' }}>Unpublished
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3"></label>
                                <div class="col-md-12">
                                    <input type="submit" name="btn" class="btn btn-success btn-block" value="Update Brand">
                                </div>
                            </div>
                        </form><br><br><br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

