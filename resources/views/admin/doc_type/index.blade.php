@extends('admin.main')
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2>Doctument type Management</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a></li>
                        <li class="breadcrumb-item"><a href="file-dashboard.html">File Manager</a></li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                    <button class="btn btn-success" type="button" data-toggle="modal" data-target="#Modal"><i class="zmdi zmdi-plus"></i></button>
                </div>
{{--                 <div class="col-lg-4 col-md-5 col-sm-2">
                    <button class="btn btn-success" type="button" data-toggle="modal" data-target="#Modal"><i class="zmdi zmdi-plus"></i></button>
                </div> --}}
            </div>
        </div>

        <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog" role="document">
            <div class="modal-content">
             <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add New Document type</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
           </button>
       </div>
       <form action="{{route('doctype.save')}}" method="POST">
        @csrf
        <div class="modal-body">	
           <div class="form-group">
            <label>Doctype Name *</label>
            <input type="text" class="form-control" id="recipient-name" name="doctype_name" required>
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

{{--    Modal Edit --}}
@foreach ($doctypes as $doctype)
<div class="modal fade" id="Modaledittype-{{ $doctype['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Document type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('doctype.update',$doctype->id)}}" method="POST">
                @csrf
                <div class="modal-body">    
                    <div class="form-group">
                        <label>Doctype Name *</label>
                        <input type="text" class="form-control" id="recipient-name" name="doctype_name" required value="{{ $doctype->name }}">
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
{{-- End Modal Edit --}}

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
                                        <th data-breakpoints="xs sm md">Last Modified</th>
                                        <th data-breakpoints="xs">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($doctypes as $doctype)
                                    <tr>
                                        <td><span>{{$doctype->name}}</span></td>
                                        <td><span class="date">{{$doctype->updated_at}}</span></td>
                                        <td><span class="owner">
                                            <a class="btn btn-primary" data-toggle="modal" data-target="#Modaledittype-{{ $doctype['id'] }}">Edit</a>
                                            <a class="btn btn-danger" onclick="confirmdelete('{{$doctype['id']}}')">Delete</a>
                                        </span></td>
                                    </tr>
                                    <tr>
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
            var deletes = "{{route('doctype.delete')}}/" + id;
            window.location.href = deletes;
            // console.log(id);
        }else {
            // return false;   
            console.log('no');
        }

    }
</script>