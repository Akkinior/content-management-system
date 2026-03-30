<x-layout>
    <x-slot name="title">
        Users Management
    </x-slot>

    <style>
        
    </style>

    <div class="users-container">
        <div class="page-header">
            <h1 style="color:black;">Users Management</h1>
            <a href="{{ route('users.create') }}" class="btn btn-primary">+ Add New User</a>
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

        @if($users->count() > 0)
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Joined Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>#{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role ? $user->role->name : 'No Role' }}</td>
                                <td>{{ $user->created_at->format('M d, Y') }}</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('users.show', $user->id) }}" class="btn-sm-info">View</a>
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn-sm-edit">Edit</a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
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
                {{ $users->links() }}
            </div>
        @else
            <div class="table-container">
                <div class="empty-state">
                    <p style="color:black;">No users found.</p>
                    <a href="{{ route('users.create') }}" class="btn btn-primary">Create First User</a>
                </div>
            </div>
        @endif
    </div>

</x-layout>
