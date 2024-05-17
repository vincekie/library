<tr>
    <td>{{ $book->book_id }}</td>
    <td>{{ $book->title }}</td>
    <td>{{ $book->author }}</td>
    <td>{{ $book->book_number }}</td>
    <td>{{ $book->genre }}</td>
    <td>{{ $book->availability_status }}</td>
    <td>
        <div class="btn-group" role="group">
            <button type="button" id="edit-book-btn" class="btn btn-primary btn-sm edit-button" data-bs-toggle="modal"
                data-bs-target="#edit-book-modal" data-book-id="{{ $book->book_id }}"><i class="bx bx-edit"></i>
                Edit</button>
            <button type="button" class="btn btn-danger btn-sm delete-button" data-book-id="{{ $book->book_id }}"><i
                    class="bx bx-trash-alt"></i>
                Delete</button>
        </div>
    </td>
</tr>
