<x-layout>
    <div class="box">
        <form action="{{ route('articles.update', ['article' => $article]) }}" method="POST">
            @csrf
            @method('PUT')
            <h1 class="title is-3" style="text-align: center; margin-top: 0"> Edit your article </h1>
            <div class="icon-text has-text-info">
                <div class="icon">
                    <i class="fas fa-info-circle"></i>
                </div>
                <p style="text-indent: 0">Please fill out all fields and click 'Submit'</p>
            </div>
            <br>
            {{-- Here are all the form fields --}}
            <div class="field">
                <label for="title" class="label">Title</label>
                <div class="control">
                    <input type="text" name="title" class="input"
                           @if(old('title') != null)
                               value="{{old('title')}}"
                           @else
                               value="{{$article->title}}"
                        @endif
                    >
                </div>
                @error('title')
                <p class="help is-danger" style="text-indent:0">Title field is required.</p>
                @enderror
            </div>

            <div class="field">
                <label for="author" class="label">Author</label>
                <div class="control">
                    <input type="text" name="author" class="input"
                           @if(old('author') != null)
                               value="{{old('author')}}"
                           @else
                               value="{{$article->author}}"
                        @endif
                    >
                </div>
                @error('author')
                <p class="help is-danger" style="text-indent:0">Author field is required.</p>
                @enderror
            </div>

            <div class="field">
                <label for="short_description" class="label">Short description</label>
                <div class="control">
                    <input type="text" name="short_description" class="input"
                           @if(old('short_description') != null)
                               value="{{old('short_description')}}"
                           @else
                               value="{{$article->short_description}}"
                        @endif>
                </div>
                @error('short_description')
                <p class="help is-danger" style="text-indent:0">Short description field is required.</p>
                @enderror
            </div>

            <div class="field">
                <label for="text" class="label">Content</label>
                <div class="control">
                    <textarea name="text" class="textarea" rows="5">
                        @if(old('text') != null)
                            {{ old('text') }}
                        @else
                            {{ $article->text }}
                        @endif
                    </textarea>
                </div>
                @error('text')
                <p class="help is-danger" style="text-indent:0">Content field is required.</p>
                @enderror
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button type="submit" class="button is-primary">Submit</button>
                </div>
                <div class="control">
                    <a href="{{ route('blog.index') }}" class="button is-light">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</x-layout>
