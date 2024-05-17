<!-- Partial: user_row.blade.php -->

<tr>
    <td>{{ $user->user_id }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->address }}</td>
    <td>{{ $user->phone }}</td>
    <td>{{ $user->usertype }}</td>
    <td>{{ $user->email }}</td>
    <td>
        <div class="btn-group" role="group">
            <button type="button" id="edit-btn" class="btn btn-primary btn-sm edit-btn" data-bs-toggle="modal"
                data-bs-target="#edit-modal" data-user-id="{{ $user->user_id }}"><i class="bx bx-edit"></i>
                Edit
            </button>
            <button type="button" id="delete-button" class="btn btn-danger btn-sm delete-btn"
                data-user-id="{{ $user->user_id }}"><i class="bx bx-trash-alt"></i>
                Delete</button>
        </div>
    </td>
</tr>
