@php
    $books = App\Book::where(['school_id'=> school_id(), 'session' => get_settings('running_session')])->get();
@endphp
@if (sizeof($books) > 0)
    <div class="table-responsive-sm">
        <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
            <thead class="thead-dark">
            <tr>
                <th>{{ translate('book_name') }}</th>
                <th>{{ translate('author') }}</th>
                <th>{{ translate('copies') }}</th>
                <th>{{ translate('available_copies') }}</th>
                <th>{{ translate('option') }}</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->name }}</td>
                        <td>
                            {{ $book->author }}
                        </td>
                        <td>
                            {{ $book->copies }}
                        </td>
                        <td>
                            {{ $book->copies - count($book->book_issued) }}
                        </td>
                        <td>
                            <div class="btn-group mb-2">
                                <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('book.edit', $book->id) }}', '{{ translate('update_book') }}')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update Book info"> <i class="mdi mdi-wrench"></i> </button>
                                <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('book.destroy', $book->id) }}', showAllBooks )" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ translate('delete_book') }}"> <i class="mdi mdi-window-close"></i> </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> <!-- end table-responsive-->
@else
    <div style="text-align: center;">
            <img src="{{ asset('backend/images/empty_box.png') }}" alt="" class="empty-box">
            <p>{{ translate('no_data_found') }}</p>
    </div>
@endif
