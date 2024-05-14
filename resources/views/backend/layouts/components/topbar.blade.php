<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
        <div class="d-inline-block">
            <h6 class="mt-2 mb-1">Welcome, {{ auth()->user()->name }}</h6>
            <small><b>Last Login: </b>{{ App\Models\UserLogin::where('user_id', auth()->user()->id)->orderBy('timestamp', 'Desc')->skip(1)->first() ? date('d M Y h:i:s A', strtotime(App\Models\UserLogin::where('user_id', auth()->user()->id)->orderBy('timestamp', 'Desc')->skip(1)->first()->timestamp)) : 'First Time' }}</small>
        </div>
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="flag-icon flag-icon-gb mt-1" title="en"></i> <span class="ms-1 me-1 d-none d-md-inline-block">English</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="languageDropdown">
                    <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-gb" title="en" id="en"></i> <span class="ms-1"> English </span></a>
                </div>
			</li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="bell"></i>
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="notificationDropdown">
                    <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
                    </div>
                    <div class="p-1">
                        <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                            <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                                <i class="icon-sm text-white" data-feather="bell-off"></i>
                            </div>
                            <div class="flex-grow-1 me-2">
                                <h6>No New Notification</h6>
                            </div>	
                        </a>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="wd-30 ht-30 rounded-circle" src="{{ Storage::disk('profiles')->url('default.jpg') }}" alt="profile">
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                    <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                        <div class="mb-3">
                            <img class="wd-100 ht-100 rounded-circle" src="{{ Storage::disk('profiles')->url('default.jpg') }}" alt="">
                        </div>
                        <div class="text-center">
                            <p class="tx-16 fw-bolder">{{ auth()->user()->name }}</p>
                            <p class="tx-12 text-muted">{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                    <ul class="list-unstyled p-1">
                        <li class="dropdown-item py-2">
                            <a href="javascript:;" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="edit"></i>
                                <span>Edit Profile</span>
                            </a>
                        </li>
                        <a href="{{ url('logout') }}" class="text-body ms-0">
                            <li class="dropdown-item py-2">
                                <i class="me-2 icon-md text-danger" data-feather="log-out"></i>
                                <span class="text-danger">Log Out</span>
                            </li>
                        </a>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>