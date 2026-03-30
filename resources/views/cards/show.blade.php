<x-layout>
    <x-slot name="title">
        View Card
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

    <a href="{{ route('cards.index') }}" class="back-link">← Back to Card Management</a>

    <div class="user-card">
        <h1>{{ $card->name }}</h1>

        <div class="info-group">
            <div class="info-label">ID</div>
            <div class="info-value">#{{ $card->id }}</div>
        </div>

        <div class="info-group">
            <div class="info-label">Cards Name</div>
            <div class="info-value">{{ $card->name }}</div>
        </div>


        <div class="info-group">
            <div class="info-label">The service that is linked with this card</div>
            <div class="info-value">{{ $card->service->name ?? 'No service linked' }}</div>
        </div>

        <div class="info-group">
            <div class="info-label">Description</div>
            <div class="info-value">{{ $card->description}}</div>
        </div>


        <div class="action-buttons">
            <a href="{{ route('cards.edit', $card->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('cards.destroy', $card->id) }}" method="POST" style="flex: 1;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" style="width: 100%;" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>

</x-layout>
