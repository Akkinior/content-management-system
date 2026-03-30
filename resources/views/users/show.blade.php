<x-layout>
    <x-slot name="title">
        View User
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

    <a href="{{ route('users.index') }}" class="back-link">← Back to Users</a>

    <div class="user-card">
        <h1>{{ $user->name }}</h1>

        <div class="info-group">
            <div class="info-label">User ID</div>
            <div class="info-value">#{{ $user->id }}</div>
        </div>

        <div class="info-group">
            <div class="info-label">Role</div>
            <div class="info-value">{{ $user->role ? $user->role->name : 'No Role Assigned' }}</div>
        </div>

        <div class="info-group">
            <div class="info-label">Member Since</div>
            <div class="info-value">{{ $user->created_at->format('F d, Y') }}</div>
        </div>

        <div class="info-group">
            <div class="info-label">Last Updated</div>
            <div class="info-value">{{ $user->updated_at->format('F d, Y') }}</div>
        </div>

        <div class="info-group">
            <div class="info-label">Role</div>
            <div class="info-value">
                {{ $user->role->name }}
            </div>
        </div>

        <div class="action-buttons">
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="flex: 1;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" style="width: 100%;" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>

</x-layout>
