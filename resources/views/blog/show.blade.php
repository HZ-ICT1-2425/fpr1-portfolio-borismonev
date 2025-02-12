<x-layout>
    <h1>
        {{ $article->title }}
    </h1>
    <div class="article-content" style="white-space: pre-wrap; text-indent: 2em; line-height: 1.5;">
        {{ $article->text }}
    </div>

</x-layout>
