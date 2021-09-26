
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Create New Category</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="#"></a></li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <!-- ============================================================== -->
    <!-- Different data widgets -->
    <!-- ============================================================== -->
    <!-- .row -->

    <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12">
                  
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
                    <div class="card-body">
                        <form action="{{ route('category.store') }}" method="post" class="form">
                            @csrf
    
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
                              
                            </div>
    
                          
                            <button class="btn btn-primary btn-shadow d-block w-100" type="submit">Submit</button>
                        </form>
                    </div>
            </div>
            
                   </div> 
            </div>
    <!--/.row -->
    <!--row -->
    <!-- /.row -->
</div>
