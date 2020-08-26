@extends('layouts.app')

@section('content')
<div class="container-fluid app-body settings-page">
<form action="{{ route('history') }}" method="get">
		{{ csrf_field() }}
		<div class="row">
			<div class="col-md-4">
				<div class="input-group ">
					<input type="text" name="name" class="form-control" placeholder="Group Name" required>		
				</div>
			</div>
			<div class="col-md-4">
				<div class="input-group">
					<input type="text" name="date" placeholder="Post Date" class="form-control datepicker" required>			
				</div>
			</div>
			<div class="col-md-4">
				<div class="input-group">
					<select name="type" class="form-control" required>
						<option value="">Select-group-type</option>
						@foreach ($socialPostGroups as $key => $value)
					<option value="{{ $key }}">{{ $value }}</option>
						@endforeach
					</select>				
				</div>
			</div>
		</div>
		<button type="submit" name="filter" value="filter" class="btn btn-primary">Filter</button>
	    <a href="{{ url('history')}}" class="btn btn-success">Refresh</a>
	</form>
	<table class="table">
	<thead>{{ $socialPosts->count() }}</thead>
		<thead>
		  <tr>
			<th scope="col">Group Name</th>
			<th scope="col">Group Type</th>
			<th scope="col">Account Name</th>
			<th scope="col">Post Text</th>
			<th scope="col">time</th>
		  </tr>
		</thead>
		<tbody>
			@forelse ($socialPosts as $socialPost)
			<tr>
			<td>{{ $socialPost->group->name }}</td>
			<td>{{ $socialPost->group->type }}</td>
			<td>{{ $socialPost->group->user->name }}</td>
			<td>{{ $socialPost->text }}</td>
			<td>{{ $socialPost->created_at->toDateTimeString() }}</td>
			</tr>	
			@empty
			<tr>
				<td>No Data Found</td>
			</tr>	
			@endforelse	 
		  
		</tbody>

	  </table>

	  {{ $socialPosts->links() }}


</div>
@endsection
