@if (isset($students))
    @if (count($students) > 0)
       

<div class="row justify-content-md-center">
    <div class="col-md-4 mt-2">
        <div class="card text-white bg-secondary">
            <div class="card-body">
                <div class="toll-free-box text-center">
                    <h4> <i class="mdi mdi-border-left"></i> {{ translate('result_sheet_for') }}</h4>
                    <h5>{{ translate('class') }}: {{ $section->class->name }}</h5>
                    <h5>{{ translate('section') }}: {{ $section->name }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-primary">
    
            <div class="table-responsive-sm">
                <table id="basic-datatable" class="table table-striped dt-responsive" width="100%">
                    <thead class="thead-dark">
                        <tr>
                        @php
                            $hello = 0;
                        @endphp
                            <th rowspan="2" style="text-align: center;">Position</th>
                            
                            <th rowspan="2" style="text-align: center;">
                                Students <i class="em em-arrow_down" aria-role="presentation" aria-label="DOWNWARDS BLACK ARROW"></i> | Subjects <i class="em em-arrow_right" aria-role="presentation" aria-label="BLACK RIGHTWARDS ARROW"></i>
                            </th>
                        @foreach ($subject as $subname)
                            <th colspan="4" style="text-align: center;">
                                {{$subname->name}}
                            </th>
                        @endforeach   
                            <th rowspan="2" style="text-align: center;">Total</th>
                            
                            
                        </tr>
                        <tr>

                        @foreach ($subject as $key)
                            <th colspan="2">CA</th>
                            <th colspan="2">Ex</th>
                        @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)

                            @php
                                $positionh = \App\Result::where('student_id', $student->student->id)->where('class_id', $class_id)->where('section_id', $section_id)->where('exam_id', $exam_id)->where('session', $running_session)->where('school_id', $school_id)->orderBy('position', 'asc')->get();
                            @endphp

                    @foreach ($positionh as $position)
                    
                        <tr>
                            <td style="text-align: center;">
                                {{$position->position}}
                                
                            </td>
                            
                            <td style="text-align: left;">
                                {{$position->student_name}}
                            </td>
                        @foreach ($subject as $subjects)
                            @php
                                $marks = \App\Mark::where('subject_id', $subjects->id)->where('student_id', $student->student->id)->where('class_id', $class_id)->where('section_id', $section_id)->where('exam_id', $exam_id)->where('session', $running_session)->where('school_id', $school_id)->get();
                                
                            @endphp
                        @foreach ($marks as $mark)

                            <td colspan="2" style="text-align: center;">
                                @if ($mark->ca_total > 0) 
                                    {{$mark->ca_total}}
                                @else
                                     0
                                @endif
                            </td>
                            <td colspan="2" style="text-align: center;">
                                @if ($mark->theory > 0) 
                                    {{$mark->theory}}
                                @else
                                     0
                                @endif
                            </td> 
                            
                        @endforeach    
                        @endforeach 
                            @php
                                $markss = \App\Mark::where('student_id', $student->student->id)->where('class_id', $class_id)->where('section_id', $section_id)->where('exam_id', $exam_id)->where('session', $running_session)->where('school_id', $school_id)->sum('mark_total');
                                $sum = 0;
                            @endphp
                            <td style="text-align: center;">
                                @php
                                
                                    $total = $markss;
                                    $sum =  $sum + $total;
                                    
                                @endphp
                               @if ($sum > 0) 
                                    {{$sum}}
                                @else
                                     $hello;
                                @endif
                            </td>
                        
                        </tr>

                        @endforeach
                        @endforeach
                    </tbody>
                </table>
                <center>
                    <form method="POST" action=" {{ route('report.printa') }} " >
                        @csrf
                        <input type="hidden" name="exam_id" value="{{$exam_id}}">
                        <input type="hidden" name="session_id" value="{{$session_id}}">
                        <button type="submit" formtarget="_blank" class="btn btn-primary"><i class="mdi mdi-printer"></i> Print
                        </button>
                    </form>
                </center>
            </div>
        
</div>



    @else
        <div style="text-align: center;">
                <img src="{{ asset('backend/images/no-data.png') }}" alt="" class="empty-box">
                <p>{{ translate('no_data_found') }}</p>
        </div>
    @endif
@else
<div style="text-align: center;">
        <img src="{{ asset('backend/images/no-data.png') }}" alt="" class="empty-box">
        <p>{{ translate('no_data_found') }}</p>
</div>
@endif
