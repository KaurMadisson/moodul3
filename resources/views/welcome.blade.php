@extends('partials.layout')

@section('content')

<div class="container mx-auto">
    {{$articles->links()}}
    <div class="flex flex-row flex-wrap">
        @foreach($articles as $article)
        <div class="stat-desc">
        @if($article->meaty_burger) Meaty Burger, @endif
        @if($article->vegetarian_burger) Vegetarian Burger, @endif
        @if($article->vegan_burger) Vegan Burger @endif
    </div>
            <div class="basis-1/4 mb-4">
                <div class="card mx-3 bg-base-100 shadow-xl h-full">
                    @if($article->image)
                        <figure><img src="{{$article->image}}"/></figure>
                    @endif
                    <div class="card-body">
                        <h2 class="card-title">{{ $article->title }}</h2>
                        <p>{{ $article->snippet }}</p>
                        <!-- Display Spiciness Level -->
                        <div class="stat-desc"><b>T-shirt: </b>{{ $article->spiciness_level }}</div>
                        
                        <div class="stat">
                            <div class="stat-desc">{{ $article->user->name }}</div>
                            <div class="stat-desc">{{ $article->created_at->diffForHumans() }}</div>
                        </div>
                        
                            </form>
                            <a href="{{route('public.article', ['article' => $article])}}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection