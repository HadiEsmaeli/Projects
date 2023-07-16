<ul class="list-group list-group-flush">
    <li class="list-group-item {{ Request::is('candidate/dashboard') ? 'active' : '' }}">
        <a href="{{ route( 'candidate_dashboard' ) }}"
        >Dashboard</a>
    </li>
    <li class="list-group-item {{ Request::is('candidate/apply-list') ? 'active' : '' }}">
        <a href="{{ route( 'candidate_apply_list' ) }}"
        >Applied Jobs</a>
    </li>
    <li class="list-group-item {{ Request::is('candidate/bookmark-list') ? 'active' : '' }}">
        <a href="{{ route( 'candidate_bookmark_list' ) }}"
        >Bookmarked Jobs</a>
    </li>
    <li class="list-group-item {{ Request::is('candidate/education')||Request::is('candidate/education-add') ? 'active' : '' }}">
        <a href="{{ route( 'candidate_education' ) }}"
        >Education</a>
    </li>
    <li class="list-group-item {{ Request::is('candidate/skill')||Request::is('candidate/skill-add')||Request::is('candidate/skill-edit/*') ? 'active' : '' }}">
        <a href="{{ route( 'candidate_skill' ) }}">Skills</a>
    </li>
    <li class="list-group-item {{ Request::is('candidate/experience')||Request::is('candidate/experience-add')||Request::is('candidate/experience-edit/*') ? 'active' : '' }}">
        <a href="{{ route( 'candidate_experience' ) }}"
        >Work Experience</a>
    </li>
    <li class="list-group-item {{ Request::is('candidate/award')||Request::is('candidate/award-add')||Request::is('candidate/award-edit/*') ? 'active' : '' }}">
        <a href="{{ route( 'candidate_award' ) }}">Awards</a>
    </li>
    <li class="list-group-item {{ Request::is('candidate/edit-profile') ? 'active' : '' }}">
        <a href="{{ route( 'candidate_edit_profile' ) }}"
        >Edit Profile</a>
    </li>
    <li class="list-group-item {{ Request::is('candidate/reset-password') ? 'active' : '' }}">
        <a href="{{ route( 'candidate_reset_password' ) }}"
        >Reset Password</a>
    </li>
    <li class="list-group-item {{ Request::is('candidate/resume')||Request::is('candidate/resume-add')||Request::is('candidate/resume-edit/*') ? 'active' : '' }}">
        <a href="{{ route( 'candidate_resume' ) }}"
        >Resume Upload</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route( 'candidate_logout' ) }}">Logout</a>
    </li>
</ul>