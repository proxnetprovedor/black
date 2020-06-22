<div class="sidebar" data-color="purple" data-background-color="black" data-image="#">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo"><a href="#" class="simple-text logo-mini">{{ config('app.name', 'B-R') }}</a>
        <a href="#" class="simple-text logo-normal">{{ config('app.name') }}</a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{{ auth()->user()->tenant->logo() ?? '' }}" />
            </div>
            <div class="user-info">
                <a data-toggle="collapse" href="#collapseExample" class="username">
                    <span>
                        {{Auth::user()->name}} | {{ Str::limit(Auth::user()->tenant->name, 15, '...') }}
                        <b class="caret"></b>
                    </span>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('tenant.profile.show', auth()->user()->tenant_id)}}">
                                <span class="sidebar-mini"> MP </span>
                                <span class="sidebar-normal"> Meu Perfil </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> EP </span>
                                <span class="sidebar-normal"> Editar Perfil </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> S </span>
                                <span class="sidebar-normal"> Configurações </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            @can('users manage')
            <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
                <a class="nav-link" href="/home">
                    <i class="material-icons">dashboard</i>
                    <p> Dashboard </p>
                </a>
            </li>
            @endcan
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#formsExamples" aria-expanded="true">
                    <i class="material-icons">verified</i>
                    <p> Controle de Acesso
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if(Request::is('admin/plans') || 
                    Request::is('admin/profiles') ||
                    Request::is('admin/roles')) show @endif" id="formsExamples">

                    <ul class="nav">

                        <li class="nav-item {{ Request::is('admin/plans') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('plans.index') }}">
                                <span class="sidebar-mini"> PLA </span>
                                <span class="sidebar-normal"> Planos </span>
                            </a>
                        </li>

                        <li class="nav-item {{ Request::is('admin/profiles') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('profiles.index') }}">
                                <span class="sidebar-mini"> P.P </span>
                                <span class="sidebar-normal"> Perfil de acesso (provedores) </span>
                            </a>
                        </li>

                        <li class="nav-item {{ Request::is('admin/roles') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('roles.index') }}" aria-selected="true">
                                <span class="sidebar-mini"> P.U </span>
                                <span class="sidebar-normal"> Perfil de acesso (usuários) </span>
                            </a>
                        </li>


                    </ul>

                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#infra" aria-expanded="true">
                    <i class="material-icons">storage</i>
                    <p>Infraestrutura
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if( Request::is('tenant/*') ) show @else @endif" id="infra">

                    <ul class="nav">
                        <li class="nav-item {{ Request::is('tenant/dashboard') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('tenant.infra.dashboard') }}">
                                <span class="sidebar-mini">D</span>
                                <span class="sidebar-normal"> Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('tenant/servers') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('servers.index') }}">
                                <span class="sidebar-mini"> S </span>
                                <span class="sidebar-normal"> Servidores </span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('tenant/instalations') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('instalations.index') }}">
                                <span class="sidebar-mini"> S </span>
                                <span class="sidebar-normal"> Instalações </span>
                            </a>
                        </li>

                        <li class="nav-item {{ Request::is('tenant/ctos') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('ctos.index') }}">
                                <span class="sidebar-mini"> PP </span>
                                <span class="sidebar-normal"> CTO </span>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> PA </span>
                                <span class="sidebar-normal"> CEO </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> PA </span>
                                <span class="sidebar-normal"> Mapa de Rede </span>
                            </a>
                        </li>


                    </ul>

                </div>
            </li>
        </ul>
    </div>
</div>
@section('scripts_after_body')

<script>
    $(document).ready(function () {
        oldElment = []
       $('li .nav-item').each( (i, element) => {
           $(element).on('click', (e) => {
               oldElment.push( $(e.currentTarget) )
               $(e.currentTarget).addClass('active')

               if(oldElment[oldElment.length -2]){
                oldElment[oldElment.length -2].removeClass('active')
                $(e.currentTarget).addClass('active')
               }
           })
       })
    });
</script>
@endsection