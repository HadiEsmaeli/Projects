@extends('admin.layout.app')

@section('heading', 'Advertisment')

@section('main_content')

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route( 'admin_advertisment_update' ) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-3">
                            <label>Existing Job Listing Ad</label>
                            <div>
                                <img src="{{ asset( 'uploads/job_ad/' . $ad->job_listing_ad ) }}" alt="">
                            </div>
                        </div>

                        <div class="form-group mb-3 col-sm-2">
                            <label>Change Job Listing Ad</label>
                            <div>
                                <input type="url" name="job_listing_ad_url" class="form-control mb-3" value="{{ $ad->job_listing_ad_url }}">
                            </div>
                            <div>
                                <select name="job_listing_ad_status" class="form-control select2">
                                    <option
                                        value="show"
                                        @if( $ad->job_listing_ad_status == 'show' )
                                            selected
                                        @endif
                                    >Show</option>
                                    <option
                                        value="hide"
                                        @if( $ad->job_listing_ad_status == 'hide' )
                                            selected
                                        @endif
                                    >Hide</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group mb-3 col-sm-2">
                            <label>Change Job Listing Ad</label>
                            <div>
                                <input type="file" name="job_listing_ad" class="form-control">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Existing Company Listing Ad</label>
                            <div>
                                <img src="{{ asset( 'uploads/company/ad/' . $ad->company_listing_ad ) }}" alt="">
                            </div>
                        </div>

                        <div class="form-group mb-3 col-sm-2">
                            <label>Change Company Listing Ad</label>
                            <div>
                                <input type="url" name="company_listing_ad_url" class="form-control mb-3" value="{{ $ad->company_listing_ad_url }}">
                            </div>
                            
                            <div>
                                <select name="company_listing_ad_status" class="form-control select2">
                                    <option
                                        value="show"
                                        @if( $ad->company_listing_ad_status == 'show' )
                                            selected
                                        @endif
                                    >Show</option>
                                    <option
                                        value="hide"
                                        @if( $ad->company_listing_ad_status == 'hide' )
                                            selected
                                        @endif
                                    >Hide</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group mb-3 col-sm-2">
                            <label>Change Company Listing Ad</label>
                            <div>
                                <input type="file" name="company_listing_ad" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection