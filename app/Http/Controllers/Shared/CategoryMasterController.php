<?php

namespace App\Http\Controllers\Shared;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\CategoriesResource;

class CategoryMasterController extends Controller
{
  public function index()
  {
    // $post = Category::paginate();
    // return new App\Http\Resources\CategoriesResource($post);
  }

  public function show($id)
  {
      #code
  }

  public function store(Request $request)
  {
      #code
  }
}
