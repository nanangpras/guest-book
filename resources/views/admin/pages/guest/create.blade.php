@extends('admin.layouts.admin')
@section('content')
<div class="animated fadeInUpShort">
    <div class="row p-t-b-10 ">
        <div class="col">
            <h4>
                <i class="icon-package"></i>
                Produk
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
                                    <h5 class="card-title">Add New Category</h5>
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
                                            <input id="category-image" name="category_image" class="form-control r-0 light s-12 " type="file">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <button type="button" id="btn-category-submit" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Save Data</button>
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
    $('document').ready(function(){

        $('#btn-category-submit').click(function(e){
            e.preventDefault();
            let category_name = $('#category-name').val()

            var formData = new FormData();
            formData.append("name", category_name)
            formData.append("category_image", $("input[type='file']")[0].files[0])

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Authorization' : 'Bearer ' + getToken(),
                }
            });

            $.ajax({
                type: "post",
                url: "https://ecommerce.dev.smartrni.com/api/categories",
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
        })
    });
</script> --}}
@endpush
