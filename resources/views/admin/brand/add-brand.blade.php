@extends('admin.master')

@section('body')

    <div class="container"><br/>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Brand</h4>
                    </div>
                    <div calss="card-body">
                        <p class="text-center text-success text-strong">{{ Session:: get('message') }}</p>
                        <form class="form-horizontal" action="{{ route('new-brand') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-md-3"><strong>Brand Name:</strong></label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="brand_name">
                                    <span class="text-danger">{{ $errors->has('brand_name') ? $errors->first('brand_name') : '' }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 text-bold"><strong>Brand Description:</strong></label>
                                <div class="col-md-12">
                                    <textarea class="form-control" name="brand_description"></textarea>
                                     <span class="text-danger">{{ $errors->has('brand_description') ? $errors->first('brand_description') : '' }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3"><strong>Brand Image:</strong></label>
                                <div class="col-md-12">
                                    <input type="file" class="form-control-file" name="brand_image">
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
                                    <input type="submit" name="btn" class="btn btn-success btn-block" value="Create New Brand">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

