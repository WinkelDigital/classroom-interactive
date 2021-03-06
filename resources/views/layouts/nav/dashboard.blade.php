<div id="navbarContent" class="collapse navbar-collapse">     
    <ul class="navbar-nav mr-md-auto">
        <li class="nav-item">
            <a class="nav-link" href="/dashboard">Launch</a>
        </li>
        @if(Auth::user()->user_level == 2)
        <li class="nav-item">
            <a class="nav-link" href="/quizzes">Quiz</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/topics">Topic</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/classrooms">Classroom</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/reports">Report</a>
        </li>
        @endif
        @if(Auth::user()->user_level < 2)
        <li class="nav-item">
            <a class="nav-link" href="/users">User</a>
        </li>
        @endif
    </ul> 
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name}}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/profile">Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ url('/logout') }}"
                   onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                    Logout
                </a>
                
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </li>
    </ul>
</div>
