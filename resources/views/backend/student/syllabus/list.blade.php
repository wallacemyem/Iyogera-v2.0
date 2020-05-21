@if(isset($syllabuses) && count($syllabuses))
    <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
        <thead class="thead-dark">
        <tr>
            <th>{{ translate('title') }}</th>
            <th>{{ translate('syllabus') }}</th>
            <th>{{ translate('subject') }}</th>
            <th>{{ translate('date_added') }}</th>
            
        </tr>
        </thead>
        <tbody>
        @foreach ($syllabuses as $syllabus)
            <tr>
                <td>{{ $syllabus->title }}</td>

                <td>
                    <a href="{{ asset('backend/files/syllabus/'.$syllabus->file) }}" class="btn btn-info" download ><i class="mdi mdi-cloud-download mr-1"></i> <span>{{ translate('download') }}</span></a>
                </td>
                <td>
                    {{ $syllabus->subject->name }}
                </td>
                <td>
                    {{ date('D, d-M-Y', strtotime($syllabus->created_at)) }}
                </td>
                
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <div style="text-align: center;">
            <img src="{{ asset('backend/images/no-data.png') }}" alt="" class="empty-box">
            <p>{{ translate('no_data_found') }}</p>
    </div>
@endif

