
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">{{ $record->name }}</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="#"></a></li>
            </ol>
        </div>
    </div>

    <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12">

                    <div class="card-body">
                      
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Category Id') }}</label>

                            <div class="col-md-6">
                                {{ $record->category_id }}
                            </div>
                        </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }}</label>
    
                                <div class="col-md-6">
                                    {{ $record->name }}
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
    
                                <div class="col-md-6">
                                    {{ $record->description }}
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('	status') }}</label>
    
                                <div class="col-md-6">
                                   @if ($record->status =="1")
                                       <span class="btn btn-success text-light">Active</span>
                                   @else
                                   <span class="btn btn-danger text-light">In-Active</span>
                                   @endif
                                </div>
                            </div>
    
                           
                       
                    </div>
            </div>
            
                   </div> 
            </div>
    <!--/.row -->
    <!--row -->
    <!-- /.row -->
</div>
