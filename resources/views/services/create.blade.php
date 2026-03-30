<x-layout>
    <x-slot name="title">
        Create Service
    </x-slot>


    <div class="form-container">
        <div class="form-header">
            <h1>Create New Services</h1>
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

        <form action="{{ route('services.store') }}" method="POST" enctype="multipart/x-www-form-urlencoded">
            @csrf

            <div class="form-group">
                <label for="name">Service Name</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
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
                    value="{{ old('description') }}"
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
                    value="{{ old('buttonText') }}"
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
                    value="{{ old('buttonRoute') }}"
                    placeholder="Enter Button Link"
                    required
                >
                @error('buttonRoute')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" accept="image/*">
                @error('image')
                    <div class="form-error">{{ $message }}</div>
                @enderror
                <input type="hidden" name="image" id="image_base64" value="{{ $service->image ?? '' }}">
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Create Services</button>
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
            document.getElementById('image_base64').value = e.target.result;

            // Live preview
            const preview = document.getElementById('preview');
            preview.src = e.target.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
    });
</script>

</x-layout>
