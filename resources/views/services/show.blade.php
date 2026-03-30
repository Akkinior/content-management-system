<x-layout>
    <x-slot name="title">
        View Services
    </x-slot>

    <style>
        .user-card {
            max-width: 600px;
            margin: 20px auto;
            background: white;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 30px;
        }

        .user-card h1 {
            margin: 0 0 20px 0;
            font-size: 1.8em;
            color: #333;
        }

        .info-group {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e5e7eb;
        }

        .info-group:last-child {
            border-bottom: none;
        }

        .info-label {
            color: #666;
            font-size: 0.85em;
            text-transform: uppercase;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .info-value {
            color: #333;
            font-size: 1em;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #0066cc;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>

    <a href="{{ route('services.index') }}" class="back-link">← Back to Management</a>

    <div class="user-card">
        <h1>{{ $service->name }}</h1>

        <div class="info-group">
            <div class="info-label">Service ID</div>
            <div class="info-value">#{{ $service->id }}</div>
        </div>

        <div class="info-group">
            <div class="info-label">Description</div>
            <div class="info-value">{{ $service->description}}</div>
        </div>

        <div class="info-group">
            <div class="info-label">Text Button</div>
            <div class="info-value">{{ $service->buttonText }}</div>
        </div>

        <div class="info-group">
            <div class="info-label">Button Link</div>
            <div class="info-value">{{ $service->buttonRoute }}</div>
        </div>

        <div class="info-group">
            <div class="info-label">Image</div>
            <div class="info-value">
                @if($service->image)
                    <img src="data:image/jpeg;base64,{{ $service->image }}" alt="Service Image" style="max-width: 200px; height: auto;">
                @else
                    <p>No image available</p>
                @endif
            </div>
        </div>

        <div class="info-group">
            <div class="info-label">Cards that are linked with this service</div>
            <div class="info-value">
                @if($service->cards->isNotEmpty())
                    <ul>
                        @foreach($service->cards as $card)
                            <li>{{ $card->name }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>No cards linked to this service.</p>
                @endif
            </div>
        </div>

        <div class="info-group">
            <div class="info-label">Steps that are linked with this service</div>
            <div class="info-value">
                @if($service->steps->isNotEmpty())
                    <ul>
                        @foreach($service->steps as $step)
                            <li>{{ $step->stepsName }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>No steps linked to this service.</p>
                @endif
            </div>
        </div>


        <div class="action-buttons">
            <a href="{{ route('services.edit', $service->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="flex: 1;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" style="width: 100%;" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>

</x-layout>
