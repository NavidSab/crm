<nav id="sidebar" class="active">
    <div class="sidebar-header">
        <img src="assets/img/bootstraper-logo.png" alt="bootraper logo" class="app-logo">
    </div>
    <ul class="list-unstyled components text-secondary">
        <li>
            <a href="{{url('/')}}"><i class="fas fa-home"></i>Home</a>
        </li>
         <li>
            <a href="{{route('filemanager')}}"><i class="fas fa-file-alt"></i> FileManager</a>
        </li>
        {{-- <li>
            <a href="{{route('upload')}}"><i class="fas fa-file-alt"></i> Menu</a>
        </li>
        <li>
            <a href="{{route('upload')}}"><i class="fas fa-file-alt"></i> Role</a>
        </li> --}} 
    </ul>
</nav>