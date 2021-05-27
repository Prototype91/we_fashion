<nav>
    <ul>
        @if(Auth::check())
        @if($isAdmin)
        @if(Route::is('product.*') || Route::is('category.*'))
        <li class="logo-auth">WE FASHION</li>
        @else
        <li><a class="logo" href="{{url('/')}}">WE FASHION</a></li>
        @endif
        @else
        <li><a class="logo" href="{{url('/')}}">WE FASHION</a></li>
        @endif
        @if(Route::is('product.*') === false && Route::is('category.*') === false)
        <li><a href="{{url('/discount')}}">Soldes</a></li>
        @if(isset($categories))
        @forelse($categories as $id => $category)
        <li><a href="{{url('category', $id)}}">{{$category}}</a></li>
        @empty
        @endforelse
        @endif
        @endif
        @if($isAdmin)
        @if(Route::is('product.*') || Route::is('category.*'))
        <li><a href="{{url('/admin/product')}}">Produits</a></li>
        <li><a href="{{ route('category.index') }}">Catégories</a></li>
        @endif
        @if(Route::is('product.*') || Route::is('category.*'))
        <li><a href="/">Site</a></li>
        @else
        <li><a href="{{url('/admin/product')}}">Administration</a></li>
        @endif
        @endif
        <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();
            ">
                Déconnexion
            </a>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
        @else
        <li><a class="logo" href="{{url('/')}}">WE FASHION</a></li>
        <li><a href="{{url('/discount')}}">Soldes</a></li>
        @if(isset($categories))
        @forelse($categories as $id => $category)
        <li><a href="{{url('category', $id)}}">{{$category}}</a></li>
        @empty
        <li>Aucune catégorie pour l'instant</li>
        @endforelse
        @endif
        <li><a href="{{route('login')}}">Connexion</a></li>
        @endif
    </ul>
</nav>