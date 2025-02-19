<x-layout>
    <div class="box">
        <h1 class="title is-3">
            {{ $article->title }}
        </h1>
        <p class="subtitle is-6" style="text-indent: 0; text-align: center;">
            {{ $article->author }}
        </p>
        <div class="article-content" style="white-space: pre-wrap; text-indent: 2em; line-height: 1.5;">
            {{ $article->text }}
        </div>
        <p style="text-align: right; font-size: 0.9em; margin-top: 1em; text-indent: 0;">
            {{ $article->created_at->format('F j, Y') }}
            <a href="{{ route('blog.edit', $article['uri']) }}" style="margin-left: 0.5em; padding-left: 0;">
                <i class="fa-solid fa-pen"></i>
            </a>
        </p>
    </div>
</x-layout>
