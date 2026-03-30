<x-layout>
    <x-slot name="title">
        Edit Step
    </x-slot>

    <div class="form-container">
        <div class="form-header">
            <h1>Edit Step</h1>
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

        <form action="{{ route('steps.update', $step->id) }}" method="POST" enctype="multipart/x-www-form-urlencoded">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Step Name</label>
                <input
                    type="text"
                    id="stepsName"
                    name="stepsName"
                    value="{{ old('stepsName', $step->stepsName) }}"
                    placeholder="Enter step name"
                    required
                >
                @error('stepsName')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="number">Step Number</label>
                <input
                    type="number"
                    id="stepsNumber"
                    name="stepsNumber"
                    value="{{ old('stepsNumber', $step->stepsNumber) }}"
                    placeholder="Enter step number"
                >
                @error('stepsNumber')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <input
                    type="text"
                    id="stepsDescription"
                    name="stepsDescription"
                    value="{{ old('stepsDescription', $step->stepsDescription) }}"
                    placeholder="Enter description"
                    required
                >
                @error('stepsDescription')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Image</label>

                {{-- Preview: show existing image, or a blank preview once a new file is picked --}}
                @if($step->stepsImage)
                    <img
                        id="preview"
                        src="data:image/jpeg;base64,{{ $step->stepsImage }}"
                        style="max-width: 150px; height: auto; margin-bottom: 10px;"
                    >
                    <p>Upload a new image to replace the current one</p>
                @else
                    <img id="preview" src="" style="display:none; max-width: 150px; height: auto; margin-bottom: 10px;">
                @endif

                {{-- Visible file picker (not submitted, only used for JS encoding) --}}
                <input type="file" id="image" accept="image/*">

                {{-- Hidden input that actually carries the base64 string on submit --}}
                <input type="hidden" name="stepsImage" id="image_base64" value="{{ old('stepsImage', $step->stepsImage) }}">

                @error('stepsImage')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="serviceid">Service</label>
                <select id="serviceid" name="serviceid" required>
                    <option value="" disabled selected hidden>Select a service to be linked</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}" {{ old('serviceid', $step->serviceid) == $service->id ? 'selected' : '' }}>
                            {{ $service->name }}
                        </option>
                    @endforeach
                </select>
                @error('serviceid')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Update Step</button>
                <a href="{{ route('steps.index') }}" class="btn btn-secondary">Cancel</a>
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
