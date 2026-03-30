<x-layout>
    <x-slot name="title">
        Create Card
    </x-slot>


    <div class="form-container">
        <div class="form-header">
            <h1>Adding Card</h1>
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

        <form action="{{ route('cards.store') }}" method="POST" enctype="multipart/x-www-form-urlencoded">
            @csrf

            <div class="form-group">
                <label for="name">Card Name</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Enter card name"
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
                <label for="serviceid">Service</label>
                <select id="serviceid" name="serviceid" required>
                    <option value="">Select a service</option>
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
                <button type="submit" class="btn btn-primary">Create Card</button>
                <a href="{{ route('cards.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</x-layout>
