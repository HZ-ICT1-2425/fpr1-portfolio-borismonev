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
                                <time>{{$article->updated_at->format('F j, Y h:i A')}}</time>
                            </div>
                        </div>
                        <div class="media-right">
                            <!-- Add unique data-target -->
                            <button class="delete js-modal-trigger"
                                    data-target="modal-delete-{{$article->id}}"></button>
                            <br>
                            <a href="{{ route('blog.edit', $article['uri']) }}">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                        </div>
                    </article>
                </div>
            </div>

            <!-- Confirmation of deletion modal with unique id -->
            <div id="modal-delete-{{$article->id}}" class="modal">
                <div class="modal-background"></div>
                <div class="modal-card">
                    <header class="modal-card-head">
                        <p class="modal-card-title" style="text-align: center; text-indent: 0">Are you sure you want to
                            delete this post? </p>
                    </header>
                    <footer class="modal-card-foot">
                        <div class="buttons">
                            <form action="{{ route('blog.delete', $article['uri']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="button is-danger">Delete</button>
                            </form>
                            <button class="button">Cancel</button>
                        </div>
                    </footer>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Functions to open and close a modal
            function openModal($el) {
                $el.classList.add('is-active');
            }

            function closeModal($el) {
                $el.classList.remove('is-active');
            }

            function closeAllModals() {
                (document.querySelectorAll('.modal') || []).forEach(($modal) => {
                    closeModal($modal);
                });
            }

            // Add a click event on buttons to open a specific modal
            (document.querySelectorAll('.js-modal-trigger') || []).forEach(($trigger) => {
                const modal = $trigger.dataset.target;
                const $target = document.getElementById(modal);

                $trigger.addEventListener('click', () => {
                    openModal($target);
                });
            });

            // Add a click event on various child elements to close the parent modal
            (document.querySelectorAll('.modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .button') || []).forEach(($close) => {
                const $target = $close.closest('.modal');

                $close.addEventListener('click', () => {
                    closeModal($target);
                });
            });

            // Add a keyboard event to close all modals
            document.addEventListener('keydown', (event) => {
                if (event.key === "Escape") {
                    closeAllModals();
                }
            });
        });
    </script>
</x-layout>
