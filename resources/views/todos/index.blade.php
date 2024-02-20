<x-app-layout>
    @section('styles')
        <style>
            #outer {
                width: auto;
                text-align: center;
            }

            .inner {
                display: inline-block;
            }
        </style>
    @endsection

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
                <div class="p-6 text-gray-900">
                    @if (Session::has('alert-success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('alert-success') }}
                        </div>
                    @endif

                    @if (session()->has('alert-info'))
                        <div class="alert alert-info">
                            {{ session()->get('alert-info') }}
                        </div>
                    @endif


                    @if (Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    <div class="p-2 text-gray-900 d-flex justify-content-between align-items-center">
                        <h2 class="heading">Todo's</h2>
                        <a href="{{ route('todos.create') }}" class="btn btn-primary mb-3" style="margin-right: 70px; float: right;">Create</a>
                    </div>

                    {{-- <a href="{{ route('todos.create') }}" class="btn btn-primary mb-3" style="margin-right: 80px; float: right;">Create</a> --}}

                    @if (count($todos) > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Completed</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($todos as $todo)
                                    <tr>
                                        <td>{{ $todo->title }}</td>
                                        <td>{{ $todo->description }}</td>
                                        <td>
                                            @if ($todo->is_completed == 1)
                                                <a class="btn btn-sm btn-success" href="">completed</a>
                                            @else
                                                <a class="btn btn-sm btn-danger" href="">incomplete</a>
                                            @endif
                                        </td>
                                        <td id="outer">
                                            <a class="inner btn btn-sm btn-success"
                                                href="{{ route('todos.show', $todo->id) }}">View</a>
                                            <a class="inner btn btn-sm btn-info"
                                                href="{{ route('todos.edit', $todo->id) }}">Edit</a>
                                            <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" class="inner">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="todo_id" value="{{ $todo->id }}" />
                                                {{-- <input type="submit" class="btn btn-sm btn-danger" value="delete" /> --}}
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this todo?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h4>No Todo's created yet.</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
