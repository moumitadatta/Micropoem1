<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="index.html">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Admin Pannel</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>

        @if(Auth::check())
        @if(Auth::user()->role === 'admin')

        <a href="{{route('categories.index')}}" class="logo d-flex align-items-center">
          
          Post Category
        </a>
        @elseif(Auth::user()->role === 'manager')

        <a href="{{route('categories.index')}}" class="logo d-flex align-items-center">
          
         Post Category
        </a>

        @endif
        @endif
        
      </li>

      <li>

        @if(Auth::check())
        @if(Auth::user()->role === 'admin')

        <a href="{{route('sub-categories.index')}}" class="logo d-flex align-items-center">
          
          Post SubCategory
        </a>
        @elseif(Auth::user()->role === 'manager')

        <a href="{{route('sub-categories.index')}}" class="logo d-flex align-items-center">
          
         Post SubCategory
        </a>

        @endif
        @endif

      
        
      </li>

      <li>

        @if(Auth::check())
        @if(Auth::user()->role === 'admin')

        <a href="{{ route('post-background-images.index') }}" class="logo d-flex align-items-center">
          
        Background Image
        </a>
        @elseif(Auth::user()->role === 'manager')

        <a href="{{ route('post-background-images.index') }}" class="logo d-flex align-items-center">
          
        Background Image
        </a>

        @endif
        @endif

       
        
      </li>

      <li>

        @if(Auth::check())
        @if(Auth::user()->role === 'admin')

        <a href="{{ route('post-file-images.index') }}" class="logo d-flex align-items-center">
          
        Post File
        </a>
        @elseif(Auth::user()->role === 'manager')

        <a href="{{ route('post-file-images.index') }}" class="logo d-flex align-items-center">
          
        Post File
        </a>

        @endif
        @endif

       
        
      </li>
      <li>

          @if(Auth::check())
          @if(Auth::user()->role === 'admin')

          <a href="{{ route('posts.index') }}" class="logo d-flex align-items-center">
            
          Post
          </a>
          @elseif(Auth::user()->role === 'manager')

          <a href="{{ route('posts.index') }}" class="logo d-flex align-items-center">
            
          Post
          </a>

          @endif
          @endif



          </li>

    </ul>
  </li><!-- End Components Nav -->

  
</ul>

</aside><!-- End Sidebar-->