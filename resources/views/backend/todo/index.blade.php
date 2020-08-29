{{-- Extinding the master layout --}}
@extends('layouts.backend.master')

{{-- Main content section starts here --}}
@section('content')
<div class="col-10 offset-1">
	<div class="tile">
		<div class="tile-title-w-btn">
			<h3 class="title">My To-Do list</h3>
			<div class="btn-group">
				<a class="btn btn-primary" data-toggle="modal" data-target="#add-todo" href="javascript:void(0);">Insert more to-do</a>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table">
				<tbody>
					@forelse($todos as $todo)
					<tr>
						<td class="text-center"><i class="fas fa-check {{ $todo->status ==="completed"?"text-primary":"text-secondary" }}"></i></td>
						@if($todo->trashed())
						<td width="85%" colspan="2"><del>{{ $todo->title }}</del></td>
						@else
						<td width="85%">{{ $todo->title }}</td>
						@endif
						@if(!$todo->trashed())
						<td class="text-center">
							@if($todo->status === 'incomplete')
							{{-- Complete code --}}
							<a class="btn btn-primary btn-sm btn-flat" href="javascript:void(0);" onclick="event.preventDefault(); if(!confirm('Mark this task as completed?')){return false;}else{document.getElementById('completed-{{ $todo->id }}').submit();}" title="Mark completed">
								<i class="fas fa-check" aria-hidden="true"></i>
							</a>
							{{-- Complete code end --}}
							<a id="{{ $todo->id }}" href="javascript:void(0);" data-toggle="modal" data-target="#edit-todo" class="btn btn-info btn-sm btn-flat edit" title="Edit this to-do">
								<i class="fas fa-pencil-alt"></i>
							</a>
							@endif
							{{-- Delete code starts here --}}
							<a onclick="delete_todo({{ $todo->id }})" href="javascript:void(0);" class="btn btn-warning btn-sm btn-flat" title="Delete this to-do">
								<i class="fas fa-trash-alt"></i>
							</a>
							<form id="delete-form-{{ $todo->id }}" action="{{ route('to-dos.destroy',$todo->id) }}" method="POST">
								@csrf
								@method('DELETE')
							</form>
							{{-- Delete code ends here --}}
							@if($todo->status === 'incomplete')
							{{-- Complete form --}}
							<form method="POST" action="{{ route('mark.to-do.complete', $todo->id) }}" accept-charset="UTF-8" id="completed-{{ $todo->id }}">
								@csrf
								@method('PATCH')
							</form>
							{{-- Complete form end --}}
							@endif
						</td>
						@endif
					</tr>
					@empty
					<tr class="table-info text-center">
						<td colspan="2"><h5>No to-dos found</h5></td>
					</tr>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- Create Modal -->
<div id="add-todo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<form class="form-material m-t-40" action="{{ route('to-dos.store') }}" method="POST">
				@csrf
				<div class="modal-body">
					@if ($errors->any())
					<ul style="list-style: none;">
						@foreach($errors->all() as $error)
						<li style="color: red">{{$error}}</li>
						@endforeach
					</ul>
					@endif
					<div class="form-group">
						<input value="{{ old('title') }}" name="title" class="form-control form-control-line" placeholder="To-Do title" type="text" autocomplete="off" required autofocus>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary waves-effect" data-dismiss="modal">Close</button>
					<!-- <input type="submit" value="Update" class="btn btn-outline-success waves-effect waves-light"> -->
					<button type="submit" class="btn btn-outline-success waves-effect waves-light">Add</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End Modal -->

<!-- Edit Modal -->
<div id="edit-todo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<form class="form-material m-t-40" action="" method="POST" id="update_form">
				@csrf
				@method('PATCH')
				<div class="modal-body">
					@if ($errors->any())
					<ul style="list-style: none;">
						@foreach($errors->all() as $error)
						<li style="color: red">{{$error}}</li>
						@endforeach
					</ul>
					@endif
					<div class="form-group">
						<label>To-Do title:</label>
						<input id="title" value="{{old('title')}}" name="title" class="form-control" placeholder="To-Do title" type="text" autofocus autocomplete="off" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary waves-effect" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-outline-success waves-effect waves-light">Update</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End Modal -->

@endsection
{{-- Main content section ends here --}}

{{-- Page specific css section starts here --}}
@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/backend/sweetalert2.min.css')}}">
@endpush

@push('customCss')


@endpush
{{-- Page specific css section ends here --}}

{{-- Page specific javascript section starts here --}}
@push('js')
<script src="{{asset('assets/js/backend/sweetalert2.all.min.js')}}"></script>
@endpush

@push('customJs')
<script>

	$(document).on('click','.edit',function(){
		let to_do_id = $(this).attr('id');
		let edit_url = '{{ route("to-dos.edit", ":to_do_edit") }}';
		edit_url = edit_url.replace(':to_do_edit',to_do_id);

		let update_url = '{{ route("to-dos.update", ":to_do_update") }}';
		update_url = update_url.replace(':to_do_update',to_do_id);
		$('#update_form').attr('action', update_url);
		$.ajax({
			type:'GET',
			url:edit_url,
			success:function(data){
				$('#title').empty();
				$('#title').val(data.title);
			}
		});
	});

	const delete_todo = id => {
		swal({
			title: 'Are you sure?<br>You won\'t be able to revert this!',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, Delete!'
		}).then((result) => {
			if (result.value) {
				$('#delete-form-'+id).submit();
			}
		})
	}
</script>

@if($errors->any())
@if(Session::has('edit_route'))
<script>
	$(document).ready(function(){
		$('#edit-todo').modal({show: true});
	});
</script>
@endif
@if(Session::has('create_route'))
<script>
	$(document).ready(function(){
		$('#add-todo').modal({show: true});
	});
</script>
@endif
@endif

@endpush
{{-- Page specific javascript section ends here