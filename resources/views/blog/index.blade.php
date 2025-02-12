<x-layout>
    <h1>
        Articles
    </h1>
    <br>

    <a href="{{ route('blog.create') }}" class="button is-rounded is-dark">Create a new article</a>
    <hr>
    <div class="columns is-multiline is-mobile">
        @foreach($articles as $article)
            <div class="column is-one-third">
                <div class="box">
                    <article class="media">
                        <div class="media-content">
                            <span class="title is-4">{{$article->title}}</span>
                            <br>
                            <span class="subtitle is-6">{{$article->author}}</span>
                            <div class="content">
                                <br>
                                <p>
                                    {{$article->short_description}}
                                    <a href="{{ route('blog.show', $article['uri']) }}"> <strong> Read
                                            more </strong></a>
                                </p>
                                <br/>
                                <time>{{$article->created_at}}</time>
                            </div>
                        </div>
                        <div class="media-right">
                            <form action="{{ route('blog.delete', $article['uri']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="delete"></button>
                            </form>
                        </div>
                    </article>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>
