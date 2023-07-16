@extends('front.layout.app')

@section('seo_meta_description')@endsection
@section('seo_title')@endsection

@section('main_content')
<div
    class="page-top"
    style="background-image: url({{ asset( 'uploads/banners/' . $global_banner->banner_company_panel ) }})"
>
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit profile</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content user-panel">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="card">
                    @include('company.sidebar')
                </div>
            </div>
            
            <div class="col-lg-9 col-md-12">
                <form action="{{ route( 'company_edit_profile_update' ) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="">Existing Logo</label>
                            <div class="form-group">
                                @if( Auth::guard('company')->user()->company_logo == '' )
                                    <img src="{{ asset( 'uploads/company/dafault-logo.png' ) }}" 
                                        alt="" class="logo">
                                @else
                                    <img src="{{ asset( 'uploads/company/' . Auth::guard('company')->user()->company_logo ) }}"
                                        alt="" class="logo">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Change Logo</label>
                            <div class="form-group">
                                <input type="file" name="logo" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Company Name *</label>
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="company_name"
                                    class="form-control"
                                    value="{{ Auth::guard('company')->user()->company_name }}"
                                />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Contact Person *</label>
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="person_name"
                                    class="form-control"
                                    value="{{ Auth::guard('company')->user()->person_name }}"
                                />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Username *</label>
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="username"
                                    class="form-control"
                                    value="{{ Auth::guard('company')->user()->username }}"
                                />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Email *</label>
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="email"
                                    class="form-control"
                                    value="{{ Auth::guard('company')->user()->email }}"
                                />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Phone *</label>
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="company_phone"
                                    class="form-control"
                                    value="{{ Auth::guard('company')->user()->phone }}"
                                />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Address *</label>
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="company_address"
                                    class="form-control"
                                    value="{{ Auth::guard('company')->user()->address }}"
                                />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Website</label>
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="company_website"
                                    class="form-control"
                                    value="{{ Auth::guard('company')->user()->website }}"
                                />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Location *</label>
                            <div class="form-group">
                                <select name="company_location" class="form-control select2">
                                    @foreach ($company_locations as $item)
                                        <option 
                                            value="{{ $item->id }}"
                                            @if( Auth::guard('company')->user()->company_location_id == $item->id )
                                                selected
                                            @endif
                                        >
                                        {{ $item->location }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Company Size *</label>
                            <div class="form-group">
                                <select name="company_size" class="form-control select2">
                                    @foreach ($company_size as $item)
                                        <option 
                                            value="{{ $item->id }}"
                                            @if( Auth::guard('company')->user()->company_size_id == $item->id )
                                                selected
                                            @endif
                                        >{{ $item->size }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="">Founded On *</label>
                            <div class="form-group">
                                <select name="company_found" class="form-control select2">
                                    @for( $i = 1900; $i <= date('Y'); $i++ )
                                        <option 
                                            value="{{ $i }}"
                                            @if( Auth::guard('company')->user()->founded_on == $i )
                                                selected
                                            @endif
                                        >{{ $i }}</option>                                        
                                    @endfor
                                </select>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Industry *</label>
                            <div class="form-group">
                                <select name="company_indastries" class="form-control select2">
                                    @foreach ($company_industries as $item)
                                        <option 
                                            value="{{ $item->id }}"
                                            @if( Auth::guard('company')->user()->company_industry_id == $item->id )
                                                selected
                                            @endif
                                        >{{ $item->industry_name }}</option>                                        
                                    @endforeach
                                </select>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="">About Company</label>
                            <textarea name="description" class="form-control editor" cols="30" rows="10"
                            >{{ Auth::guard('company')->user()->description }}</textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="">Opening Hour (Monday)</label>
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="oh_mon"
                                    class="form-control"
                                    value="{{ Auth::guard('company')->user()->oh_mon }}"
                                />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Opening Hour (Tuesday)</label>
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="oh_tue"
                                    class="form-control"
                                    value="{{ Auth::guard('company')->user()->oh_tue }}"
                                />
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for=""
                                >Opening Hour (Wednesday)</label
                            >
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="oh_wed"
                                    class="form-control"
                                    value="{{ Auth::guard('company')->user()->oh_wed }}"
                                />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for=""
                                >Opening Hour (Thursday)</label
                            >
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="oh_thu"
                                    class="form-control"
                                    value="{{ Auth::guard('company')->user()->oh_thu }}"
                                />
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="">Opening Hour (Friday)</label>
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="oh_fri"
                                    class="form-control"
                                    value="{{ Auth::guard('company')->user()->oh_fri }}"
                                />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for=""
                                >Opening Hour (Saturday)</label
                            >
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="oh_sat"
                                    class="form-control"
                                    value="{{ Auth::guard('company')->user()->oh_sat }}"
                                />
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="">Opening Hour (Sunday)</label>
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="oh_sun"
                                    class="form-control"
                                    value="{{ Auth::guard('company')->user()->oh_sun }}"
                                />
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for=""
                                >Location Map (Google Map Code)</label
                            >
                            <div class="form-group">
                                <textarea
                                    name="map_code"
                                    class="form-control h-150"
                                    cols="30"
                                    rows="10"
                                >{{ Auth::guard('company')->user()->map_code }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="">Facebook</label>
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="facebook"
                                    class="form-control"
                                    value="{{ Auth::guard('company')->user()->facebook }}"
                                />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Twitter</label>
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="twitter"
                                    class="form-control"
                                    value="{{ Auth::guard('company')->user()->twitter }}"
                                />
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="">Linkedin</label>
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="linkedin"
                                    class="form-control"
                                    value="{{ Auth::guard('company')->user()->linkedin }}"
                                />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Instagram</label>
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="instagram"
                                    class="form-control"
                                    value="{{ Auth::guard('company')->user()->instagram }}"
                                />
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <input
                                type="submit"
                                class="btn btn-primary"
                                value="Update"
                            />
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
@endsection