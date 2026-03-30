<x-layout>
    <x-slot name="title">
        Edit Service
    </x-slot>

    <div class="form-container">
        <div class="form-header">
            <h1>Edit Service</h1>
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

        <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/x-www-form-urlencoded">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Service Name</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $service->name) }}"
                    placeholder="Enter service name"
                    required
                >
                @error('name')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <input
                    type="text"
                    id="description"
                    name="description"
                    value="{{ old('description', $service->description) }}"
                    placeholder="Enter description"
                    required
                >
                @error('description')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="buttonText">Text Button</label>
                <input
                    type="text"
                    id="buttonText"
                    name="buttonText"
                    value="{{ old('buttonText', $service->buttonText) }}"
                    placeholder="Enter Text Button"
                    required
                >
                @error('buttonText')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="buttonRoute">Button Link</label>
                <input
                    type="buttonRoute"
                    id="buttonRoute"
                    name="buttonRoute"
                    value="{{ old('buttonRoute', $service->buttonRoute) }}"
                    placeholder="Enter Button Link"
                    required
                >
                @error('buttonRoute')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Image</label>

                {{-- Preview: show existing image, or a blank preview once a new file is picked --}}
                @if($service->image)
                    <img
                        id="preview"
                        src="data:image/jpeg;base64,{{ $service->image }}"
                        style="max-width: 150px; height: auto; margin-bottom: 10px;"
                    >
                    <p>Upload a new image to replace the current one</p>
                @else
                    <img id="preview" src="" style="display:none; max-width: 150px; height: auto; margin-bottom: 10px;">
                @endif

                {{-- Visible file picker (not submitted, only used for JS encoding) --}}
                <input type="file" id="image" accept="image/*">

                {{-- Hidden input that actually carries the base64 string on submit --}}
                <input type="hidden" name="image" id="image_base64" value="{{ old('image', $service->image) }}">

                @error('image')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Update Service</button>
                <a href="{{ route('services.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
    <script>
        document.getElementById('image').addEventListener('change', function () {
            const file = this.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function (e) {
                // Push base64 string into hidden input for form submission
                document.getElementById('image_base64').value = e.target.result;

                // Update the preview image live
                const preview = document.getElementById('preview');
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        });
    </script>
</x-layout>
