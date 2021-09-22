@extends('admin.layouts.admin')
@section('content')
<div class="animated fadeInUpShort">
    <div class="row p-t-b-10 ">
        <div class="col">
            <h4>
                <i class="icon-package"></i>
                Category
            </h4>
        </div>
    </div>
            <div class="row">
                <ul class="nav responsive-tab nav-material nav-material-white">
                    <li>
                    <a class="nav-link" href="{{route('all-category')}}"><i class="icon icon-list"></i>All Category</a>
                    </li>
                    <li>
                    <a class="nav-link active" href="{{route('add-category')}}"><i class="icon icon-plus-circle"></i> Add New Category</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="container-fluid animatedParent animateOnce my-3">
            <div class="animated fadeInUpShort">
                <div class="row my-3">
                    <div class="col-md-7 offset-md-2">
                        <form action="#">
                            <div class="card no-b no-r">
                                <div class="card-body">
                                    <h5 class="card-title">Edit Category</h5>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="form-group m-0">
                                                <label for="name" class="col-form-label s-12">Nama</label>
                                                <input id="category-name"  name="category_name" placeholder="Enter Nama category" class="form-control r-0 light s-12 " type="text">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row mt-1">
                                        <div class="form-group col-4 m-0">
                                            <label class="col-form-label s-12">Gambar</label>
                                            <div id="category-image">
                                            </div>
                                            <input id="category-image" name="category_image" class="form-control r-0 light s-12 " type="file">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <button type="button" id="btn-category-submit-update" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Save Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

</div>
@endsection
@push('scripts')
<script src="{{ url ('template/assets/js/functions.js')}}"></script>
{{-- <script>
    autoRedirect()

    let category_id = '{{  $category_id }}';
    let category_data = null;

    $('document').ready(function(){  

        loadCategoryData();

        function ajaxSetup(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Authorization' : 'Bearer ' + getToken(),
                }
            });
        }

        function loadCategoryData()  
        {
            ajaxSetup();

            $.ajax({
                type: "get",
                url: "https://ecommerce.dev.smartrni.com/api/categories/" + category_id,
                dataType: 'JSON',
                success: function(data) {
                    console.log(data);
                    category_data = data;
                    placingToHtml(data);
                },
                error: function(e) {
                    console.log(e)
                }
            });            
        }

        function placingToHtml(category_data)
        {
            document.getElementById('category-name').value = category_data.name;
            document.getElementById('category-image').innerHTML += `
                <img src="${ category_data.category_image }" width="100" height="100"> 
            `;
            
        }

        $('#btn-category-submit-update').click(function(e){
            e.preventDefault();

            let category_name = $('#category-name').val()
        
            var formData = new FormData();
            formData.append("name", category_name)

            if($("input[type='file']")[0].files[0] != undefined){
                formData.append("category_image", $("input[type='file']")[0].files[0])

                runUpdate(formData)
            }else{
                fetch(category_data.category_image)
                .then(function(response) {
                    return response.blob()
                })
                .then(function(blob) {
                    formData.append('category_image', blob)
                    runUpdate(formData)
                });
            }    
        }) 

        function runUpdate(formData)
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Authorization' : 'Bearer ' + getToken(),
                }
            });

            $.ajax({
                type: "PUT",
                url: "https://ecommerce.dev.smartrni.com/api/categories/" + category_id,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);

                    window.location.href = "{{ route('all-category')}}";
                },
                error: function(e) {
                    console.log(e)
                }
            });
        }          
  });
</script> --}}
@endpush