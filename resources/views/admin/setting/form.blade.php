@extends('layouts.app')
{{-- post popup,recaptcha 15 sec verifacation --}}
@section('content')
    <div class="layout-container">
        <div class="content-wrapper">
            <h2>Add Setting</h2>
            {{-- @isset($getSetting)
                <div>
                    <a href="{{ route('edit.setting', [$getSetting->id]) }}"
                        class="btn btn-primary text-secondary font-weight-bold text-white"
                        style="float:right;margin:4px;">Edit</a>

                    <a href="{{ route('delete.setting', [$getSetting->id]) }}"
                        class="btn btn-danger text-secondary font-weight-bold text-white" style="float:right;margin:4px;"
                        onclick="return confirm('Are you sure want to delelte this master?')">Delete</a>
                </div>
            @endisset --}}
            <div class="container-xxl flex-grow-1 container-p-y">
                <!-- Basic Layout -->
                <div class="row">
                    <div class="col-xl">
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">

                            </div>
                            <div class="card-body">
                                <form
                                    action="@if (isset($getSetting)) {{ route('update.setting') }} @else {{ route('save.setting') }} @endif"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    @if (isset($getSetting))
                                        <input type="hidden" name="setting_id" value="{{ $getSetting->id }}">
                                    @endif
                                    <div class="mb-3">
                                        <label>Site Name</label>
                                        <input type="text" name="site_name" id="site_name" class="form-control"
                                            value="@if (isset($getSetting) && isset($getSetting->site_name)) {{ $getSetting->site_name }} @endif">

                                        <span class="text-danger">
                                            @error('site_name')
                                                {{ $message }}
                                            @enderror
                                    </div>

                                    <div class="mb-3" style="width:80%;display:inline-flex">
                                        <a class="btn btn-square rounded-circle me-1" href=""><i
                                                class="fab fa-facebook-f"></i></a>
                                        <input type="text" name="facebook" class="form-control add_link" id="facebook"
                                            value="@if (isset($getSetting) && isset($getSetting->facebook)) {{ $getSetting->facebook }} @endif">
                                        <span class="text-danger">
                                            @error('facebook')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="mb-3" style="width:80%;display:inline-flex">
                                        <a class="btn btn-square rounded-circle me-1" href=""><i
                                                class='fab fa-instagram'></i></a>
                                        <input type="text" name="instagram" class="form-control add_link"
                                            id="instagram"
                                            value="@if (isset($getSetting) && isset($getSetting->instagram)) {{ $getSetting->instagram }} @endif">
                                        <span class="text-danger">
                                            @error('instagram')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="mb-3" style="width:80%;display:inline-flex">
                                        <a class="btn btn-square rounded-circle me-1" href="#"><i class="fab fa-twitter"></i></a>
                                        <input type="text" name="twitter" class="form-control add_link" id="twitter"
                                            value="@if (isset($getSetting) && isset($getSetting->twitter)) {{ $getSetting->twitter }} @endif">
                                        <span class="text-danger">
                                            @error('twitter')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    
                                    <div class="mb-3" style="width:80%;display:inline-flex">
                                        <a class="btn btn-square rounded-circle me-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                        <input type="text" name="linkedin" class="form-control add_link" id="linkedin"
                                            value="@if (isset($getSetting) && isset($getSetting->linkedin)) {{ $getSetting->linkedin }} @endif">
                                        <span class="text-danger">
                                            @error('linkedin')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>


                                    <!--<div class="mb-3" style="width:80%;display:inline-flex">-->
                                    <!--    <a class="btn btn-square rounded-circle me-1" href=""><i-->
                                    <!--            class='fab fa-youtube'></i></a>-->
                                    <!--    <input type="text" name="youtube" class="form-control add_link"-->
                                    <!--        id="youtube"-->
                                    <!--        value="@if (isset($getSetting) && isset($getSetting->youtube)) {{ $getSetting->youtube }} @endif">-->

                                    <!--</div>-->
                                     <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea 
                            name="footer_content" 
                            class="form-control ckeditor" 
                            id="footer_content" 
                            rows="3">{{ old('footer_content', $getSetting->footer_content ?? '') }}</textarea>
                    </div>

                                    <div class="mb-3">
                                        <label>Logo</label>
                                        @if (isset($getSetting) && isset($getSetting->logo))
                                            <img src="{!! asset("public/images/{$getSetting->logo}") !!}" height="50" width="50">
                                        @endif
                                        <input type="file" name="logo" id="logo" class="form-control">
                                    </div>
                                    
                                 
                                    <input type="submit" class="btn btn-primary" value="Save">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.ckeditor').ckeditor();
            });
            $('#primary_color').colorpicker();
            $('#secondary_color').colorpicker();
        </script>

        <script>
            $('#site_name').keyup(function() {
                var replaceSpace = $(this).val();
                var lower = replaceSpace.toLowerCase();
                var result = lower.replace(/\s+/g, "-");
                var APP_URL = {!! json_encode(url('/')) !!}
                var concate = APP_URL.concat('/').concat(result);
                $("#site_url").val(concate);

            });
        </script>
    @endsection
