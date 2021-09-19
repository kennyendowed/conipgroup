@extends('layouts.app2')
@section('content')

  <div class="flex-fill d-flex flex-column justify-content-center py-4">
  <form class="card card-md"  method="POST" action="{{route('create_vendor_product') }}" enctype="multipart/form-data">
      {{ csrf_field() }}
        <div class="card-body">
          {{-- <h2 class="card-title text-center mb-4">*Provide All Requirement........</h2> --}}
          <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input id="subname" type="text" placeholder="Enter Product Name...." class="form-control{{ $errors->has('subname') ? ' is-invalid' : '' }}" name="subname" value="{{ old('subname') }}" required  autofocus>

            @if ($errors->has('subname'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('subname') }}</strong>
                </span>
            @endif

</div>
          <div class="mb-2">
            <div class="form-label">Price</div>
            <input id="price" type="text" placeholder="Enter Product  Price...." class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') }}" required  autofocus>

            @if ($errors->has('price'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
             </div>
             <div class="mb-3">
               <div class="form-label">Quantity</div>
               <input id="Quantity" type="number" placeholder="Enter Product  Quantity...." class="form-control{{ $errors->has('Quantity') ? ' is-invalid' : '' }}" name="Quantity" value="{{ old('Quantity') }}" required  autofocus>

               @if ($errors->has('Quantity'))
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $errors->first('Quantity') }}</strong>
                   </span>
               @endif
                </div>
                <div class="mb-2">
                  <div class="form-label">Product Image</div>
                  <input name="description"  type="file"  class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}">

                      @if ($errors->has('description'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('description') }}</strong>
                          </span>
                      @endif
                   </div>
                   <div class="mb-3">
                     <div class="form-label">Category</div>
                     <select id="category" name="category" class="form-select{{ $errors->has('category') ? ' has-error' : '' }}" required>
                       <option value="">Select Category </option>
                       <option value="Tickets">Tickets </option>
                       <option value="Sparkle-Holographic">Sparkle-Holographic </option>
                         <option value="Paper-Tyvek-wristbands">Paper-Tyvek-wristbands </option>
                           <option value="Plastic-Vinyl-wristbands">Plastic-Vinyl-wristbands </option>
                         <option value="Rubber-Silicone-Wristbands">Rubber-Silicone-Wristbands </option>
                       <option value="Fabric-Wristbands">Fabric-Wristbands </option>

                     </select>
                       @if ($errors->has('category'))
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $errors->first('category') }}</strong>
                           </span>
                       @endif
                      </div>

          <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100">Submit</button>
          </div>
        </div>
        <div class="hr-text"></div>

      </form>


  </div>



                  @section('javascript')
                    
                      <script >

                                      var room = 1;
                                      function cat_fields() {
                                      var cat_fields ='cat_fields_';
                                      // alert(cat_fields);
                                      room++;
                                      var objTo = document.getElementById(cat_fields)
                                      var divtest = document.createElement("div");
                                      divtest.setAttribute("class", "form-group removeclass"+room);
                                      var rdiv = 'removeclass'+room;
                                      divtest.innerHTML = ' <div class="panel panel-default"> <div class="panel-body"><div class="form-group row"> <label for="name" class="col-md-4 col-form-label text-md-right">Product Name</label>     <div class="col-md-6"> <input type="text" class="form-control" id="subname[]" name="subname[]" value="" placeholder="Enter Product Name In Combo....">    </div> </div> <div class="form-group row"> <label for="name" class="col-md-4 col-form-label text-md-right">Price</label> <div class="col-md-6"> <input type="text" class="form-control" id="price[]" name="price[]" value="" placeholder="Enter Product  Price...."> </div> </div><div class="form-group row"> <label for="description" class="col-md-4 col-form-label text-md-right">Product Image</label>     <div class="col-md-6"> 	<input name="description[]"  type="file"  class="form-control">  </div> </div> <div class="form-group row">     <label for="color" class="col-md-4 col-form-label text-md-right">Color</label><div class="col-md-6">   <input id="color[]" name="color[]" type="checkbox" value="yellow"> <label>Yellow</label><br /> <input id="color[]" name="color[]" type="checkbox" value="red"> <label>Red</label><br /> <input id="color[]" name="color[]" type="checkbox" value="orange">  <label>Orange</label><br /> <input id="color[]" name="color[]" type="checkbox" value="green"> <label>Green</label><br /> <input id="color[]" name="color[]" type="checkbox" value="pupple">  <label>Pupple</label><br /> <input id="color[]" name="color[]" type="checkbox" value="blue">  <label>Blue</label><br /> <div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_cat_fields('+ room +');"> <span class="icon-minus-sign" aria-hidden="true"></span>Remove </button></div></div></div></div><div class="clear"></div></div></div>';

                                      objTo.appendChild(divtest)
                                      }
                                      function remove_cat_fields(rid) {
                                      $('.removeclass'+rid).remove();
                                      }
                                      </script>

                      @endsection

                    @endsection
