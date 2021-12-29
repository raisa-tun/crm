

@extends('admin.layouts.main')



@section('style')
@endsection
@section('form')

    <div class="container-fluid p-0">
     {{--  @include('admin.partials.notification')  --}}
        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h1 class="h3 mb-3">
                    <i class="align-middle father-inline-fix" data-feather="grid"></i>
                    @if(isset($company)) Update @endif
                </h1>
            </div>
            <div class="col-auto ml-auto text-right mt-n1">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Company</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@if(isset($company)) Update @endif</li>
                    </ol>
                </nav>
            </div>
        </div>

        <?php if(isset($company)) {
            $actionUrl =  route('company.update',['company'=>$company]);
            $method =  'PATCH';
        }else{
            $actionUrl = route('company.store') ;
            $method = 'POST';
        }; ?>

            <form method="post" action="{{ $actionUrl }}"
                  enctype="multipart/form-data" id="taxCategoryForm" name="taxCategoryForm">
                @method($method)
                @csrf
                @include('admin.contents.company._fields')
            </form>

    </div>

@endsection

