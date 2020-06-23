@php
    error_reporting(E_ALL ^ E_NOTICE);
@endphp
<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="index.html"><img class="main-logo" src="{{asset('template/img/logo/logo.png')}}" alt="" /></a>
            <strong><a href="index.html"><img src="{{asset('template/img/logo/logosn.png')}}" alt="" /></a></strong>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                        {{-- @foreach ($menus as $item) --}}
                            <li>
                                <a class="has-arrow" href="#" aria-expanded="false"><span class="{{$item->icon}}"></span> <span class="mini-click-non">{{$item->nombre}}</span></a>
                            </li>
                        {{-- @endforeach --}}
                        {{-- <li>
                            <a class="has-arrow" href="all-professors.html" aria-expanded="false"><span class="educate-icon educate-professor icon-wrap"></span> <span class="mini-click-non">Plantel</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Professors" href="all-professors.html"><span class="mini-sub-pro">Administrativo</span></a></li>
                                <li><a title="Add Professor" href="add-professor.html"><span class="mini-sub-pro">Docente</span></a></li>
                                <li><a title="Edit Professor" href="edit-professor.html"><span class="mini-sub-pro">Estudiante</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="all-courses.html" aria-expanded="false"><span class="educate-icon educate-student icon-wrap"></span> <span class="mini-click-non">Educación</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Courses" href="all-courses.html"><span class="mini-sub-pro">Cursos</span></a></li>
                                <li><a title="Add Courses" href="add-course.html"><span class="mini-sub-pro">Materias</span></a></li>
                                <li><a title="Courses Profile" href="course-info.html"><span class="mini-sub-pro">Actividades</span></a></li>
                                <!-- <li><a title="Product Payment" href="course-payment.html"><span class="mini-sub-pro">Courses Payment</span></a></li> -->
                            </ul>
                        </li> --}}

                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="educate-icon educate-form icon-wrap"></span> <span class="mini-click-non">Administración</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Library" href="{{url('/user')}}"><span class="mini-sub-pro">Usuarios {{$rol_usuario}}</span></a></li>
                                <li><a title="All Library" href="{{url('/privilegio')}}"><span class="mini-sub-pro">Privilegio</span></a></li>
                                <li><a title="All Library" href="{{url('/rol')}}"><span class="mini-sub-pro">Rol</span></a></li>
                                {{-- <li><a title="Add Library" href="add-library-assets.html"><span class="mini-sub-pro">Roles</span></a></li> --}}
                                {{-- <li><a title="Edit Library" href="edit-library-assets.html"><span class="mini-sub-pro">Privilegios</span></a></li> --}}
                            </ul>
                        </li>
                </ul>
            </nav>
        </div>
    </nav>
</div>
