@php
    $book_issues = App\BookIssue::where(['school_id'=> school_id(), 'session' => get_settings('running_session')])->where('issue_date', '>=', $date_from)->where('issue_date', '<=', $date_to)->get();
@endphp
@if (sizeof($book_issues) > 0)
<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
        <thead class="thead-dark">
        <tr>
            <th>{{ translate('book_name') }}</th>
            <th>{{ translate('issue_date') }}</th>
            <th>{{ translate('student') }}</th>
            <th>{{ translate('class') }}</th>
            <th>{{ translate('status') }}</th>
            <th>{{ translate('option') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($book_issues as $book_issue)
            <tr>
                <td>{{ $book_issue->book->name }}</td>
                <td>
                    {{ date('D, d/M/Y', $book_issue->issue_date) }}
                </td>
                <td>
                    {{ $book_issue->student->user->name}} <br> <small style="font-size: 10px; color: #9E9E9E;">{{ translate('student_code') }}: {{ $book_issue->student->code }}</small>
                </td>
                <td>
                    {{ $book_issue->class->name }}
                </td>
                <td>
                    @if ($book_issue->status)
                        <i class="mdi mdi-circle text-success"></i> {{ translate('returned') }}
                    @else
                        <i class="mdi mdi-circle text-disable"></i> {{ translate('pending') }}
                    @endif
                </td>
                <td>
                    <div class="btn-group mb-2">
                        <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('book_issue.edit', $book_issue->id) }}', '{{ translate('update_book_issue_information') }}')" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ translate('update_book_issue_information') }}"> <i class="mdi mdi-wrench"></i> </button>

                        <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('book_issue.return', $book_issue->id) }}', showAllBookIssues )" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ translate('return_this_issued_book') }}"> <i class="mdi mdi-checkbox-marked-circle-outline"></i> </button>

                        <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('book_issue.destroy', $book_issue->id) }}', showAllBookIssues )" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ translate('delete_book_issue_info') }}"> <i class="mdi mdi-window-close"></i> </button>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <div style="text-align: center;">
            <img src="{{ asset('backend/images/empty_box.png') }}" alt="" class="empty-box">
            <p>{{ translate('no_data_found') }}</p>
    </div>
@endif
