<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Collection;
use Livewire\Component;

class Posts extends Component
{
    public int $on_page = 10;
    public Collection $posts;
    public bool $hasMorePosts = true;
    public int $totalLoaded = 0;

    public function mount(): void
    {
        $this->posts = collect();
        $this->loadPosts();
    }

    public function loadPosts(): void
    {
        $newPosts = $this->getNewPosts();
        $this->posts = $this->posts->merge($newPosts);
        $this->totalLoaded = $this->posts->count();
        $this->hasMorePosts = $newPosts->count() === $this->on_page;
    }

    protected function getNewPosts(): Collection
    {
        return Post::latest()
            ->skip($this->posts->count())
            ->take($this->on_page)
            ->get();
    }

    public function loadMore(): void
    {
        if ($this->hasMorePosts) {
            $this->loadPosts();
        }
    }
    
    public function render()
    {
        return view('livewire.posts', [
            'posts' => $this->posts,
            'totalLoaded' => $this->totalLoaded,
        ]);
    }
}
