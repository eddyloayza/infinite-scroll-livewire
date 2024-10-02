<div>
    @forelse($posts as $post)
    <div class="post">
        <h2>{{ $post->id }} - {{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
        <hr>
    </div>
    @empty
    <p>No hay publicaciones disponibles.</p>
    @endforelse

    @if($hasMorePosts)
    <button wire:click="loadMore" class="btn btn-primary">Cargar Más</button>
    <p>Total de publicaciones cargadas: {{ $totalLoaded }}</p>
    @else
    <p>No hay más publicaciones para cargar.</p>
    @endif


    {{-- <div x-data="{ loading: false }">
    @forelse($posts as $post)
    <div class="post">
        <h2>{{ $post->id }} - {{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
        <hr>
    </div>
    @empty
    <p>No hay publicaciones disponibles.</p>
    @endforelse

    @if(!$hasMorePosts)
    <p>No hay más publicaciones para cargar.</p>
    @else
  
    <p>Total de publicaciones cargadas: {{ $totalLoaded }}</p>
    @endif

    <div x-intersect.full="if (!loading && $wire.hasMorePosts) {
        loading = true;
        $wire.loadMore().then(() => loading = false);
    }" class="load-more-trigger" style="height: 1px;"></div>

    <div x-show="loading" class="spinner" style="display: none;">
        <p>Cargando...</p>
    </div>

    
</div --}}

</div>