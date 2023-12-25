<?php
    $class = \App\Model\Classroom::join('members','members.classroom_id','=','classrooms.id')->where('members.user_id', \Auth::user()->id)->get();
?>
<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{route('home')}}">
          <i class="align-middle mr-2" data-feather="hexagon"></i> <span class="align-middle">Testify</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Menu
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{url('/')}}"><i class="align-middle" data-feather="home"></i> <span class="align-middle">Beranda</span></a>
            </li>
            @if(Auth::user()->role == 3)
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('tasklist')}}"><i class="align-middle" data-feather="list"></i> <span class="align-middle">Daftar Tugas</span></a>
            </li>
            @endif
            @if(Auth::user()->role == 1)
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('classroom.all')}}"><i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Kelas</span></a>
            </li>
            @else
            <li class="sidebar-item">
                <a href="#teach" data-toggle="collapse" class="sidebar-link collapsed show" aria-expanded="false">
                    <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Kelas</span>
                </a>
                <ul id="teach" class="sidebar-dropdown list-unstyled collapse show" data-parent="#sidebar">
                    @foreach($class as $key => $value)
                        <li class="sidebar-item"><a class="sidebar-link" href="{{route('classroom', [$value->code])}}">{{$value->name}}</a></li>
                    @endforeach     
                </ul>
            </li>
            @endif
            @if(Auth::user()->role == 1)
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('user')}}"><i class="align-middle" data-feather="users"></i> <span class="align-middle">Daftar Pengguna</span></a>
            </li>
            @endif
        </ul>
    </div>
</nav>