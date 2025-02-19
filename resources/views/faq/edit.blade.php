<x-layout>
    <div class="box">
        <form action="{{ route('faq.update', ['faq' => $faq] )}}" method="POST">
            @csrf
            @method('PUT')
            <h1 class="title is-3" style="text-align: center; margin-top: 0"> Write your FAQ</h1>
            <div class="icon-text has-text-info">
                <div class="icon">
                    <i class="fas fa-info-circle"></i>
                </div>
                <p style="text-indent: 0">Please fill out all fields and click 'Submit'</p>
            </div>
            <br>
            {{-- Here are all the form fields --}}
            <div class="field">
                <label for="question" class="label">Question</label>
                <div class="control">
                    <input type="text" name="question" class="input" autofocus
                           value="{{old('question', $faq->question)}}"
                    >
                </div>
                @error('question')
                <p class="help is-danger" style="text-indent:0">Question field is required.</p>
                @enderror
                <div class="field">
                    <label for="answer" class="label">Answer</label>
                    <div class="control">
                        <textarea name="answer" class="textarea" rows="5">
                            {{old('answer', $faq->answer)}}
                        </textarea>
                    </div>
                    @error('answer')
                    <p class="help is-danger" style="text-indent:0">Answer field is required.</p>
                    @enderror
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button type="submit" class="button is-primary">Submit</button>
                    </div>
                    <div class="control">
                        <a href="{{ route('faq.index') }}" class="button is-light">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-layout>
