<div class="col-lg-3 col-md-12">
    <div class="job-filter">
        <form action="{{ route( 'companies' ) }}" method="GET">
            <div class="widget">
                <h2>Company Name</h2>
                <input
                    type="text"
                    name="company_name"
                    value="{{ old( 'company_name' ) }}"
                    class="form-control"
                    placeholder="Search Company Name ..."
                />
                <div class="clearfix"></div>
            </div>

            <div class="widget">
                <h2>Company Location</h2>
                <select name="company_location_id" class="form-control select2">
                    <option value="">company location</option>
                    @foreach ($location as $item)
                        <option 
                            value="{{ $item->id }}"
                            @if( $cols['company_location_id'] == $item->id )
                                selected
                            @endif
                        >{{ $item->location }}</option>                
                    @endforeach
                </select>
                <div class="clearfix"></div>
            </div>

            <div class="widget">
                <h2>Company Industry</h2>
                <select name="company_industry_id" class="form-control select2">
                    <option value="">company industry</option>
                    @foreach ($industry as $item)
                        <option 
                            value="{{ $item->id }}"
                            @if( $cols['company_industry_id'] == $item->id )
                                selected
                            @endif
                        >{{ $item->industry_name }}</option>
                    @endforeach
                </select>
                <div class="clearfix"></div>
            </div>

            <div class="widget">
                <h2>Company Size</h2>
                <select name="company_size_id" class="form-control select2">
                    <option value="">company size</option>
                    @foreach ($size as $item)
                        <option 
                            value="{{ $item->id }}"
                            @if( $cols['company_size_id'] == $item->id )
                                selected
                            @endif
                        >{{ $item->size }}</option>
                    @endforeach
                </select>
                <div class="clearfix"></div>
            </div>

            <div class="widget">
                <h2>Founded On</h2>
                <select name="founded_on" class="form-control select2">
                    <option value="">company found</option>
                    @foreach ($found as $item)
                        <option 
                            value="{{ $item->id }}"
                            @if( $cols['founded_on'] == $item->id )
                                selected
                            @endif
                        >{{ $item->found }}</option>
                    @endforeach
                </select>
                <div class="clearfix"></div>
            </div>

            <div class="filter-button">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-search"></i> Filter</button>
            </div>
        </form>
        @if( $ad->company_listing_ad_status !== 'hide' )
            <div class="advertisement">
                <a 
                    href="{{ $ad->company_listing_ad_url }}"
                ><img src="{{ asset( 'uploads/company/ad/' . $ad->company_listing_ad ) }}" alt=""/>
                </a>
            </div>
        @endif
    </div>
</div>