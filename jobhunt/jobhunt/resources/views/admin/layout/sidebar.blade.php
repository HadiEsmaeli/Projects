<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route( 'admin_home' ) }}">Admin Panel</a>
        </div>
        <ul class="sidebar-menu">

            <li class="{{ Request::is('admin/home') ? 'active' : '' }}">
                <a class="nav-link" data-bs-toggle="tooltip" data-bs-placement="right"
                    data-bs-title="Dashboard"
                    href="{{ route( 'admin_home' ) }}">
                    <i class="fas fa-hand-point-right"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="{{ Request::is('admin/settings') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_settings') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Settings">
                    <i class="fas fa-hand-point-right"></i> <span>Settings</span>
                </a>
            </li>

            <li class="nav-item dropdown {{ 
                Request::is('admin/home-page')
                ||Request::is('admin/faq-page')
                ||Request::is('admin/blog-page')
                ||Request::is('admin/term-page')
                ||Request::is('admin/privacy-page')
                ||Request::is('admin/contact-page')
                ||Request::is('admin/jobcategory-page')
                ||Request::is('admin/joblocation-page')
                ||Request::is('admin/pricing-page')
                ||Request::is('admin/other-page') ? 'active' : '' }}"
            >
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-hand-point-right"></i>
                    <span>Page Settings</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/home-page') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route( 'admin_home_page' ) }}">
                            <i class="fas fa-angle-right"></i> Home
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/faq-page') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route( 'admin_faq_page' ) }}">
                            <i class="fas fa-angle-right"></i> FAQ
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/blog-page') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route( 'admin_blog_page' ) }}">
                            <i class="fas fa-angle-right"></i> Blog
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/term-page') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route( 'admin_term_page' ) }}">
                            <i class="fas fa-angle-right"></i> Terms of Use
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/privacy-page') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route( 'admin_privacy_page' ) }}">
                            <i class="fas fa-angle-right"></i> Policy Privacy
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/contact-page') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route( 'admin_contact_page' ) }}">
                            <i class="fas fa-angle-right"></i> Contact
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/jobcategory-page') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route( 'admin_job_category_page' ) }}">
                            <i class="fas fa-angle-right"></i> Job Category
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/pricing-page') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route( 'admin_pricing_page' ) }}">
                            <i class="fas fa-angle-right"></i> Pricing
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/other-page') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route( 'admin_other_page' ) }}">
                            <i class="fas fa-angle-right"></i> Others
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown 
                {{ Request::is('admin/job-category/*')
                ||Request::is('admin/job-location/*')
                ||Request::is('admin/job-type/*')
                ||Request::is('admin/experience/*')
                ||Request::is('admin/salary/*') ? 'active' : '' }}"
            >
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-hand-point-right"></i>
                    <span>Job Section</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/job-category/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route( 'admin_job_category' ) }}">
                            <i class="fas fa-angle-right"></i> Job Category
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/job-location/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route( 'admin_job_location' ) }}">
                            <i class="fas fa-angle-right"></i> Job Location
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/job-type/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route( 'admin_job_type' ) }}">
                            <i class="fas fa-angle-right"></i> Job Type
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/experience/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route( 'admin_experience' ) }}">
                            <i class="fas fa-angle-right"></i> Experience
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/salary/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route( 'admin_salary' ) }}">
                            <i class="fas fa-angle-right"></i> Salary Range
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown 
                {{
                Request::is('admin/company-location/*')
                ||Request::is('admin/company-industry/*')
                ||Request::is('admin/company-found/*')
                ||Request::is('admin/company-size/*') ? 'active' : '' }}"
            >
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-hand-point-right"></i>
                    <span>Companies</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/company-location/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route( 'admin_company_location' ) }}">
                            <i class="fas fa-angle-right"></i> Locations
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/company-industry/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route( 'admin_company_industry' ) }}">
                            <i class="fas fa-angle-right"></i> Industry
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/company-found/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route( 'admin_company_found' ) }}">
                            <i class="fas fa-angle-right"></i> Found
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/company-size/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route( 'admin_company_size' ) }}">
                            <i class="fas fa-angle-right"></i> Size
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ Request::is('admin/subscriber/all-subscribers')||Request::is('admin/subscriber/subscribers-send-email') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Subscriber Section</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/subscriber/all-subscribers') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_all_subscribers') }}"><i class="fas fa-angle-right"></i> All Subscribers</a></li>
                    <li class="{{ Request::is('admin/subscriber/subscribers-send-email') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_subscribers_send_email') }}"><i class="fas fa-angle-right"></i> Send Email to Subscribers</a></li>
                </ul>
            </li>

            <li class={{ Request::is('admin/company/*') ? 'active' : '' }}>
                <a href="{{ route( 'admin_companies' ) }}" 
                    class="nav-link" 
                    data-bs-toggle="tooltip" 
                    data-bs-placement="right" 
                    data-bs-title="companies"
                >
                    <i class="fas fa-hand-point-right"></i> <span>Company Profile</span>
                </a>
            </li>

            <li class={{ Request::is('admin/candidate/*') ? 'active' : '' }}>
                <a href="{{ route( 'admin_candidates' ) }}" 
                    class="nav-link" 
                    data-bs-toggle="tooltip" 
                    data-bs-placement="right" 
                    data-bs-title="candidates"
                >
                    <i class="fas fa-hand-point-right"></i> <span>Candidate Profile</span>
                </a>
            </li>

            <li class={{ Request::is('admin/why-choose/*') ? 'active' : '' }}>
                <a href="{{ route( 'admin_why_choose' ) }}" 
                    class="nav-link" 
                    data-bs-toggle="tooltip" 
                    data-bs-placement="right" 
                    data-bs-title="Why Choose Items"
                >
                    <i class="fas fa-hand-point-right"></i> <span>Why Choose Items</span>
                </a>
            </li>

            <li class={{ Request::is('admin/testimonial/*') ? 'active' : '' }}>
                <a href="{{ route( 'admin_testimonial' ) }}" 
                    class="nav-link" data-bs-toggle="tooltip" 
                    data-bs-placement="right" 
                    data-bs-title="Testimonial"
                >
                    <i class="fas fa-hand-point-right"></i> <span>Testimonial</span>
                </a>
            </li>

            <li class={{ Request::is('admin/post/*') ? 'active' : '' }}>
                <a href="{{ route( 'admin_post' ) }}" 
                    class="nav-link" data-bs-toggle="tooltip" 
                    data-bs-placement="right" 
                    data-bs-title="Posts"
                >
                    <i class="fas fa-hand-point-right"></i> <span>Post</span>
                </a>
            </li>

            <li class={{ Request::is('admin/faq/*') ? 'active' : '' }}>
                <a href="{{ route( 'admin_faq' ) }}" 
                    class="nav-link" data-bs-toggle="tooltip" 
                    data-bs-placement="right" 
                    data-bs-title="FAQs"
                >
                    <i class="fas fa-hand-point-right"></i> <span>faq</span>
                </a>
            </li>

            <li class={{ Request::is('admin/pachage/*') ? 'active' : '' }}>
                <a href="{{ route( 'admin_package' ) }}" 
                    class="nav-link" data-bs-toggle="tooltip" 
                    data-bs-placement="right" 
                    data-bs-title="Packages"
                >
                    <i class="fas fa-hand-point-right"></i> <span>Packages</span>
                </a>
            </li>

            <li class={{ Request::is('admin/advertisment/*') ? 'active' : '' }}>
                <a href="{{ route( 'admin_advertisment' ) }}" 
                    class="nav-link" data-bs-toggle="tooltip" 
                    data-bs-placement="right" 
                    data-bs-title="Advertisment"
                >
                    <i class="fas fa-hand-point-right"></i> <span>Advertisment</span>
                </a>
            </li>

            <li class={{ Request::is('admin/banner') ? 'active' : '' }}>
                <a href="{{ route( 'admin_banner' ) }}" 
                    class="nav-link" data-bs-toggle="tooltip" 
                    data-bs-placement="right" 
                    data-bs-title="Banner"
                >
                    <i class="fas fa-hand-point-right"></i> <span>Banners</span>
                </a>
            </li>

        </ul>
    </aside>
</div>