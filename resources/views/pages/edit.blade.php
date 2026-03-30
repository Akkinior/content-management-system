<x-layout>
    <x-slot name="title">
        Edit Page
    </x-slot>
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">

    <div class="form-container">
        <div class="form-header">
            <h1>Edit Page</h1>
        </div>

        @if($errors->any())
            <div class="error-list">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pages.update', $page->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Page Title</label>
                <input 
                    type="text" 
                    id="title" 
                    name="title" 
                    value="{{ old('title', $page->title) }}"
                    placeholder="Enter page title"
                    required
                >
                @error('title')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="body">Page Body</label>
                <div id="editor" style="height: 300px;"></div>
                <input type="hidden" name="body" id="body" style="display:none">
                @error('body')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Page Status</label>
                <select id="status" name="status" required>
                    <option value="draft" {{ old('status', $page->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status', $page->status) == 'published' ? 'selected' : '' }}>Published</option>
                </select>
                @error('status')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Update Page</button>
                <a href="{{ route('pages.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow'
        });

        quill.root.innerHTML = `{!! old('body', $page->body) !!}`;

        quill.on('text-change', function() {
        document.getElementById('body').value = quill.root.innerHTML;});
    </script>

</x-layout>
