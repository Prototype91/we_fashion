<nav>
    <ul>
        @if(Auth::check())
        <li class="logo-auth">WE FASHION</li>
        <li><a href="{{url('/')}}">Produits</a></li>
        <li><a href="{{url('/')}}">Catégories</a></li>
        <li class="back"><a href="{{url('/')}}">Retour</a></li>
        @else
        <li><a class="logo" href="{{url('/')}}">WE FASHION</a></li>
        <li><a href="{{url('/discount')}}">Soldes</a></li>
        @endif
        @if(isset($categories))
        @forelse($categories as $id => $category)
        <li><a href="{{url('category', $id)}}">{{$category === 'female' ? 'Femme' : 'Homme'}}</a></li>
        @empty
        <li>Aucune catégorie pour l'instant</li>
        @endforelse
        @endif
    </ul>
</nav>