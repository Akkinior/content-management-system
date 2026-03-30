<x-layout>
    <x-slot name="title">
        Create Steps
    </x-slot>


    <div class="form-container">
        <div class="form-header">
            <h1>Create New Steps</h1>
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

        <form action="{{ route('steps.store') }}" method="POST" enctype="multipart/x-www-form-urlencoded">
            @csrf

            <div class="form-group">
                <label for="name">Step Name</label>
                <input
                    type="text"
                    id="stepsName"
                    name="stepsName"
                    value="{{ old('stepsName') }}"
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
                    value="{{ old('stepsNumber') }}"
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
                    value="{{ old('stepsDescription') }}"
                    placeholder="Enter description"
                    required
                >
                @error('stepsDescription')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="stepsImage" accept="image/*">
                @error('stepsImage')
                    <div class="form-error">{{ $message }}</div>
                @enderror
                <input type="hidden" name="stepsImage" id="image_base64" value="{{ $step->stepsImage ?? '' }}">
            </div>

            <div class="form-group">
                <label for="serviceid">Service</label>
                <select id="serviceid" name="serviceid" required>
                    <option value="" disabled selected hidden>Select a service to be linked</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}" {{ old('serviceid') == $service->id ? 'selected' : '' }}>
                            {{ $service->name }}
                        </option>
                    @endforeach
                </select>
                @error('serviceid')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Create Steps</button>
                <a href="{{ route('steps.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>

    <script>
    document.getElementById('stepsImage').addEventListener('change', function () {
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
