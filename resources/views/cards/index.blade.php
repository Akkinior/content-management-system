<x-layout>
    <x-slot name="title">
        Card Management
    </x-slot>

    <style>

    </style>

    <div class="users-container">
        <div class="page-header">
            <h1 style="color:black;">Card Management</h1>
            <a href="{{ route('cards.create') }}" class="btn btn-primary">+ Add New Card</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                <span>{{ session('success') }}</span>
                <button onclick="this.parentElement.style.display='none';" style="background: none; border: none; cursor: pointer; font-size: 1.2em;">×</button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">
                <span>{{ session('error') }}</span>
                <button onclick="this.parentElement.style.display='none';" style="background: none; border: none; cursor: pointer; font-size: 1.2em;">×</button>
            </div>
        @endif

        @if($cards->count() > 0)
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cards as $card)
                            <tr>
                                <td>#{{ $card->id }}</td>
                                <td>{{ $card->name }}</td>
                                <td>{{ $card->description }}</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('cards.show', $card->id) }}" class="btn-sm-info">View</a>
                                        <a href="{{ route('cards.edit', $card->id) }}" class="btn-sm-edit">Edit</a>
                                        <form action="{{ route('cards.destroy', $card->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-sm-delete" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pagination">
                {{ $cards->links() }}
            </div>
        @else
            <div class="table-container">
                <div class="empty-state">
                    <p style="color:black;">No cards found.</p>
                    <a href="{{ route('cards.create') }}" class="btn btn-primary">Create</a>
                </div>
            </div>
        @endif
    </div>

</x-layout>
