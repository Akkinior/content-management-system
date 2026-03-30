<x-public>
    <x-slot name="title">
        {{ $page->title }}
    </x-slot>

    {{-- <style>
        .page-container {
            max-width: 800px;
            margin: 40px auto;
            background: white;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 30px;
        }

        .page-container h1 {
            margin: 0 0 20px 0;
            font-size: 2em;
            color: #333;
        }

        .page-content {
            color: #333;
            font-size: 1.1em;
            line-height: 1.6;
        }
    </style>  --}}

    <div class="page-container">
        <h1>{{ $page->title }}</h1>
        <div class="page-content">
            {!! $page->body !!}
        </div>
    </div>
</x-public>