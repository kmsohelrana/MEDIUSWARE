@extends('layouts.app')

@section('content')


<div class="container-fluid app-body settings-page">
	<table class="table">
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
