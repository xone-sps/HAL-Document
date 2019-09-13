
@extends('admin.main')
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2>Department Manager</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a></li>
                        <li class="breadcrumb-item"><a href="file-dashboard.html">File Manager</a></li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                    <button class="btn btn-success" type="button" data-toggle="modal" data-target="#Modal"><i class="zmdi zmdi-plus"></i></button>
                </div>
            </div>
        </div>
{{-- Add modal --}}
        <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add New Department</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <form  action="{{ route('department.save') }}" method="POST">
                @csrf
                <div class="modal-body">
                 <div class="form-group">
                    <label>Department Name *</label>
                    <input type="text" class="form-control" value="" id="recipient-name" name="department_name" required>
                </div>
            </div>
            <div class="modal-footer">
             <button type="button" class="btn btn-secondary btn-round btn-danger" data-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">Save</button>
         </div>
     </form>
 </div>
</div>
</div>
{{-- End add modal --}}
{{-- Edit modal --}}
@foreach ($departments as $department)
        <div class="modal fade" id="ModalEdit-{{$department['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Update Department</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <form  action="{{ route('department.update', $department->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                 <div class="form-group">
                    <label>Department Name *</label>
                    <input type="text" class="form-control" id="recipient-name" name="department_name" required value="{{ $department->name }}">
                </div>
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
        <div class="col-lg-12">
            <div class="card">
                <div class="tab-content">
                    <div class="tab-pane active show" id="list_view">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0 c_table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th data-breakpoints="xs">Owner</th>
                                        <th data-breakpoints="xs sm md">Last Modified</th>
                                        <th data-breakpoints="xs sm md">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($departments as $department)
                                    <tr>
                                        <td><span>{{$department->name}}</span></td>
                                        <td><span class="owner">Me</span></td>
                                        <td><span class="date">{{$department->updated_at}}</span></td>
                                        <td>
                                            <a class="btn btn-primary" data-toggle="modal" data-target="#ModalEdit-{{ $department['id'] }}">Edit</a>
                                            <a class="btn btn-danger" onclick="confirmdelete('{{$department['id']}}')">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
@endsection

<script>
    function confirmdelete(id){
        var del = confirm('Are you sure to delete this !');
        if(del){
            var deletes = "{{route('department.delete')}}/" + id;
            window.location.href = deletes;
            // console.log(id);
        }else {
            // return false;   
            console.log('Can not delete this!');
        }

    }
</script>

