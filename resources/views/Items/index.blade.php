@extends('base')

@section('content')

<div style="width: 900px;" class="container max-w-full mx-auto pt-4">
    <h1 class="text-4xl font-bold mb-4">Midterm Project</h1>

    <a href="/items/create" class="bg-blue-500 btn-info tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow my-4 btn-secondary">Add Post</a>


    <form action="" method="get">
        <a class="btn btn-info" href="{{ 'dashboard' }}">Dashboard</a>

        {{ csrf_field() }}


        <table class="table table-stripped">
            <thead>
                <th>Name:</th>
                <th>Description</th>
                <th>Pice</th>
                <th>Quantity</th>
                <th>Action</th>
            </thead>
            @foreach($items as $one)
            <tbody">
                <tr>
                    <td>{{ $one->name }}</td>
                    <td>{{ $one->desc }}</td>
                    <td>{{ $one->price }}</td>
                    <td>{{ $one->quantity }}</td>
                    <td>
                        <form method="POST" action="/items/{{ $one->id }}">
                            <a href="/items/{{ $one->id }}/edit" class="btn btn-info">Edit</a>

                            {{ csrf_field() }}
                            @method('DELETE')

                            <button class="btn btn-success">Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>

    </form>

</div>

@endsection
