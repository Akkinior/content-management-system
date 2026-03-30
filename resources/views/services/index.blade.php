<x-layout>
    <x-slot name="title">
        Services Management
    </x-slot>

    <style>

    </style>

    <div class="users-container">
        <div class="page-header">
            <h1 style="color:black;">Services Management</h1>
            <a href="{{ route('services.create') }}" class="btn btn-primary">+ Add New Service</a>
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

        @if($services->count() > 0)
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Text Button</th>
                            <th>Button Link</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                            <tr>
                                <td>#{{ $service->id }}</td>
                                <td>{{ $service->name }}</td>
                                <td>{{ $service->description }}</td>
                                <td>{{ $service->buttonText }}</td>
                                <td>{{ $service->buttonRoute }}</td>
                                <td>
                                    @if($service->image)
                                        <img src="data:image/jpeg;base64,{{ $service->image }}" alt="Service Image" style="max-width: 200px; height: auto;">
                                    @else
                                        <p>No image available</p>
                                    @endif
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('services.show', $service->id) }}" class="btn-sm-info">View</a>
                                        <a href="{{ route('services.edit', $service->id) }}" class="btn-sm-edit">Edit</a>
                                        <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display: inline;">
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
                {{ $services->links() }}
            </div>
        @else
            <div class="table-container">
                <div class="empty-state">
                    <p style="color:black;">No services found.</p>
                    <a href="{{ route('services.create') }}" class="btn btn-primary">Create First Service</a>
                </div>
            </div>
        @endif
    </div>

</x-layout>
