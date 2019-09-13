@extends('admin.main')
@section('content')
<style type="text/css">
    .slideThree {
        width: 85px;
        height: 26px;
        background: #333;
        margin: 4px;
        position: relative;
        border-radius: 50px;
        box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.5), 0px 1px 0px rgba(255, 255, 255, 0.2);
    }
    .slideThree:after {
      content: "OFF";
      color: #ee2558;
      position: absolute;
      right: 10px;
      z-index: 0;
      font: 12px/26px Arial, sans-serif;
      font-weight: bold;
      text-shadow: 1px 1px 0px rgba(255, 255, 255, 0.15);
  }
  .slideThree:before {
      content: "ON";
      color: #27ae60;
      position: absolute;
      left: 10px;
      z-index: 0;
      font: 12px/26px Arial, sans-serif;
      font-weight: bold;
  }
  .slideThree label {
      display: block;
      width: 34px;
      height: 20px;
      cursor: pointer;
      position: absolute;
      top: 3px;
      left: 3px;
      z-index: 1;
      background: #fcfff4;
      background: linear-gradient(to bottom, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
      border-radius: 50px;
      transition: all 0.4s ease;
      box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.3);
  }
  .slideThree input[type="checkbox"] {
      visibility: hidden;
  }
  .slideThree input[type="checkbox"]:checked + label {
      left: 43px;
  }

  /* end .slideThree */

</style>
<section class="content file_manager">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Documents</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a></li>
                        <li class="breadcrumb-item"><a href="file-dashboard.html">File Manager</a></li>
                        <li class="breadcrumb-item active">Documents</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        {{-- Add Modal --}}
        <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Document</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('document.save')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">    
                            <div class="form-group">
                                <label>File Name *</label>
                                <input type="text" class="form-control" id="recipient-name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label>Description </label>
                                <textarea class="form-control" name="description" placeholder="Here can be your nice text" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label>File *</label>
                                <input type="file" class="form-control" id="recipient-name" name="file" required>
                            </div>
                            <div class="form-group">
                                <label>Doctype Name</label>
                                <select name="doctype" class="select">
                                    @foreach($doctypes as $doctype)
                                    <option value="{{$doctype->id}}">{{$doctype->name}}</option>
                                    @endforeach
                                </select>
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
        {{-- End Modal --}}
        {{-- Edit Modal --}}
        @foreach ($documents as $document)
        <div class="modal fade" id="ModalEditDoc-{{$document['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Document</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('document.update',$document->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">    
                            <div class="form-group">
                                <label>File Name *</label>
                                <input type="text" class="form-control" id="recipient-name" name="name" required value="{{$document->name}}">
                            </div>
                            <div class="form-group">
                                <label>Description </label>
                                <textarea class="form-control" name="description" placeholder="Here can be your nice text" rows="5">{{$document->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>File *</label>
                                <input type="hidden" class="form-control" id="recipient-name" name="old_file" required value="{{$document->file}}">
                                <input type="file" class="form-control" id="recipient-name" name="file">
                            </div>
                            
                            <div class="form-group">
                                <label>Doctype Name</label>
                                <select name="doctype" class="select">
                                    @foreach($doctypes as $doctype)
                                    <option value="{{ $doctype->id }}" {{($document->doctype_id == $doctype->id) ? 'selected' : ''}} >{{$doctype->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <div class="slideThree">  
                                  <input type="checkbox" value="None" id="slideThree" name="check" checked />
                                  <label for="slideThree"></label>
                              </div>
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
                    <ul class="nav nav-tabs pl-0 pr-0">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#doc">Doc</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#pdf">PDF</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#xls">XLS</a></li>
                        <li>
                            <div class="float-right">
                                <button class="btn btn-primary float-right" data-toggle="modal" data-target="#Modal" type="button">Add</button>
                            </div>
                        </li>
                    </ul>                    
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="header">
                                    <h2><strong>Documentation</strong> </h2>
                                </div>
                                <div class="table-responsive social_media_table">
                                    <table class="table table-hover c_table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>                                                                             
                                                <th>Category</th>
                                                <th>Owner</th>
                                                <th class="hidden-md-down">Status</th>   
                                                <th class="hidden-md-down">Date modified</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($documents as $document)
                                          <tr>
                                            <td>{{$document->name}}
                                            </td>
                                            <td><span class="text-muted">{{$document->Document_type->name}}</span></td>
                                            <td><span class="list-name">{{$document->user_id}}</span>
                                            </td>
                                            <td class="hidden-md-down"><span class="badge badge-success">{{$document->status}}</span></td>
                                            <td class="hidden-md-down">{{$document->updated_at}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    </button>
                                                    <div class="dropdown-menu">

                                                        <a class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                                        <a class="btn btn-primary btn-sm" href="/files/{{$document->file}}"><i class="fa fa-download"></i></a>
                                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalEditDoc-{{$document['id']}}"><i class="zmdi zmdi-edit"></i></button>
                                                        <button class="btn btn-danger btn-sm" onclick="confirmdelete('{{$document['id']}}')"><i class="fa fa-trash"></i></button>
                                                    </div>
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
</div>
</section>

@endsection

<script type="text/javascript">

    function confirmdelete(id){
        var del = confirm('Are you sure to delete this !');
        if(del){
            var deletes = "{{route('document.delete')}}/" + id;
            window.location.href = deletes;
            // console.log(id);
        }else {
            // return false;   
            console.log('no');
        }

    }

    $( document ).ready(function(){
//   Hide the border by commenting out the variable below
var $on = 'section';
$($on).css({
  'background':'none',
  'border':'none',
  'box-shadow':'none'
});
}); 
</script>