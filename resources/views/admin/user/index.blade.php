@extends('admin.main')
@section('content')
<style type="text/css" media="screen">
	.modal{
		overflow: auto;
	}
</style>
<section class="content">
	<div class="body_scroll">
		<div class="block-header">
			<div class="row">
				<div class="col-lg-7 col-md-6 col-sm-6">
					<h2>User list</h2>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a></li>
						<li class="breadcrumb-item">Project</li>
						<li class="breadcrumb-item active">list</li>
					</ul>
				</div>
				<div class="col-lg-5 col-md-6 col-sm-6">                
					{{--                     <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button> --}}
					<button class="btn btn-success btn-icon float-right" data-toggle="modal" data-target="#Modal" type="button"><i class="zmdi zmdi-plus"></i></button>
				</div>
			</div>
		</div>

		{{-- Model --}}

		<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">New User</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="{{route('user.save')}}" method="POST" novalidate="novalidate" id="form_advanced_validation">
						<div class="modal-body">
							@csrf
							<div class="form-group">
								<label>Name *</label>
								<input type="text" class="form-control" name="name" placeholder="Name" required>
							</div>
							<div class="form-group form-float">
								<label>Last Name *</label>
								<input type="text" class="form-control" name="last_name" required placeholder="Last name">
							</div>
							<div class="form-group">
								<label>Phone number</label>
								<input type="number" class="form-control" name="phone" placeholder="Enter your phone">
							</div>
							<div class="form-group">
								<label>Email Address *</label>
								<input type="text" class="form-control" name="email" placeholder="Enter your email">
							</div>
							@if($errors->has('email'))
							<p style="color:red;">{{ $errors->first('email') }}</p>
							@endif

							<div class="form-group">
								<label for="message-text" class="col-form-label">Position</label>
								<select class="select" name="department">
									@foreach($departments as $department)
									<option value="{{ $department->id }}">{{ $department->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="password_2">Password *</label>
								<input type="password" name="password" id="password" class="form-control" placeholder="Enter your password">
							</div>
							<div class="form-group">
								<label for="password_2">Confirm Password *</label>
								<input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm your password">
							</div>
							@if($errors->has('confirm_password'))
							<p style="color:red;">{{ $errors->first('confirm_password') }}</p>
							@endif
							<small style="color:red;" id="not_match_pass"></small>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary btn-round btn-danger" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		{{-- Edit modal --}}
		@foreach($users as $user)
		<div class="modal fade" id="Modaledit-{{ $user['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Update User</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="{{route('user.save')}}" method="POST" novalidate="novalidate" id="form_advanced_validation">
						<div class="modal-body">
							@csrf
							<div class="form-group">
								<label>Name *</label>
								<input type="text" class="form-control" name="name" placeholder="Name" required value="{{($user->name)}}">
							</div>
							<div class="form-group form-float">
								<label>Last Name *</label>
								<input type="text" class="form-control" name="last_name" required placeholder="Last name" value="{{($user->last_name)}}">
							</div>
							<div class="form-group">
								<label>Phone number</label>
								<input type="number" class="form-control" name="phone" placeholder="Enter your phone" value="{{$user->phone}}">
							</div>
							<div class="form-group">
								<label>Email Address *</label>
								<input type="text" class="form-control" name="email" placeholder="Enter your email" value="{{$user->email}}">
							</div>
							@if($errors->has('email'))
							<p style="color:red;">{{ $errors->first('email') }}</p>
							@endif

							<div class="form-group">
								<label for="message-text" class="col-form-label">Position</label>
								<select class="select" name="department">
									@foreach($departments as $department)
									<option value="{{ $department->id }}" {{($user->department_id == $department->id) ? 'selected' : ''}}>{{ $department->name }}</option>
									@endforeach
								</select>
							</div>
{{-- 							<div class="form-group">
								<label for="password_2">Password *</label>
								<input type="password" name="password" id="password" class="form-control" placeholder="Enter your password">
							</div>
							<div class="form-group">
								<label for="password_2">Confirm Password *</label>
								<input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm your password">
							</div>
							@if($errors->has('confirm_password'))
							<p style="color:red;">{{ $errors->first('confirm_password') }}</p>
							@endif
							<small style="color:red;" id="not_match_pass"></small> --}}

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary btn-round btn-danger" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		@endforeach
		{{-- End edit modal --}}

		<div class="container-fluid">
			<div class="row clearfix">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="card project_list">
						<div class="table-responsive">
							<table class="table table-hover c_table theme-color thead">
								<thead>
									<tr>                                       
										<th style="width:50px;"></th>
										<th>Name</th>
										<th>Contact</th>                                        
										<th class="hidden-md-down">Department</th>
										<th class="hidden-md-down" width="150px">Status</th>
										<th class="hidden-md-down">Updated</th>
										<th>Action</th>
									</tr>
								</thead>
								@foreach($users as $user)
								<tbody>
									<tr>
										<td>
											<img class="rounded avatar" src="assets/images/xs/{{$user->image}}" alt="">
										</td>
										<td>
											<a class="single-user-name" href="#">{{$user->name}}</a><br>
											<small>{{$user->last_name}}</small>
										</td>
										<td>
											<strong>{{$user->email}}</strong><br>
											<small><span class="phone"><i class="zmdi zmdi-whatsapp mr-2"></i>{{$user->phone}}</span></small>
											{{-- 	<span class="phone"><i class="zmdi zmdi-whatsapp mr-2"></i>264-625-2583</span> --}}
										</td>                                        
										<td class="hidden-md-down">
											{{$user->Department->name}}
										</td>
										<td class="hidden-md-down"><span class="badge badge-warning"> {{$user->status}}</span></td>
										<td class="hidden-md-down">{{$user->updated_at}}</td>
										<td>

											<div class="btn-group">
												<button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												</button>
												<div class="dropdown-menu">
													<button class="btn btn-success"><i class="fa fa-eye"></i></button>
													<button class="btn btn-primary" data-toggle="modal" data-target="#Modaledit-{{$user['id']}}"><i class="zmdi zmdi-edit"></i></button>
													<button class="btn btn-danger" onclick="confirmdelete('{{$user['id']}}')"><i class="zmdi zmdi-delete"></i></button>
												</div>
											</div>
										</td>
									</tr>
								</tbody>
								@endforeach
							</table>
						</div>
						<ul class="pagination pagination-primary mt-4">
							{{$users->links()}}
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@section('js_footer')
<script>
	function confirmdelete(id){
		var del = confirm('Are you sure to delete this !');
		if(del){
			var deletes = "{{route('user.delete')}}/" + id;
			window.location.href = deletes;
            // console.log(id);
        }else {
            // return false;   
            console.log('no');
        }

    }




    $(document).ready(function() {
    	@if($errors->has('confirm_password'))
    	$(".modal").toggleClass("show");  
    	$(".modal").css("display", "block","overflow","auto");
    	@elseif($errors->has('email'))
    	$(".modal").toggleClass("show");  
    	$(".modal").css("display", "block","overflow","auto");
    	@endif
    });
</script>
<script>


	$('#confirm_password').keyup(function(){
		var confrim_pass = $(this).val();
		var pass = $('#password').val();
		var match = '';
		var not_match = 'ລະຫັດຢືນຢັນບໍຖືກຕ້ອງ...';
		if(confrim_pass !== pass){
			$('#not_match_pass').text(not_match);
		}else{
			$('#not_match_pass').text(match);
		}
	})

</script>
@stop