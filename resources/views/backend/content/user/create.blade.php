@extends('backend.layout.master')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/src/plugins/switchery/switchery.min.css') }}">
@endpush

@section('content')
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-3 col-sm-12 mb-30">
                <div class="pd-20 card-box height-100-p">
                    <h4 class="mb-20 h4">Permissions to Read</h4>
                    <ul class="list-group">
                        @foreach ($permissions as $item)
                            @php
                                $thisPermission = explode('-',$item->name);
                            @endphp
                            @if ($thisPermission[0] == 'read')
                                <li class="list-group-item">
                                    <input type="checkbox" @if ($user->)
                                        
                                    @endif class="switch-btn" data-secondary-color="#f56767" data-color="#28a745" name="permission[]" value="{{ $item->id }}">
                                    <label for="">{{ $item->name }} </label>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 mb-30">
                <div class="pd-20 card-box height-100-p">
                    <h4 class="mb-20 h4">Permissions to Add</h4>
                    <ul class="list-group">
                        @foreach ($permissions as $item)
                            @php
                                $thisPermission = explode('-',$item->name);
                            @endphp
                            @if ($thisPermission[0] == 'add')
                                <li class="list-group-item">
                                    <input type="checkbox" @if ($user->hasPermissionTo($item->name))
                                        
                                    @endif class="switch-btn" data-secondary-color="#f56767" data-color="#28a745" name="permission[]" value="{{ $item->id }}">
                                    <label for="">{{ $item->name }} </label>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 mb-30">
                <div class="pd-20 card-box height-100-p">
                    <h4 class="mb-20 h4">Permissions to Edit</h4>
                    <ul class="list-group">
                        @foreach ($permissions as $item)
                            @php
                                $thisPermission = explode('-',$item->name);
                            @endphp
                            @if ($thisPermission[0] == 'edit')
                                <li class="list-group-item">
                                    <input type="checkbox" @if ($user->)
                                        
                                    @endif class="switch-btn" data-secondary-color="#f56767" data-color="#28a745" name="permission[]" value="{{ $item->id }}">
                                    <label for="">{{ $item->name }} </label>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 mb-30">
                <div class="pd-20 card-box height-100-p">
                    <h4 class="mb-20 h4">Permissions to Delete</h4>
                    <ul class="list-group">
                        @foreach ($permissions as $item)
                            @php
                                $thisPermission = explode('-',$item->name);
                            @endphp
                            @if ($thisPermission[0] == 'delete')
                                <li class="list-group-item">
                                    <input type="checkbox" @if ($user->)
                                        
                                    @endif class="switch-btn" data-secondary-color="#f56767" data-color="#28a745" name="permission[]" value="{{ $item->id }}">
                                    <label for="">{{ $item->name }} </label>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('backend/src/plugins/switchery/switchery.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            var elems = Array.prototype.slice.call(document.querySelectorAll('.switch-btn'));
            $('.switch-btn').each(function() {
                new Switchery($(this)[0], $(this).data());
            });
        });
    </script>
@endpush