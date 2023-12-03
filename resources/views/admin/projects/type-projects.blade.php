@extends('layouts.admin')



@section('content')
    <div class="projectList ms-5 pt-5 pe-5">
        <h1 class="text-center">Type-Project List</h1>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Type</th>
                    <th scope="col">Projects in relation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                    <tr>
                        <td>{{ $type->id }}</td>
                        <td>{{ $type->name }}</td>
                        <td>
                            <ul class="list-group">
                                @foreach ($type->projects as $project)
                                <li class="list-group-item border-0 ">
                                    <a class=" text-decoration-none text-dark" href="{{ route('admin.projects.show', $project) }}">{{ $project?->name ?? '-'}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        {{-- {{ $projects->links() }} --}}
    </div>
@endsection


@section('title')
    | Type-Project List
@endsection
