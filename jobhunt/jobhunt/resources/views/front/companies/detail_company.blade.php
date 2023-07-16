@extends('front.layout.app')

@section('seo_meta_description'){{ $company->company_name }}@endsection
@section('seo_title'){{ $company->company_name }}@endsection

@section('main_content')
<div
    class="page-top page-top-job-single"
    style="background-image: url({{ asset( 'uploads/banners/' . $global_banner->banner_company_detail ) }})"
>
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 job job-single">
                <div class="item d-flex justify-content-start">
                    <div class="logo">
                        <img src="{{ asset( 'uploads/company/' . $company->company_logo ) }}" alt="" />
                    </div>
                    <div class="text">
                        <h3>{{ $company->company_name }}</h3>
                        <div class="detail-1 d-flex justify-content-start">
                            <div class="category">{{ $company->rCompanyIndustry->industry_name }}</div>
                            <div class="location">{{ $company->rCompanyLocation->location }}</div>
                            <div class="email">{{ $company->email }}</div>
                            @if( $company->phone != null )
                                <div class="phone">{{ $company->phone }}</div>
                            @endif
                        </div>
                        <div class="special">
                            <div class="type">{{ $company->r_company_count }} Open Positions</div>
                            @php
                                $c = 0;
                                $social = ['facebook', 'twitter', 'linkedin','instagram'];
                                foreach( $social as $i )
                                    if( $company->$i == null )
                                        $c++;
                            @endphp
                            @if( $c !== 4 )
                                <div class="social">
                                    <ul>
                                        @if( $company->facebook != null )
                                            <li>
                                                <a href="{{ $company->facebook }}"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                        @endif
                                        @if( $company->twitter != null )
                                            <li>
                                                <a href="{{ $company->twitter }}"><i class="fab fa-twitter"></i></a>
                                            </li>
                                        @endif
                                        @if( $company->linkedin != null )
                                            <li>
                                                <a href="{{ $company->linkedin }}"><i class="fab fa-linkedin-in"></i></a>
                                            </li>
                                        @endif
                                        @if( $company->instagram != null )
                                            <li>
                                                <a href="{{ $company->instagram }}"><i class="fab fa-instagram"></i></a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="job-result pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="left-item">
                    <h2>
                        <i class="fas fa-file-invoice"></i>
                        About Company
                    </h2>
                    <p>{!! $company->description !!}</p>
                </div>
                <div class="left-item">
                    <h2>
                        <i class="fas fa-file-invoice"></i>
                        Opening Hours
                    </h2>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Monday</td>
                                    <td>{{ $company->oh_mon }}</td>
                                </tr>
                                <tr>
                                    <td>Tuesday</td>
                                    <td>{{ $company->oh_tue }}</td>
                                </tr>
                                <tr>
                                    <td>Wednesday</td>
                                    <td>{{ $company->oh_wed }}</td>
                                </tr>
                                <tr>
                                    <td>Thursday</td>
                                    <td>{{ $company->oh_thu }}</td>
                                </tr>
                                <tr>
                                    <td>Friday</td>
                                    <td>{{ $company->oh_fri }}</td>
                                </tr>
                                <tr>
                                    <td>Saturday</td>
                                    <td>{{ $company->oh_sat }}</td>
                                </tr>
                                <tr>
                                    <td>Sunday</td>
                                    <td>{{ $company->oh_sun }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="left-item">
                    <h2>
                        <i class="fas fa-file-invoice"></i>
                        Photos
                    </h2>
                    @if( $photos !== NULL )
                        <div class="photo-all">
                            <div class="row">
                                @foreach( $photos as $item )
                                    <div class="col-md-6 col-lg-4">
                                        <div class="item">
                                            <a href="{{ asset( 'uploads/company/photos/' . $item->photo ) }}" class="magnific">
                                                <img src="{{ asset( 'uploads/company/photos/' . $item->photo ) }}" alt="">
                                                <div class="icon">
                                                    <i class="fas fa-plus"></i>
                                                </div>
                                                <div class="bg"></div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <span class="text-danger">No Photo Found.</span>
                    @endif
                </div>
                <div class="left-item">
                    <h2>
                        <i class="fas fa-file-invoice"></i>
                        Videos
                    </h2>
                    @if( $videos !== NULL )
                        <div class="video-all">
                            <div class="row">
                                @foreach( $videos as $item )
                                    <div class="col-md-6 col-lg-4">
                                        <div class="item">
                                            <a class="video-button" href="http://www.youtube.com/watch?v={{ $item->video_id }}">
                                                <img src="http://img.youtube.com/vi/{{ $item->video_id }}/0.jpg" alt="">
                                                <div class="icon">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="bg"></div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <span class="text-danger">No Video Found.</span>
                    @endif
                </div>

                <div class="left-item">
                    <h2>
                        <i class="fas fa-file-invoice"></i> Open Positions
                    </h2>
                    @foreach ($related_jobs as $item )
                        <div class="job related-job pt-0 pb-0">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="item d-flex justify-content-start">
                                            <div class="logo">
                                                <img src="{{ asset( 'uploads/company/' . $company->company_logo ) }}" alt="">
                                            </div>
                                            <div class="text">
                                                <h3>
                                                    <a href="job.html">{{ $item->title }}, Google</a>
                                                </h3>
                                                <div class="detail-1 d-flex justify-content-start">
                                                    <div class="category">{{ $item->rJobCategory->name }}</div>
                                                    <div class="location"></div>
                                                </div>
                                                <div class="detail-2 d-flex justify-content-start">
                                                    <div class="date">{{ $item->created_at->diffForHumans() }}</div>
                                                    <div class="budget">
                                                    @php
                                                        $str = $item->rJobSalary->range;
                                                        $pos = strpos($str, '-');
                                                        $realstr = '$' . substr($str, 0, $pos) . '-$' . substr($str, $pos+1);
                                                        echo $realstr;
                                                    @endphp
                                                    </div>
                                                    @if( $item->deadline <= date('Y-m-d') )
                                                        <div class="expired">
                                                            Expired
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="special d-flex justify-content-start">
                                                    @if( $item->is_featured == 1 )
                                                        <div class="featured">
                                                            Featured
                                                        </div>
                                                    @endif
                                                    <div class="type">{{ $item->rJobType->type }}</div>
                                                    @if( $item->is_urgent == 1 )
                                                        <div class="urgent">
                                                            Urgent
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="bookmark">
                                                    <a href=""><i class="fas fa-bookmark active"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="right-item">
                    <h2>
                        <i class="fas fa-file-invoice"></i>
                        Company Overview
                    </h2>
                    <div class="summary">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td><b> Contact Person:</b></td>
                                    <td>{{ $company->person_name }}</td>
                                </tr>
                                <tr>
                                    <td><b> Category:</b></td>
                                    <td>{{ $company->rCompanyIndustry->industry_name }}</td>
                                </tr>
                                <tr>
                                    <td><b>E-mail:</b></td>
                                    <td>{{ $company->email }}</td>
                                </tr>
                                <tr>
                                    <td><b>Phone:</b></td>
                                    <td>{{ $company->phone }}</td>
                                </tr>
                                <tr>
                                    <td><b>Address:</b></td>
                                    <td>
                                        {{ nl2br($company->address) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Country:</b></td>
                                    <td>{{ $company->rCompanyLocation->location }}</td>
                                </tr>
                                <tr>
                                    <td><b>Website:</b></td>
                                    <td>{{ $company->website }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Company Size:</b>
                                    </td>
                                    <td>{{ $company->rCompanySize->size }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Founded On:</b>
                                    </td>
                                    <td>{{ $company->founded_on }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                @if( $company->map_code != null )
                    <div class="right-item">
                        <h2>
                            <i class="fas fa-file-invoice"></i>
                            Location Map
                        </h2>
                        <div class="location-map">{!! $company->map_code !!}</div>
                    </div>
                @endif
                <div class="right-item">
                    <h2>
                        <i class="fas fa-file-invoice"></i>
                        Contact Company
                    </h2>
                    <div class="enquery-form">
                        <form action="{{ route( 'contact_mail', $company->id ) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input name="name" type="text"  class="form-control" placeholder="Full Name">
                            </div>
                            <div class="mb-3">
                                <input name="email" type="email" class="form-control" placeholder="Email Address">
                            </div>
                            <div class="mb-3">
                                <input name="phone" type="text" class="form-control" placeholder="Phone Number">
                            </div>
                            <div class="mb-3">
                                <textarea
                                    name="message"
                                    class="form-control h-150"
                                    rows="3"
                                    placeholder="Message"
                                ></textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection