
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Wdit Category</h4>
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
                        {{ Form::model($shark, array('route' => array('category.update', $record->category_id), 'method' => 'PUT')) }}
                        {{-- <form action="{{ route('category.update',['category'=>$record->category_id]) }}" method="post" class="form">
                            @csrf --}}
                            {{-- <input type="hidden" name="id" value=" {{$record->category_id}}"/> --}}
                            <p class="text-muted fs-sm"></p>
                            <div class="row gx-4 gy-3">
                              <div class="col-12">
                                <label class="form-label" for="title">Title</label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text" id="title" name="name" value="{{ $record->name }}"  required>
                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red">{{ $errors->first('name') }}</strong>
                                </span>
                                <br/>
                                @endif
                              </div>
                         
                              <div class="col-12">
                                <label class="form-label" for="description">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"  rows="8">{{ $record->description }}</textarea>
                                @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red">{{ $errors->first('description') }}</strong>
                                </span>
                                <br/>
                                @endif
                              </div>
                              
                            </div>
    
                            {{ Form::submit('Edit the Category!', array('class' => 'btn btn-primary btn-shadow d-block w-100')) }}

{{ Form::close() }}
                            {{-- <button class="btn btn-primary btn-shadow d-block w-100" type="submit">Submit</button>
                        </form> --}}
                    </div>
            </div>
            
                   </div> 
            </div>
    <!--/.row -->
    <!--row -->
    <!-- /.row -->
</div>
