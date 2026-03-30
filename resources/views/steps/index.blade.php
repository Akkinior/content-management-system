<x-layout>
    <x-slot name="title">
        Steps Management
    </x-slot>

    <style>

    </style>

    <div class="users-container">
        <div class="page-header">
            <h1 style="color:black;">Steps Management</h1>
            <a href="{{ route('steps.create') }}" class="btn btn-primary">+ Add New Step</a>
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

        @if($steps->count() > 0)
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Number</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($steps as $step)
                            <tr>
                                <td>#{{ $step->id }}</td>
                                <td>{{ $step->stepsName }}</td>
                                <td>{{ $step->stepsNumber }}</td>
                                <td>{{ $step->stepsDescription }}</td>
                                <td>
                                    @if($step->stepsImage)
                                        <img src="data:image/jpeg;base64,{{ $step->stepsImage }}" alt="Step Image" style="max-width: auto; height: 200px;">
                                    @else
                                        <p>No image available</p>
                                    @endif
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('steps.show', $step->id) }}" class="btn-sm-info">View</a>
                                        <a href="{{ route('steps.edit', $step->id) }}" class="btn-sm-edit">Edit</a>
                                        <form action="{{ route('steps.destroy', $step->id) }}" method="POST" style="display: inline;">
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
                {{ $steps->links() }}
            </div>
        @else
            <div class="table-container">
                <div class="empty-state">
                    <p style="color:black;">No steps found.</p>
                    <a href="{{ route('steps.create') }}" class="btn btn-primary">Create First Step</a>
                </div>
            </div>
        @endif
    </div>

</x-layout>
