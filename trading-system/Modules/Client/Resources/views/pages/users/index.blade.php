@extends('dashboard::layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row-fluid">

        <div class="span12">
            <div>
                <h3 class="page-title">المستخدمين</h3>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route('dashboard.index') }}"><i class="icon-home"></i></a>
                        <span class="divider">&nbsp;</span>
                    </li>
                    <li><a href="{{ route('users.index') }}">المستخدمين </a><span class="divider">&nbsp;</span></li>
                </ul>
            </div>
        </div>

        <div id="page">
            <div class="">
                <a href="{{ route('users.create') }}" class="btn btn-success btn_add_option"><span class="icon-plus"></span>&nbsp;اضافة مستخدم</a>
            </div>
            <br>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget" id="dataTable">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i>&nbsp; المستخدمين</h4>
                        </div>
                        <div class="widget-body">
                            <table class="table table-striped table-bordered table-advance table-hover table_info" cellspacing="0" rules="all" border="1" style="border-collapse:collapse;">
                                <thead>
                                   <tr>
                                    <th scope="col" style="width:20px;">
                                        <center>#</center>
                                    </th>
                                    <th scope="col">اسم الموظف</th>
                                    <th scope="col">مجموعة المستخدمين</th>
                                    <th scope="col" style="width:40px;"><center>تعديل</center></th>
                                    <th scope="col" style="width:40px;"><center>حذف</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $c=1; @endphp
                                @foreach($items as $item)
                                <tr class="new">
                                    <td><center> {{ $c++}} </center></td>
                                    <td id="v{{ $item->id }}">{{ $item->name }}</td>
                                    <td>{{ $item->roles->first()->name ?? '' }}</td>
                                    <td>
                                        <center><a href="{{ route('users.edit', $item->id) }}" class="btn_edit_option" data-id="{{ $item->id }}"></a></center>
                                    </td>
                                    <td class="text-center">
                                        <center><a class="btn_delete_option" data-id="{{ $item->id }}"></a></center>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="row-fluid">
                            <div class="span4"></div>
                            <div class="span8">
                                <div class="dataTables_paginate paging_bootstrap pagination">
                                    {{ $items->links() }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- END RECENT ORDERS PORTLET-->
            </div>
        </div>
    </div>
</div>
</div>
@stop
