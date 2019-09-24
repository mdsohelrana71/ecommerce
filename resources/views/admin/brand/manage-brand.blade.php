@extends('admin.master')

@section('body')
	
	<div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Tables</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Example</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>SL No</th>
                    <th>Brand Name</th>
                    <th>Brand Description</th>
                    <th>Brand Image</th>
                    <th>Publication Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                	@php ($i=1)
                	@foreach($brands as $brand)
		                <tr>
		                    <td>{{ $i++ }}</td>
		                    <td>{{ $brand->brand_name }}</td>
		                    <td>{{ $brand->brand_description }}</td>
		                    <td class="center"><img src="{{ asset( $brand->brand_image) }}" height="70" width="100"></td>
		                    <td>{{ $brand->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
		                     <td class="center">
		                    	<a href="{{ route('edit-brand', ['id'=>$brand->id]) }}" class="btn btn-success btn-xs">
		                    		<i class="fa fa-edit"></i>
		                    	</a>
		                    	<a href="{{ url('/brand/delete-brand/'.$brand->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are yor sure to delete this ')">
		                    		<i class="fa fa-trash"></i>
		                    	</a>
		                    </td>
		                </tr>
		            @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->

@endsection

