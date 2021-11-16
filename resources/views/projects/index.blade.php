<table>
    <thead>
    <tr>
        <th>Name</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($projects as $project)
        <tr>
            <td>{{ $loop->iteration }}. {{ $project->name }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
