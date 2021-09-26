@extends('layouts.app2')

@section('content')
<div class="row">
       <!-- Sidebar-->
       @include('components.aside')
       
     <!-- Content  -->
     
     <section class="col-lg-8">
      {{-- <div class="d-flex">

        <div class="ms-auto text-muted">
          Search:
          <div class="ms-2 d-inline-block">
            <input type="text" id="myInput" class="form-control form-control-sm" aria-label="Search invoice">
          </div>
        </div>
      </div> --}}

        <!-- Orders list-->
        <div class="table-responsive fs-md mb-4">
          <div class="text-end">
            <a class="btn btn-success text-light" data-bs-toggle="modal" id="mediumButton" data-bs-target="#mediumModal"
            data-attr="{{ route('category.create') }}" title="Create a Category"> <i class="fas fa-plus-circle"></i>Create New Category
        </a>
            {{-- <button class="btn btn-primary" id="mediumButton" data-bs-toggle="modal" data-bs-target="#mediumModal" data-bs-attr="{{ route('category.create') }}" title="Create a Category"> <i class="fas fa-plus-circle"></i>New Category</button> --}}
          </div>
          <table id="ejemplo" class="table table-hover mb-0">
            <thead>
              <tr>
                <th>#</th>
                <th>Category Id #</th>
                <th>Name</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="myTable">
              @if($record)
              <?php $count = 0; ?>
              @foreach($record as $data)
              <?php $count++ ?>
     <tr>
        <td class="py-3">{{$count}}</td>
         <td class="py-3"><?php echo $data['category_id'] ?></td>
         <td class="py-3"><?php echo $data['name'] ?></td>
    <?php if($data['status']){
          ?>
                <td class="py-3"><span class="badge bg-success m-0">Active</span></td>
            <?php
        }
            else{?>
             <td class="py-3"><span class="badge bg-info m-0">In Active</span></td>
           <?php }
         ?>
              <td class="py-3">
                <form action="{{ route('category.destroy',['category'=>$data->category_id]) }}" method="POST">

                    <a class="btn btn-info text-light" data-bs-toggle="modal" id="smallButton" data-bs-target="#smallModal"
                        data-attr="{{ route('category.show',['category'=>$data->category_id]) }}" title="show">
                        <i class="fas fa-eye text-success  fa-lg"></i>view
                    </a>

                    <a  class="btn btn-warning text-light" class="text-secondary" data-bs-toggle="modal" id="mediumButton" data-bs-target="#mediumModal"
                    data-attr="{{ route('category.edit',['category'=>$data->category_id]) }}">
                        <i class="fas fa-edit text-gray-300"></i>edit
                    </a>
                    
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-primary btn-shadow " title="delete" style="border: none; background-color:transparent;">
                        <i class="fas fa-trash fa-lg text-danger"></i>delete
                    </button>
                </form></td>
 {{-- <td>    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#countModal" data-bs-id=<?php echo $data['category_id'] ?> data-name=<?php echo $data['name'] ?>> Edit </button>
         <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delModal" data-bs-id=<?php echo $data['category_id'] ?>> Delete </button></td> --}}
     </tr>
    @endforeach
                   @else <tr><td  class="py-3">No record</td></tr>
                   @endif
              {{-- <tr>
                <td class="py-3"><a class="nav-link-style fw-medium fs-sm" href="#order-details" data-bs-toggle="modal">34VB5540K83</a></td>
                <td class="py-3">May 21, 2019</td>
                <td class="py-3"><span class="badge bg-info m-0">In Progress</span></td>
                <td class="py-3">$358.75</td>
              </tr> --}}
      
            </tbody>
          </table>
        </div>
        <!-- Pagination-->

         <!-- Open Ticket Modal-->
      {{-- <form class="needs-validation modal fade" method="post" id="new-category" tabindex="-1" novalidate>
        @csrf
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Submit new category</h5>
              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p class="text-muted fs-sm"></p>
              <div class="row gx-4 gy-3">
                <div class="col-12">
                  <label class="form-label" for="title">Title</label>
                  <input class="form-control @error('title') is-invalid @enderror" type="text" id="title" name="title" required>
                  @if ($errors->has('title'))
                  <span class="invalid-feedback" role="alert">
                      <strong style="color:red">{{ $errors->first('title') }}</strong>
                  </span>
                  <br/>
                  @endif
                </div>
           
                <div class="col-12">
                  <label class="form-label" for="description">Description</label>
                  <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"  rows="8"></textarea>
                  @if ($errors->has('description'))
                  <span class="invalid-feedback" role="alert">
                      <strong style="color:red">{{ $errors->first('description') }}</strong>
                  </span>
                  <br/>
                  @endif
                </div>
                <div class="col-12">
                  <input class="form-control" type="file" id="file-input">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
              <button class="btn btn-primary" type="submit">Submit Category</button>
            </div>
          </div>
        </div>
      </form> --}}

           

      </section>



      @section('javascript')
      <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
      <script src="{{ asset('assets/yo/js/popper.min.js') }}" ></script>
        <script src="{{ asset('assets/yo/js/bootstrap.min.js') }}" ></script>
        <script src="{{ asset('assets/yo/js/jquery.dataTables.min.js') }}" ></script>
        <script src="{{ asset('assets/yo/js/dataTables.bootstrap4.min.js') }}" ></script>
        <script src="{{ asset('assets/yo/js/dataTables.buttons.min.js') }}" ></script>
        <script src="{{ asset('assets/yo/js/buttons.bootstrap4.min.js') }}" ></script>
        <script src="{{ asset('assets/yo/js/jszip.min.js') }}" ></script>
        <script src="{{ asset('assets/yo/js/pdfmake.min.js') }}" ></script>
        <script src="{{ asset('assets/yo/js/vfs_fonts.js') }}" ></script>
        <script src="{{ asset('assets/yo/js/buttons.html5.min.js') }}" ></script>
        <script src="{{ asset('assets/yo/js/buttons.print.min.js') }}" ></script>
        <script src="{{ asset('assets/yo/js/buttons.colVis.min.js') }}" ></script>
      <script src="{{ asset('assets/datatable/script.js') }}" ></script>
      <script>
        $(document).ready(function(){
        
        $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
        });
      });
</script>
      @endsection
      
      @endsection
