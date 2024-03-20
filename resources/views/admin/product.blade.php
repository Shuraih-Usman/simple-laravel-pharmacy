@extends('admin.app')

@section('title') Products
@endsection

@section('content')
<section>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h2 class="card-header ">
                        Products
                    </h2>
                    <div id="model" class="d-none">product</div>

                    <div class="card-block p-3">
                        

                        <table id="dataTable" class="table table-striped table-bordered mt-1" style="width:100%">
                          <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Name</th>
                                  <th>Price </th>
                                  <th>Quantity</th>
                                  <th>Category</th>
                                  <th>Description</th>
                                  <th>Status</th>
                                  <th>Action </th>
                                  <th>Date</th>
                              </tr>
                          </thead>
                          <tbody>
                            
                            @foreach ($products as $row)
                            <tr>
                                <td> {{$row->id}} </td>
                                <td> {{$row->name}} </td>
                                <td> {{$row->price}} </td>
                                <td> {{$row->quantity}} </td>
                                <td> {{$row->cat_name}} </td>
                                <td> {{$row->description}} </td>
                                <td> @if ($row->status === 1)
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
                                  <li><a class="dropdown-item" data-id="{{$row->id}}" href="{{url('/edit/'.$row->id)}}">Edit</a></li>
                                  <li>@if ($row->status === 1)
                                    <a class="dropdown-item draft text-warning" data-type="Draft" data-id="{{$row->id}}" href="#"> Draft</a>
                                    @else 
                                    <a class="dropdown-item activate text-success" data-type="Activate" data-id="{{$row->id}}" href="#">Activate</a>
                                  @endif</li>
                                  <li><a class="dropdown-item delete text-danger" data-type="Delete" data-id="{{$row->id}}" href="#">Delete</a></li>
                                  </ul>  
                                </div>
                                 </td>
                              </td>
                                <td> {{date('d m Y', strtotime($row->created_at))}} </td>
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



    


  @endsection