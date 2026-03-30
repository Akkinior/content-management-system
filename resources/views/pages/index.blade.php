<x-layout>
    <x-slot name="title">
        Users Management
    </x-slot>

    <style>
        
    </style>

    <div class="users-container">
        <div class="page-header">
            <h1 style="color:black;">Pages Management</h1>
            <a href="{{ route('pages.create') }}" class="btn btn-primary">+ Add New Page</a>
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

        @if($pages->count() > 0)
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pages as $page)
                            <tr>
                                <td>#{{ $page->id }}</td>
                                <td>{{ $page->title }}</td>
                                <td>{{ $page->slug }}</td>
                                <td>{{ $page->status }}</td>
                                <td>{{ $page->created_at->format('M d, Y') }}</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('pages.show', $page->id) }}" class="btn-sm-info">View</a>
                                        <a href="{{ route('pages.edit', $page->id) }}" class="btn-sm-edit">Edit</a>
                                        <form action="{{ route('pages.destroy', $page->id) }}" method="POST" style="display: inline;">
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
                {{ $pages->links() }}
            </div>
        @else
            <div class="table-container">
                <div class="empty-state">
                    <p style="color:black;">No pages found.</p>
                    <a href="{{ route('pages.create') }}" class="btn btn-primary">Create First Page</a>
                </div>
            </div>
        @endif
    </div>

</x-layout>
