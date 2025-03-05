
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belalang Tourism</title>
    <link rel="stylesheet" href="{{asset('assets/compiled/css/app.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('assets/compiled/css/app-dark.css')}}"> -->
    <link rel="stylesheet" href="{{asset('assets/compiled/css/iconly.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- <link rel="stylesheet" href="{{asset('assets/extensions/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="{{asset('./assets/compiled/css/table-datatable.css')}}"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" /> -->
    <link rel="stylesheet" href="assets/extensions/simple-datatables/style.css" />
    <link rel="stylesheet" href="{{asset('./assets/compiled/css/table-datatable.css')}}" />
    <link rel="stylesheet" href="{{asset('./assets/compiled/css/app.css')}}" />
    <!-- <link rel="stylesheet" href="{{asset('./assets/compiled/css/app-dark.css')}}" /> -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.jpg') }}">
 
</head>

<body>    
    <script src="assets/static/js/initTheme.js"></script>
    <div id="app">
        <div id="sidebar">
            <div class="sidebar-wrapper active">
          <div class="sidebar-header position-relative">
              <div class="d-flex justify-content-between align-items-center">
                  <div class="logo d-inline-flex">
                      <a class="my-auto py-auto px-1" href="/"><h4 class="my-auto py-auto">Belalang Tourism</h4></a>
                    </div>
                  
            </div>
          </div>
          <div class="sidebar-menu">
            <ul class="menu">
              <li class="sidebar-title">Menu</li>
              <li class="sidebar-item {{ request()->routeIs('admin.index') ? 'active' : '' }} ">
                <a href="{{ route('admin.index') }}" class="sidebar-link">
                  <i style="width: 18px;" class="fa-solid fa-house"></i>
                  <span>Dashboard</span>
                </a>
              </li>
              <li class="sidebar-item {{ request()->routeIs('admin.destination.index') ? 'active' : '' }} ">
                <a href="{{ route('admin.destination.index') }}" class="sidebar-link">
                  <i style="width: 18px;" class="fa-solid fa-umbrella-beach"></i>
                  <span>Destination</span>
                </a>
              </li>
         
              <li class="sidebar-item {{ request()->routeIs('admin.category.index') ? 'active' : '' }} ">
                <a href="{{ route('admin.category.index') }}" class="sidebar-link">
                  <i style="width: 18px;" class="fa-solid fa-list"></i>
                  <span>Category</span>
                </a>
              </li>
              <li class="sidebar-item {{ request()->routeIs('admin.user.index') ? 'active' : '' }} ">
                <a href="{{ route('admin.user.index') }}" class="sidebar-link">
                  <i style="width: 18px;" class="fa-solid fa-users"></i>
                  <span>User</span>
                </a>
              </li>
              <li class="sidebar-item {{ request()->routeIs('admin.profile.index') ? 'active' : '' }} ">
                <a href="{{ route('admin.profile.index') }}" class="sidebar-link">
                  <i style="width: 18px;" class="fa-solid fa-user"></i>
                  <span>Profile</span>
                </a>
              </li>
              <li class="sidebar-item">
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class='sidebar-link  bg-transparent border border-0'>
                            <i style="width: 18px;" class="fa-solid fa-right-from-bracket" style="width: 18px;"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                  <a href="index.html" class="sidebar-link">
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div id="main">
        <header class="mb-3">
          <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
          </a>
        </header>

    
        <div class="page-content">
       
            @yield('content')

         
        </div>

        <footer>
          <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
              <p>2024 © Desa Belalang</p>
            </div>
            <div class="float-end">
              <p>
                Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span> by <a href="https://belalang-tourism.com">DESA BELALANG</a>
              </p>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- <script src="{{asset('assets/static/js/components/dark.js')}}"></script> -->
    <script src="{{asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>

    <script src="{{asset('assets/compiled/js/app.js')}}"></script>

    <!-- Need: Apexcharts -->
    <script src="{{asset('assets/extensions/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/static/js/pages/dashboard.js')}}"></script>
 

    
<!-- Need: Apexcharts -->
<script src="{{asset('assets/extensions/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/static/js/pages/dashboard.js')}}"></script>
<!-- jQuery (CDN) -->



</body>

</html>