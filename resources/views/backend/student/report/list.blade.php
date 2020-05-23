@if (isset($allresult_data))
    @if (count($allresult_data) > 0)

    <div class="row justify-content-md-center">
    <div class="col-md-4 mt-2">
        <div class="card text-white bg-secondary">
            <div class="card-body">
                <div class="toll-free-box text-center">
                    <h4> <i class="mdi mdi-border-left"></i> {{ translate('result_sheet_for') }} {{ $key->user->name }}</h4>
                    <h5>{{ translate('position_in_class') }}: 
                        <?php
                        if ($position == 1){
                                echo '1st';
                            }elseif ($position == 2) {
                                echo '2nd';
                            }elseif ($position == 3) {
                                echo '3rd';
                                # code...
                            }else{
                                echo $position.'th';
                            }
                        ?> 
                        {{ translate('out_of') }} {{ $count_s }}</h5>
                    <h5>{{ translate('average') }}: {{ $key4->average }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Result Sheet</h3>
    </div>
    
            <div class="table-responsive-sm">
                <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="50%">
                    <thead class="thead-dark">
                        <tr>
                        @php
                            $hello = 0;
                        @endphp
                            
                            <th>
                                Subjects <i class="em em-arrow_down" aria-role="presentation" aria-label="BLACK RIGHTWARDS ARROW"></i>
                            </th>
                         
                            <th>Assignm</th>
                            <th>Test</th>
                            <th>Exam</th>
                            <th>Total</th>
                            <th>Grade</th>
                        </tr>
                       
                    </thead>
                    <tbody>
                            @foreach($result_students as $mark)
                        <tr>
                            
                            <td>
                                {{$mark->subject->name}}
                            </td>
                             
                            <td>
                               {{$mark->objectives}} 
                            </td>
                            <td>
                               {{$mark->practicals}} 
                            </td>
                            <td>
                               {{$mark->theory}} 
                            </td> 
                            
                            <td>
                               {{$mark->mark_total}}
                            </td>
                            <td>
                                @php
                                $mark_grade = \App\Grade::where([['mark_from', '<=', $mark->mark_total], ['mark_upto', '>=', $mark->mark_total]])->first();
                                @endphp
                               {{$mark_grade->name}}
                            </td>
                            
                        </tr>
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
