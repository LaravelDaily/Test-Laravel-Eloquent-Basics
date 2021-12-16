<table>
    <thead>
    <tr>
        <th>Name</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($projects as $key => $project)
        <tr>
            <td>{{ $key+1 }}. {{ $project->name }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
