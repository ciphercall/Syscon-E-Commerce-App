@extends('layout.backends.home')

@section('css')
<link rel="stylesheet" href="{{url('backends/assets/bootstrap4-toggle-3.6.1/css/bootstrap4-toggle.min.css')}}">
@endsection


@section('page')
<div class="main-content">
<section class="section">
<div class="section-header">
<h1>Home Page</h1>
<div class="section-header-breadcrumb">
<div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
<div class="breadcrumb-item">Home Page</div>
</div>
</div>

<div class="section-body">
<div class="row mt-4">
<div class="col">
<div class="card">
<div class="card-header">
<div class="card-body">
<div class="row">
    <div class="col-12 col-sm-12 col-md-3">
        <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
            <li class="nav-item border rounded mb-1">
               <a class="nav-link active" id="popular-category-tab" data-toggle="tab" href="#popularCategory" role="tab" aria-controls="popularCategory" aria-selected="true">Popular Categories</a>
            </li>
            <li class="nav-item border rounded mb-1">
               <a class="nav-link" id="three-column-category" data-toggle="tab" href="#threeColumnCategory" role="tab" aria-controls="threeColumnCategory" aria-selected="true">Three Column Category</a>
            </li>
        </ul>
    </div>

    <div class="col-12 col-sm-12 col-md-9">
        <div class="border rounded">
            <div class="tab-content no-padding" id="homepageContent">
                <div class="tab-pane fade show active" id="popularCategory" role="tabpanel" aria-labelledby="popular-category-tab">
                    <div class="card m-0">
                        <div class="card-body">
                            <form action="{{url('home-page/1')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">                                                            
                                    <label for="">Section Title</label>
                                    <input type="text" name="txtSectionTitle" class="form-control" value="{{$homepage->s_title}}">
                                </div>

                                <div class="form-group">                                                            
                                    <label for="">Product Quentaty</label>
                                    <input type="text" name="txtProductQuentaty" class="form-control" value="{{$homepage->product_qty}}">
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <h3 class="mb-3">Category 1:</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="">Category</label>
                                        <select id="txtCategory1" class="form-control" name="txtCategory1" required>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->c_name }}" {{ ( $category->c_name == $homepage->category1) ? 'selected' : '' }}>
                                            {{ $category->c_name }}  
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="">Sub Category</label>
                                        <select id="txtSubCategory1" class="form-control" name="txtSubCategory1" required>
                                            @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->sub_categoryname }}" {{ ( $subcategory->sub_categoryname == $homepage->sub_category1) ? 'selected' : '' }}>
                                            {{ $subcategory->sub_categoryname }}  
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="">Child Category</label>
                                        <select id="txtChildCategory1" class="form-control" name="txtChildCategory1" required>
                                            @foreach ($childcategories as $childcategory)
                                            <option value="{{ $childcategory->child_category }}" {{ ( $childcategory->child_category == $homepage->child_category1) ? 'selected' : '' }}>
                                            {{ $childcategory->child_category }}  
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <h3 class="mb-3">Category 2:</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="">Category</label>
                                        <select id="txtCategory2" class="form-control" name="txtCategory2" required>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->c_name }}" {{ ( $category->c_name == $homepage->category2) ? 'selected' : '' }}>
                                            {{ $category->c_name }}  
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="">Sub Category</label>
                                        <select id="txtSubCategory2" class="form-control" name="txtSubCategory2" required>
                                            @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->sub_categoryname }}" {{ ( $subcategory->sub_categoryname == $homepage->sub_category2) ? 'selected' : '' }}>
                                            {{ $subcategory->sub_categoryname }}  
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="">Child Category</label>
                                        <select id="txtChildCategory2" class="form-control" name="txtChildCategory2" required>
                                            @foreach ($childcategories as $childcategory)
                                            <option value="{{ $childcategory->child_category }}" {{ ( $childcategory->child_category == $homepage->child_category2) ? 'selected' : '' }}>
                                            {{ $childcategory->child_category }}  
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <h3 class="mb-3">Category 3:</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="">Category</label>
                                        <select id="txtCategory3" class="form-control" name="txtCategory3" required>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->c_name }}" {{ ( $category->c_name == $homepage->category3) ? 'selected' : '' }}>
                                            {{ $category->c_name }}  
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="">Sub Category</label>
                                        <select id="txtSubCategory3" class="form-control" name="txtSubCategory3" required>
                                            @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->sub_categoryname }}" {{ ( $subcategory->sub_categoryname == $homepage->sub_category3) ? 'selected' : '' }}>
                                            {{ $subcategory->sub_categoryname }}  
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="">Child Category</label>
                                        <select id="txtChildCategory3" class="form-control" name="txtChildCategory3" required>
                                            @foreach ($childcategories as $childcategory)
                                            <option value="{{ $childcategory->child_category }}" {{ ( $childcategory->child_category == $homepage->child_category3) ? 'selected' : '' }}>
                                            {{ $childcategory->child_category }}  
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <h3 class="mb-3">Category 4:</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="">Category</label>
                                        <select id="txtCategory4" class="form-control" name="txtCategory4" required>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->c_name }}" {{ ( $category->c_name == $homepage->category4) ? 'selected' : '' }}>
                                            {{ $category->c_name }}  
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="">Sub Category</label>
                                        <select id="txtSubCategory4" class="form-control" name="txtSubCategory4" required>
                                            @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->sub_categoryname }}" {{ ( $subcategory->sub_categoryname == $homepage->sub_category4) ? 'selected' : '' }}>
                                            {{ $subcategory->sub_categoryname }}  
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="">Child Category</label>
                                        <select id="txtChildCategory4" class="form-control" name="txtChildCategory4" required>
                                            @foreach ($childcategories as $childcategory)
                                            <option value="{{ $childcategory->child_category }}" {{ ( $childcategory->child_category == $homepage->child_category4) ? 'selected' : '' }}>
                                            {{ $childcategory->child_category }}  
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <button class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade show active" id="threeColumnCategory" role="tabpanel" aria-labelledby="three-column-category">
                    <div class="card m-0">
                        <div class="card-body">
                            <form action="{{url('home-page/1')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12">
                                        <h3 class="mb-3">Category 1:</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="">Category</label>
                                        <select id="txtCategory1" class="form-control" name="txtCategory1" required>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->c_name }}" {{ ( $category->c_name == $homepage->category1) ? 'selected' : '' }}>
                                            {{ $category->c_name }}  
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="">Sub Category</label>
                                        <select id="txtSubCategory1" class="form-control" name="txtSubCategory1" required>
                                            @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->sub_categoryname }}" {{ ( $subcategory->sub_categoryname == $homepage->sub_category1) ? 'selected' : '' }}>
                                            {{ $subcategory->sub_categoryname }}  
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="">Child Category</label>
                                        <select id="txtChildCategory1" class="form-control" name="txtChildCategory1" required>
                                            @foreach ($childcategories as $childcategory)
                                            <option value="{{ $childcategory->child_category }}" {{ ( $childcategory->child_category == $homepage->child_category1) ? 'selected' : '' }}>
                                            {{ $childcategory->child_category }}  
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <h3 class="mb-3">Category 2:</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="">Category</label>
                                        <select id="txtCategory2" class="form-control" name="txtCategory2" required>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->c_name }}" {{ ( $category->c_name == $homepage->category2) ? 'selected' : '' }}>
                                            {{ $category->c_name }}  
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="">Sub Category</label>
                                        <select id="txtSubCategory2" class="form-control" name="txtSubCategory2" required>
                                            @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->sub_categoryname }}" {{ ( $subcategory->sub_categoryname == $homepage->sub_category2) ? 'selected' : '' }}>
                                            {{ $subcategory->sub_categoryname }}  
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="">Child Category</label>
                                        <select id="txtChildCategory2" class="form-control" name="txtChildCategory2" required>
                                            @foreach ($childcategories as $childcategory)
                                            <option value="{{ $childcategory->child_category }}" {{ ( $childcategory->child_category == $homepage->child_category2) ? 'selected' : '' }}>
                                            {{ $childcategory->child_category }}  
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <h3 class="mb-3">Category 3:</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="">Category</label>
                                        <select id="txtCategory3" class="form-control" name="txtCategory3" required>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->c_name }}" {{ ( $category->c_name == $homepage->category3) ? 'selected' : '' }}>
                                            {{ $category->c_name }}  
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="">Sub Category</label>
                                        <select id="txtSubCategory3" class="form-control" name="txtSubCategory3" required>
                                            @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->sub_categoryname }}" {{ ( $subcategory->sub_categoryname == $homepage->sub_category3) ? 'selected' : '' }}>
                                            {{ $subcategory->sub_categoryname }}  
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="">Child Category</label>
                                        <select id="txtChildCategory3" class="form-control" name="txtChildCategory3" required>
                                            @foreach ($childcategories as $childcategory)
                                            <option value="{{ $childcategory->child_category }}" {{ ( $childcategory->child_category == $homepage->child_category3) ? 'selected' : '' }}>
                                            {{ $childcategory->child_category }}  
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <button class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
</div>

@section('js')
<script src="{{url('backends/assets/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')}}"></script>
@endsection


@endsection






