<div class="job-filter">

    <form action="{{ route( 'job_listing' ) }}" method="GET">
        {{-- Job Title --}}    
        <div class="widget">
            <h2>Job Title</h2>
            <input
                type="text"
                name="title"
                class="form-control"
                placeholder="Search Titles ..."
                value="{{ $cols['job_title'] }}"
            />
        </div>

        {{-- Job Location --}}
        <div class="widget">
            <h2>Job Location</h2>
            <select name="location" class="form-control select2">
                <option value="">job location</option>
                @foreach ($job_locations as $item)
                    <option 
                        value="{{ $item->id }}"
                        @if( $cols['job_location_id'] == $item->id )
                            selected
                        @endif
                    >{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        
        {{-- Job Category --}}
        <div class="widget">
            <h2>Job Category</h2>
            <select name="category" class="form-control select2">
                <option value="">job category</option>
                @foreach ($job_categories as $item)
                    <option 
                        value="{{ $item->id }}"
                        @if( $cols['job_category_id'] == $item->id )
                            selected
                        @endif
                    >{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Job Type --}}
        <div class="widget">
            <h2>Job Type</h2>
            <select name="type" class="form-control select2">
                <option value="">job type</option>
                @foreach ($job_types as $item)
                    <option 
                        value="{{ $item->id }}"
                        @if( $cols['job_type_id'] == $item->id )
                            selected
                        @endif
                    >{{ $item->type }}</option>
                @endforeach
            </select>
        </div>

        {{-- Experience --}}
        <div class="widget">
            <h2>Experience</h2>
            <select name="experience" class="form-control select2">
                <option value="">job experience</option>
                @foreach ($experience as $item)
                    <option 
                        value="{{ $item->id }}"
                        @if( $cols['job_experience_id'] == $item->id )
                            selected
                        @endif
                    >{{ $item->experience }}</option>                
                @endforeach
            </select>
        </div>

        {{-- Salary range --}}    
        <div class="widget">
            <h2>Salary Range</h2>
            <select name="salary" class="form-control select2">
                <option value="">job salary</option>
                @foreach ($SalaryRange as $item)
                    <option 
                        value="{{ $item->id }}"
                        @if( $cols['job_salary_range_id'] == $item->id )
                            selected
                        @endif
                    >${{ $item->range }}</option>
                @endforeach
            </select>
        </div>

        {{-- Sex --}}    
        <div class="widget">
            <h2>Gender</h2>
            <select name="gender" class="form-control select2">
                <option value="">gender</option>
                <option value="1" @if( Request::get('gender') == 1 ) selected @endif>Male</option>
                <option value="2" @if( Request::get('gender') == 2 ) selected @endif>Female</option>
            </select>
        </div>

        <div class="filter-button">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i> Filter
            </button>
        </div>
    </form>

    @if( $ad->job_listing_ad_status !== 'hide' )
        <div class="advertisement">
            <a 
                href="{{ $ad->job_listing_ad_url }}"
            ><img src="{{ asset( 'uploads/job_ad/' . $ad->job_listing_ad ) }}" alt=""/>
            </a>
        </div>
    @endif
</div>