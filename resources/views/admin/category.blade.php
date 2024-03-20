@extends('admin.app')

@section('title') Category
@endsection

@section('content')
<section>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h2 class="card-header ">
                        Category
                    </h2>
                    <div id="model" class="d-none">category</div>

                    <div class="card-block p-3">
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addingmodal">Add Category</button>

                        <table id="dataTable" class="table table-striped table-bordered mt-1" style="width:100%">
                          <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Name</th>
                                  <th>Status</th>
                                  <th>Action </th>
                                  <th>Date</th>
                              </tr>
                          </thead>
                          <tbody>
                            
                            @foreach ($cat as $cats)
                            <tr>
                                <td> {{$cats->id}} </td>
                                <td> {{$cats->name}} </td>
                                <td> @if ($cats->status === 1)
                                    <span class="badge bg-success">Active</span>
                                @else
                                <span class="badge bg-warning">Draft</span>
                                @endif
                              <td> 
                                <div class="dropdown">
                                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                  Action
                                  </button>
                                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                  <li><a class="dropdown-item edit" data-id="{{$cats->id}}" href="#" data-toggle="modal" data-target="#editmodal">Edit</a></li>
                                  <li>@if ($cats->status === 1)
                                    <a class="dropdown-item draft text-warning" data-type="Draft" data-id="{{$cats->id}}" href="#"> Draft</a>
                                    @else 
                                    <a class="dropdown-item activate text-success" data-type="Activate" data-id="{{$cats->id}}" href="#">Activate</a>
                                  @endif</li>
                                  <li><a class="dropdown-item delete text-danger" data-type="Delete" data-id="{{$cats->id}}" href="#">Delete</a></li>
                                  </ul>  
                                </div>
                                 </td>
                              </td>
                                <td> {{date('d m Y', strtotime($cats->created_at))}} </td>
                            </tr>

                            @endforeach
                          </tbody>
                      </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Modal -->
<div class="modal fade" id="addingmodal" tabindex="-1" role="dialog" aria-labelledby="customModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="customModalLabel">Add Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" id="addform">
                @csrf
          <div class="row">

            <div class="col-xs-8 col-sm-6">
                <label for="name">Name </label><br>
                <input type="text" name="name" class="form-control" placeholder="enter category name">
            </div>
            <div class="col-xs-2 col-sm-6">
                <label for="name">Status </label><br>
                <input type="checkbox" name="status" id="" class="form-control" checked>
            </div>
          </div>
          <div class="col-12 mt-3">
            <input type="hidden" name="action" value="add">
            <button class="btn btn-primary" type="submit" id="submit"> Submit</button>
          </div>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>


    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="editmodallabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editmodallabel">Edit Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form method="post" id="editform">
                  @csrf
            <div class="row">
  
              <div class="col-xs-8 col-sm-6">
                  <label for="name">Name </label><br>
                  <input type="text" id="name" name="name" class="form-control" placeholder="enter category name">
              </div>
              <div class="col-xs-2 col-sm-6">
                  <label for="name">Status </label><br>
                  <input type="checkbox" name="status" id="status" class="form-control" checked>
              </div>
            </div>
            <div class="col-12 mt-3">
              <input type="hidden" name="action" value="edit">
              <input type="hidden" id="id" name="id">
              <button class="btn btn-primary" type="submit" id="submite"> Submit</button>
            </div>
          </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
  </div>

    


  @endsection