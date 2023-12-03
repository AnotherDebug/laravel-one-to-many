@extends('layouts.admin')



@section('content')
    <div class="projectList ms-5 pt-5 pe-5">
        <h1 class="text-center">Projects List</h1>

        @if (session('error'))
            <div id="error-message" class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Project_name</th>
                    <th scope="col">Date_start</th>
                    {{-- <th scope="col">Description</th> --}}
                    <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->name }}</td>
                        <td>{{ date('d/m/Y', strtotime($project->date_start)) }}</td>
                        {{-- <td>{{ $project->description }}</td> --}}
                        <td class="d-flex">
                            <a class="btn btn-info me-1"
                            href="{{ route('admin.projects.show', $project) }}">
                            <i class="fa-solid fa-eye"></i>
                            </a>

                            <a class="btn btn-warning  me-1" href="{{ route('admin.projects.edit', $project) }}">
                                <i class="fa-solid fa-pencil"></i>
                            </a>

                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST"
                                onsubmit="return confirm('Sei sicuro di voler eliminare?')"> @csrf @method('DELETE') <button
                                    class="btn btn-danger"><i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{ $projects->links() }}
    </div>
@endsection


@section('title')
    | Projects List
@endsection
