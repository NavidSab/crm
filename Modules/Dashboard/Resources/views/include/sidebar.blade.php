<nav id="sidebar" class="active">
    <div class="sidebar-header">
        <img
            src="assets/img/bootstraper-logo.png"
            alt="bootraper logo"
            class="app-logo"></div>
        <ul class="list-unstyled components text-secondary">
            <li>
                <a href="{{url('/')}}">
                    <i class="fas fa-home"></i>Home</a>
            </li>
            <li>
                <a href="{{route('filemanager')}}">
                    <i class="fas fa-file-alt"></i>
                    FileManager</a>
            </li>
            <li>
                <a href="{{route('user')}}">
                    <i class="fas fa-user"></i>
                    User</a>
            </li>
            <li>
                <a href="{{route('rolepermission')}}">
                    <i class="fas fa-users"></i>
                    Role</a>
            </li>
            <li>
                <a href="{{route('menu')}}">
                    <i class="fas fa-list"></i>
                    Menu</a>
            </li>
        </ul>
        <nav id="mainnav" class="mainnav">
            @if($public_menu)
            <ul class="menu">
                @foreach($public_menu as $menu)
                <li class="">
                    <a href="{{ $menu['link'] }}" title="">{{ $menu['label'] }}</a>
                    @if( $menu['child'] )
                    <ul class="sub-menu">
                        @foreach( $menu['child'] as $child )
                        <li class="">
                            <a href="{{ $child['link'] }}" title="">{{ $child['label'] }}</a>
                        </li>
                        @endforeach
                    </ul>
                    <!-- /.sub-menu -->
                    @endif
                </li>
                @endforeach @endif
            </ul>
            <!-- /.menu -->
        </nav>