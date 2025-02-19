<x-layout>
    <h1>Frequently asked questions</h1>
    <br>
    <a href="{{ route('faq.create') }}" class="button is-rounded is-dark">Create a new FAQ</a>
    <hr>
    <div class="columns is-multiline is-mobile">
        @foreach($faqs as $faq)
            <div class="column is-full">
                <div class="box">
                    <article class="media">
                        <div class="media-content">
                            <span class="title is-4">{{$faq->question}}</span>
                            <div class="content">
                                <br>
                                <p>{{$faq->answer}}</p>
                                <br/>
                                <time>{{$faq->updated_at->format('F j, Y h:i A')}}</time>
                            </div>
                        </div>
                        <div class="media-right">
                            <!-- Add unique data-target -->
                            <button class="delete js-modal-trigger"
                                    data-target="modal-delete-{{$faq->id}}"></button>
                            <br>
                            <a href="{{ route('faq.edit', $faq['uri']) }}">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                        </div>
                    </article>
                </div>
            </div>
            <!-- Confirmation of deletion modal with unique id -->
            <div id="modal-delete-{{$faq->id}}" class="modal">
                <div class="modal-background"></div>
                <div class="modal-card">
                    <header class="modal-card-head">
                        <p class="modal-card-title" style="text-align: center; text-indent: 0">Are you sure you want
                            to
                            delete this FAQ? </p>
                    </header>
                    <footer class="modal-card-foot">
                        <div class="buttons">
                            <form action="{{ route('faq.delete', ['faq' => $faq]) }}" method="POST">
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
