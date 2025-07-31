<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .sidebar {
            min-height: 100vh;
            background-color: #343a40;
            color: white;
        }
        .sidebar a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            display: block;
            padding: 10px 15px;
            transition: all 0.3s;
        }
        .sidebar a:hover, .sidebar a.active {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
        }
        .content {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar p-0">
                <div class="p-3 mb-3 border-bottom">
                    <h4>Admin Panel</h4>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.courses.index') }}" class="{{ request()->routeIs('admin.courses*') ? 'active' : '' }}">
                            <i class="fas fa-book me-2"></i> Courses
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.users') }}" class="{{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                            <i class="fas fa-users me-2"></i> Users
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.enrollments') }}" class="{{ request()->routeIs('admin.enrollments*') ? 'active' : '' }}">
                            <i class="fas fa-user-graduate me-2"></i> Enrollments
                        </a>
                    </li>
                    <li class="nav-item mt-5">
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="fas fa-sign-out-alt me-2"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
            
            <!-- Main Content -->
            <div class="col-md-10 content">
                <div class="mb-4 d-flex justify-content-between align-items-center">
                    <h2>@yield('title')</h2>
                    <div>
                        <span class="me-3">Welcome, {{ Auth::guard('admin')->user()->name }}</span>
                        <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-sm" target="_blank">
                            <i class="fas fa-external-link-alt me-1"></i> View Site
                        </a>
                    </div>
                </div>
                
                @if(session('success'))
                    <div class="alert alert-success" id="success-alert">
                        {{ session('success') }}
                    </div>
                    <script>
                        setTimeout(function() {
                            var alert = document.getElementById('success-alert');
                            if (alert) {
                                alert.style.display = 'none';
                            }
                        }, 2000);
                    </script>
                @endif
                
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                
                @yield('content')
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>