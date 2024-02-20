<x-app-layout>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    </head>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('todos.update', $todo->id) }}">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="todo_id" value="{{ $todo->id }}">
                    <div class="p-6 text-gray-900">
                        <h3 class="mb-3">{{ __('Edit Form') }}</h3>
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name='title' class="form-control" value="{{ $todo->title }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" cols="5" rows="5">{{ $todo->description }}</textarea>
                        </div>                        
                        <div class="mb-3">
                            <label for="">Status</label>
                            <select name="is_completed" class="form-control">
                                <option disabled selected>Select option</option>
                                <option value="1">Completed</option>
                                <option value="0">In Completed</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
