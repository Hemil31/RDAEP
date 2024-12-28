<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <a href="{{ route('employees.create') }}" class="btn btn-warning btn-sm">Create Employee</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Gender</th>
                <th>Hobbies</th> <!-- Added Hobbies Column -->
                <th>Photo</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr >
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->last_name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->country_code }} {{ $employee->mobile }}</td>
                    <td>{{ $employee->gender instanceof App\GenderEnum ? $employee->gender->label() : App\GenderEnum::tryFrom($employee->gender)?->label() }}</td>
                    <td>
                        @if ($employee->hobbies && count($employee->hobbies) > 0)
                            <!-- Display hobbies as a comma-separated string -->
                            {{ implode(', ', collect($employee->hobbies)->map(fn($id) => App\HobbyEnum::tryFrom($id)?->label())->filter()->toArray()) }}
                        @else
                            No hobbies listed
                        @endif
                    </td>

                    <td>
                        @if ($employee->photo)
                            <img src="{{ asset('storage/photos' . $employee->photo) }}" alt="Photo">
                        @else
                            No photo
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('employees.edit', $employee->id) }}">Edit</a>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
