@extends('admin.layouts.layout')

@section('content')
    <div class="row mt-5">
        <div class="col-lg-12">
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a href="{{route('sizeCreate')}}" class="button text-white bg-theme-1 shadow-md mr-2">ზომის დამატება</a>
    </div>
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display datatable w-full">
            <thead>
            <tr>
                <th class="border-b-2 whitespace-no-wrap">#</th>
                <th class="border-b-2 text-center whitespace-no-wrap">ზომის სახელი</th>
                <th class="border-b-2 text-center whitespace-no-wrap">მოქმედება</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sizes as $size)
                <tr>
                    <td class="border-b">
                        <div class="text-gray-600 text-xs whitespace-no-wrap">{{ $size->id }}</div>
                    </td>
                    <td class="border-b">
                        <div class="flex items-center sm:justify-center "> {{ $size->title }}</div>
                    </td>
                    <td class="border-b w-5">
                        <div class="flex sm:justify-center items-center">
                            <a class="flex items-center mr-3" href={{route('sizeUpdate',$size->id)}}> <i
                                        data-feather="check-square" class="w-4 h-4 mr-1"></i> რედაქტირება </a>
                        </div>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@endsection

@section('custom_scripts')
    <script type="text/javascript">
        $('.side-menu').removeClass('side-menu--active');
        $('.data-menu-item').removeClass('side-menu__sub-open');
        $('.side-menu[data-menu="shop"]').addClass('side-menu--active');
        $('.data-menu-item[data-menu="shop"]').addClass('side-menu__sub-open');
    </script>
@endsection