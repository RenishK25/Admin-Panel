@extends("admin.layout.app")

@section("title","Dashboard")

@section("style")
<style>
    span.counter-value{margin-left: 170px;}
    </style>
@endsection
@section("content")
{{-- <div class="main-content"> --}}

    {{-- <div class="page-content"> --}}
        <div class="container-fluid" style="text-align:center">

            <div class="row">
                {{-- <div class="col"> --}}

                    {{-- <div class="h-100"> --}}
                        <div class="row">
                            <div class="col-xl-4 col-md-6">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Total Products</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" style="text-align: center" data-target="{{$product}}">0</span></h4>
                                                </div>
                                            <div class="avatar-sm flex-shrink-0">
                                                {{-- <span class="avatar-title bg-soft-success rounded fs-3">
                                                    <i class="bx bx-dollar-circle text-success"></i>
                                                </span> --}}
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-xl-4 col-md-6">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                             <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Category</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{$category}}">0</span></h4>
                                                </div>
                                            <div class="avatar-sm flex-shrink-0">
                                                {{-- <span class="avatar-title bg-soft-info rounded fs-3">
                                                    <i class="bx bx-shopping-bag text-info"></i>
                                                </span> --}}
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-xl-4 col-md-6">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Sub Category</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{$subcategory}}">0</span></h4>
                                                </div>
                                            <div class="avatar-sm flex-shrink-0">
                                                {{-- <span class="avatar-title bg-soft-warning rounded fs-3">
                                                    <i class="bx bx-user-circle text-warning"></i>
                                                </span> --}}
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-xl-4 col-md-6">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Product Brands</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{$product_brand}}">0</span> </h4>
                                                </div>
                                            <div class="avatar-sm flex-shrink-0">
                                                {{-- <span class="avatar-title bg-soft-primary rounded fs-3">
                                                    <i class="bx bx-wallet text-primary"></i>
                                                </span> --}}
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div> <!-- end row-->
                    {{-- </div>
                </div> --}}
            </div>
        </div>
    {{-- </div>
</div> --}}
@endsection
@section("script")
@endsection
