@extends('admin.layouts.layout')

@section('content')
    <div class="row mt-5">
        <div class="col-lg-12">
            <h1 class="page-header">გვერდები</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display datatable w-full">
            <thead>
            <tr>
                <th class="border-b-2 whitespace-no-wrap">#</th>
                <th class="border-b-2 text-center whitespace-no-wrap">გვერდის დასახელება</th>
                <th class="border-b-2 text-center whitespace-no-wrap">გვერდის დასახელება</th>
                <th class="border-b-2 text-center whitespace-no-wrap">სტატუსი</th>
                <th class="border-b-2 text-center whitespace-no-wrap">მოქმედება</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pages as $page)
                <tr>
                    <td class="border-b">
                        <div class="text-gray-600 text-xs whitespace-no-wrap">{{ $page->id }}</div>
                    </td>
                    <td class="border-b">
                        <div class="flex items-center sm:justify-center "> {{ $page->title_ge }}</div>

                    </td>
                    <td class="border-b">
                        <div class="flex items-center sm:justify-center "> {{ $page->title_en }}</div>

                    </td>
                    <td class="w-40 border-b">

                        @if($page->status)
                            <a href={{route('activatePage',$page->id)}} class="flex items-center sm:justify-center text-theme-9"> <i
                                        data-feather="check-square" class="w-4 h-4 mr-2"></i> აქტიური</a>

                        @else
                            <a href={{route('activatePage',$page->id)}} class="flex items-center sm:justify-center text-theme-6"> <i
                                        data-feather="check-square" class="w-4 h-4 mr-2"></i> არა აქტიური </a>
                        @endif
                    </td>
                    <td class="border-b w-5">
                        <div class="flex sm:justify-center items-center">
                            <a class="flex items-center mr-3" href={{route('pageUpdate',$page->id)}}> <i
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
        $('.side-menu[data-menu="settings"]').addClass('side-menu--active');
        $('.data-menu-item[data-menu="settings"]').addClass('side-menu__sub-open');
    </script>
@endsection