@php
    use App\models\Training;
    use App\models\Trade;
    use App\models\Session;
    use App\models\Admin;
    use App\models\User;
    use App\models\Personal;
    $routeName = request()->route()->getName();
@endphp

<div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper" style="background-color: rgb(10, 102, 223)";>
            <div class="logo">
                <a href="{{route('admin.index')}}" class="simple-text">
                    <img src="{{ asset('img/DTALOGO.png') }}" alt="logo" class="logoImg">
                </a>
            </div>

            <ul class="nav">
            @can('viewAny', $admin?? new Admin())
                <li  @class(['active' => str_contains($routeName, 'admin.index')])>
                    <a href="{{route('admin.index')}}">
                        <i class="ti-dashboard"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
            @endcan
            @can('viewAny', $user?? new User())
                <li  @class(['active' => str_contains($routeName, 'users')])>
                    <a href="{{route('admin.users.index')}}">
                        <i class="ti-user"></i>
                        <p>Users</p>
                    </a>
                </li>
            @endcan
            @can('viewAny', $trade?? new Trade())
            <li  @class(['active' => str_contains($routeName, 'user.trade')])>
                <a href="{{route('user.trade.index')}}">
                    <i class="ti-stats-up"></i>
                    <p>trades</p>
                </a>
            </li>
            @endcan
            @can('viewAny', $training?? new Training())
            <li @class(['active' => str_contains($routeName, 'training')])>
                <a href="{{ route('admin.training.index') }}">
                    <i class="ti-server"></i>
                    <p>Trainings</p>
                </a>
            </li>
            @endcan
                {{-- <li @class(['active' => str_starts_with($routeName, 'usertraining')])> --}}
            @can('viewAny', $session?? new Session())
                <li @class(['active' => str_contains($routeName, 'sessions')])>
                    <a href="{{ route('admin.sessions.index') }}">
                        <i class="ti-calendar"></i>
                        <p>sessions</p>
                    </a>
                </li>
            @endcan
            @can('viewAny', $personal?? new Personal())
                <li @class(['active' => str_contains($routeName, 'personal')])>
                    <a href="{{ route('admin.personal.index') }}">
                        <i class="ti-user"></i>
                        <p>Personnels</p>
                    </a>
                </li>
            @endcan
            </ul>
    	</div>
    </div>
