@extends('admin.app')

@section('title') Edit Medicine
@endsection

@section('content')
<section>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h2 class="card-header ">
                        Edit Medicine
                    </h2>
                    <div id="model" class="d-none">product</div>

                    <div class="card-block p-3">
                       
                        <form id="editform" method="POST">
                            <div class="row">
                            @csrf
                           <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="name"> Name </label>
                            <input type="text" name="name" class="form-control" value="{{$row->name}}">
                           </div>
                           <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="category"> Category </label>
                            <select name="category" class="form-control" id="category">
                                <option value="{{$row->cat_id}}">{{$row->cat_name}} </option>
                                @foreach ($cats as  $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}} </option>
                                @endforeach
                            </select>
                           </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                                <label for="price"> Price </label>
                                <input type="number" step="0.01" name="price" class="form-control" value="{{$row->price}}"/>
                               </div>
                               <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                                <label for="quantity"> Quantity </label>
                                <input type="number" step="0.01" name="quantity" class="form-control" value="{{$row->quantity}}"/>
                               </div>

                               <div class="col-12 mb-3">
                                <label for="description"> Description </label>
                                <textarea class="form-control" name="description"> {{$row->description}} </textarea>
                               </div>

                               <div class="col-1 mb-3">
                                <label for="quantity" style=""> Status </label>
                                @if ($row->status == 1) 
                                <input type="checkbox"  name="status" class="form-control" checked>
                                @else
                                <input type="checkbox"  name="status" class="form-control">
                                @endif
                               </div>

                               <div class="col-11 mb-3">
                                <input type="hidden" name="action" value="edit">
                                <input type="hidden" name="id" value="{{$row->id}}">
                                <button class="btn btn-primary" type="submit" id="submit"> Submit</button>
                               </div>
                           </div>
                        </div>
                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    


  @endsection