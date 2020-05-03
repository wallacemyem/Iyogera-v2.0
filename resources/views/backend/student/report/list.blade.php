@if (isset($allresult_data))
    @if (count($allresult_data) > 0)

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
                         
                            <th >CA</th>
                            <th >Exam</th>
                            <th>Total</th>
                        </tr>
                       
                    </thead>
                    <tbody>
                            
                    @php $markslist = explode(',',$key4->subjects);@endphp
                                @foreach($markslist as $mark)
                        <tr>
                            
                            <td>
                                {{$mark}}
                            </td>
                               
                        

                            <td>
                                
                            </td>
                            <td>
                                
                            </td> 
                            
                        
                            @php $markslists = explode(',',$key4->marks_string);@endphp
                                @foreach($markslists as $total)
                            <td>
                               {{$total}}
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <center>
                    <a href="#"
                        class="btn btn-primary">
                        print
                    </a>
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
