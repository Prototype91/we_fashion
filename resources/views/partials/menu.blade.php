<nav>
    <ul>
        <li><a class="logo" href="{{url('/')}}">WE FASHION</a></li>
        <li><a href="{{url('/discount')}}">Soldes</a></li>
        @forelse($categories as $id => $category)
        <li><a href="{{url('category', $id)}}">{{$category === 'female' ? 'Femme' : 'Homme'}}</a></li>
        @empty
        <li>Aucune catégorie pour l'instant</li>
        @endforelse
    </ul>
</nav>