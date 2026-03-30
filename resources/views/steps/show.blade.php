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

    <a href="{{ route('steps.index') }}" class="back-link">← Back to Management</a>

    <div class="user-card">
        <h1>{{ $step->name }}</h1>

        <div class="info-group">
            <div class="info-label">Step ID</div>
            <div class="info-value">#{{ $step->id }}</div>
        </div>

        <div class="info-group">
            <div class="info-label">Step Number</div>
            <div class="info-value">{{ $step->stepsNumber }}</div>
        </div>

        <div class="info-group">
            <div class="info-label">Step's Name</div>
            <div class="info-value">{{ $step->stepsName }}</div>
        </div>


        <div class="info-group">
            <div class="info-label">Service</div>
            <div class="info-value">{{ $step->service->name ?? 'No service linked' }}
            </div>
        </div>

        <div class="info-group">
            <div class="info-label">Description</div>
            <div class="info-value">{{ $step->stepsDescription}}</div>
        </div>


        <div class="info-group">
            <div class="info-label">Image</div>
            <div class="info-value">
                @if($step->stepsImage)
                    <img src="data:image/jpeg;base64,{{ $step->stepsImage }}" alt="Step Image" style="max-width: 200px; height: auto;">
                @else
                    <p>No image available</p>
                @endif
            </div>
        </div>




        <div class="action-buttons">
            <a href="{{ route('steps.edit', $step->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('steps.destroy', $step->id) }}" method="POST" style="flex: 1;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" style="width: 100%;" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>

</x-layout>
