@php
$school_id = school_id();
@endphp


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Result sheet for {{ strtoupper($key->user->other_name) }} {{ strtoupper($key->user->first_name) }} {{ strtoupper($key->user->middle_name) }}</title>
	<link href="{{ asset('backend/css/toast.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('backend/css/tble.css') }}" rel="stylesheet" type="text/css" />
  <link href='http://fonts.googleapis.com/css?family=Arizonia' rel='stylesheet' type='text/css'>


<style type="text/css">
body{font-family:"trebuchet MS"; font-size:14px;
height: 642px;
}

.signature{
  font: 'Arizonia', Helvetica, sans-serif;
  color: #2b2b2b;
  text-align: right;
  font-weight: 1em;

}

.rot{
/*-webkit-transform: rotate(270deg);
-moz-transform: rotate(270deg);
-o-transform: rotate(270deg);
display:block;
writing-mode: tb-rl;*/
font-size:9px;
}

#bod{
border:solid; border:1px solid #000;
}
</style>
<style type="text/css">
    table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
    thead { display:table-header-group }
    tfoot { display:table-footer-group }
</style>
</head>

<body>
<!--<table width="808"  height="1045"  align="center" cellpadding="0"  cellspacing="0" style="border-style:solid">-->
<table width="890"  align="center" cellpadding="0"  cellspacing="0" style="page-break-after: always;">
<thead>
   
  <tr>
    <td height="20" colspan="18" align="center" style="color:#CC3300"><strong>{{strtoupper($exam->name)}} RESULT FOR {{ strtoupper($key->user->other_name) }} {{ strtoupper($key->user->first_name) }} {{ strtoupper($key->user->middle_name) }}</strong></td>
  </tr>  
  <tr>
    <td height="93" colspan="2"  style="padding-left:8px;border:1px solid #000; border-right:0px; border-bottom:0px; padding-top:3px; padding-bottom:3px" align="left">
      <div style="float:left; padding-left:20px"><img src="{{ 'backend/images/'.$school_id.'.png' }}" alt="{{strtoupper($school->name)}}" width="114" height="101" />
      </div>
    </td>
    <td height="93" colspan="10"  style="padding-left:10px;border:1px solid #000; border-right:0px; border-left:0px; border-bottom:0px; padding-top:3px; padding-bottom:3px" align="center">
    <font style="border:1px solid #000; border-bottom:0px; border-top:0px; border-left:0px; border-right:0px;font-size:30px; font-weight:bold; float:left; padding-left:30px; padding-top:15px; text-align:center">
      <strong>{{strtoupper($school->name)}}</strong><br />
      <font style='font-size:14px'>{{strtoupper($school->address)}}<br />TERMLY CONTINUOUS ASSESSMENT DOSSIER FOR  SECONDARY SCHOOL</font>
    </font>
    </td>
      <td height="93" colspan="1"  style="padding-left:8px;border:1px solid #000; border-left:0px; border-bottom:0px; padding-top:3px; padding-bottom:3px" align="right">
    <div style="float:right; padding-left:20px"><img src="{{'backend/images/student_image/'.$key->profile_pix.'.jpg'}}" alt="{{ strtoupper($key->user->other_name) }} {{ strtoupper($key->user->first_name) }} {{ strtoupper($key->user->middle_name) }}" width="114" height="101" />
    </div>
  </td>
  
  </tr>     
  <tr>
    <td height="20"  colspan="13"  align="center" class="tbheadr" id="bod">STUDENT'S INFORMATION</td>
  </tr>
  <tr>
    <td height="22" colspan="5" id="bod">&nbsp;&nbsp;Name :&nbsp;&nbsp;<strong>{{ strtoupper($key->user->other_name) }} {{ strtoupper($key->user->first_name) }} {{ strtoupper($key->user->middle_name) }}</strong></td>
    <td colspan="3" id="bod">&nbsp;Class:&nbsp;<strong>{{$class_name}}{{$section_name}}</strong></td>    
    <td colspan="3" id="bod">&nbsp;No. in class:&nbsp;<strong>{{$count_s}}</strong></td>    
    <td colspan="2" id="bod">&nbsp;Next Term Begins:&nbsp;&nbsp;<strong></strong></td>                
  </tr>
  <tr>
    <td height="22"  colspan="5" id="bod">&nbsp;Student ID:&nbsp;&nbsp;<strong>{{$key->code}}</strong></td>
    <td id="bod" colspan="3">&nbsp;Attendance:&nbsp;&nbsp;<strong> </strong></td>
<td   colspan="3" id="bod">&nbsp;Days out of:&nbsp;&nbsp;&nbsp;<strong> </strong></td>
    <td id="bod" colspan="2">&nbsp;Year:&nbsp;&nbsp;<strong>{{$session_name->name}}</strong></td>
  </tr>
  <tr>
    <td height="20"  colspan="13"  align="center" class="tbheadr" id="bod">STUDENT'S TERMLY CONTINUOUS ASSESSMENT PERFORMANCE BREAKDOWN</td>
  </tr>
  </thead>
  <tbody>
  <tr>
    <td width="211" rowspan="2" align="center" id="bod" style="width:150px"><strong>'A'<br />
SUBJECTS</strong></td>
    <td colspan="3" align="center" id="bod" height="5"><span style="font-size:10px">SUMMARY OF C.A SCORE</span></td>
    <td width="43" align="center" id="bod" ><span class="rot">C.A.<br />
    TOTAL</span></td>
    <td width="43" align="center" id="bod"><span class="rot">EXAM<br />
SCORE</span></td>
    <td width="40" align="center" id="bod" style="padding:4px"><span class="rot">TERM<br />
TOTAL</span></td>
    <td width="44" align="center" id="bod" style="padding-left:2px;padding-right:2px"><span class="rot">CLASS AVERAGE</span></td>
    <td width="44" align="center" id="bod" style="padding:4px"><span class="rot">HIGHEST<br />
IN<br />
CLASS</span></td>
    <td width="39" align="center" id="bod"><span class="rot">LOWEST <br />
IN<br />
CLASS</span></td>
    <td width="45" align="center" id="bod"><span class="rot"><br />
<br />
</span></td>
    <td width="55" align="center" id="bod" style="padding:4px"><span class="rot">GRADE</span></td>
    <td rowspan="18" width="207" id="bod" align="center" style="padding:opx">
      <table width="100%" cellspacing="0" cellpadding="0">
        <tr>
          <td colspan="2" align="center" id="bod"><strong>'B'<br />
            AFFECTIVE<br />
          DEVELOPMENT</strong></td>
        </tr>
        <tr>
          <td width="104" align="center" id="bod"><font style="font-size:10px">CHARACTER<br />
          TRAITS</font></td>
          <td width="76" align="center" id="bod"><font style="font-size:10px">RATING<br />SCALE</font></td>
        </tr>
        <tr>
          <td id="bod">&nbsp;Attentiveness</td>
          <td id="bod" align="center"></td>
        </tr>
        <tr>
          <td id="bod">&nbsp;Attendance</td>
          <td id="bod" align="center"></td>
        </tr>
        <tr>
          <td id="bod">&nbsp;Punctuality</td>
          <td id="bod" align="center"></td>
        </tr>
        <tr>
          <td id="bod">&nbsp;Neatness</td>
          <td id="bod" align="center"></td>
        </tr>
        <tr>
          <td id="bod">&nbsp;Politeness</td>
          <td id="bod" align="center"></td>
        </tr>
        <tr>
          <td id="bod">&nbsp;Self Control</td>
          <td id="bod" align="center"></td>
        </tr>
        <tr>
          <td id="bod">&nbsp;Relationship with &nbsp;Others</td>
          <td id="bod" align="center"></td>
        </tr>
        <tr>
          <td id="bod">&nbsp;Curiosity</td>
          <td id="bod" align="center"></td>
        </tr>
        <tr>
          <td id="bod">&nbsp;Honesty</td>
          <td id="bod" align="center"></td>
        </tr>
        <tr>
          <td id="bod">&nbsp;Humility</td>
          <td id="bod" align="center"></td>
        </tr>
        <tr>
          <td id="bod">&nbsp;Tolerance</td>
          <td id="bod" align="center"></td>
        </tr>
        <tr>
          <td id="bod">&nbsp;Leadership</td>
          <td id="bod" align="center"></td>
        </tr>
        <tr>
          <td id="bod">&nbsp;Courage</td>
          <td id="bod" align="center"></td>
        </tr>
		<tr>
          <td colspan="2" align="center" id="bod"><strong>'C'<br />
            PSYCHOMOTOR<br />
          SKILLS</strong></td>
        </tr>        
        <tr>
          <td id="bod">&nbsp;Hand-writing</td>
          <td id="bod" align="center"></td>
        </tr> 
        <tr>
          <td id="bod">&nbsp;Fluency</td>
          <td id="bod" align="center"></td>
        </tr>        
        <tr>
          <td id="bod">&nbsp;Games/Sport</td>
          <td id="bod" align="center"></td>
        </tr>        
        <tr>
          <td id="bod">&nbsp;Gymnastics</td>
          <td id="bod" align="center"></td>
        </tr>        
        <tr>
          <td id="bod">&nbsp;Musical Skills</td>
          <td id="bod" align="center"></td>
        </tr>        
        <tr>
          <td id="bod">&nbsp;Construction</td>
          <td id="bod" align="center"></td>
        </tr>                               
        <tr>
          <td colspan="2"id="bod"><strong>&nbsp;&nbsp;&nbsp;KEY TO RATING</strong><br />
          &nbsp;&nbsp;&nbsp;5  = Excellent<br />&nbsp;&nbsp;&nbsp;4 = Very Good<br />&nbsp;&nbsp;&nbsp;3 = Good<br />&nbsp;&nbsp;&nbsp;2 = Fair<br />&nbsp;&nbsp;&nbsp;1 = Poor</td>          
        </tr>
        
    </table></td>
  </tr>
  
  <tr>
    <td width="38" height="20" align="center" id="bod"><br /></td>
    <td width="39" align="center" id="bod">ASS<br /></td>
    <td width="40" align="center" id="bod">TEST<br /></td>

    <td  align="center" id="bod">30%</td>
    <td align="center" id="bod">70%</td>
    <td id="bod" align="center">100%</td>
    <td id="bod">&nbsp;</td>
    <td id="bod">&nbsp;</td>
    <td id="bod">&nbsp;</td>
    <td id="bod">&nbsp;</td>
    <td id="bod">&nbsp;</td>
  </tr>
  @foreach($result_students as $mark)
  <tr height="25">
    <td height="22" id="bod">&nbsp;{{$mark->subject->name}}</td>
    <td id="bod" align="center"></td>
    <td id="bod" align="center">{{$mark->objectives}}</td>
    <td id="bod" align="center">{{$mark->practicals}}</td>
    <td id="bod" align="center">{{$mark->ca_total}}</td>
    <td id="bod" align="center">{{$mark->theory}}</td>
    <td id="bod" align="center">{{$mark->mark_total}}</td>
    <td id="bod" align="center" style="padding:4px">
      @php
    $result_avg = \App\Mark::where(['subject_id' => $mark->subject->id, 'section_id' => $section_id, 'exam_id' => $exam_id, 'class_id' => $class_id, 'session' => get_schools(), 'school_id' => school_id()])->avg('mark_total');
    @endphp
    {{number_format((float)$result_avg, 2, '.', '')}}
    </td>
    <td id="bod" align="center">
      @php
    $result_max = \App\Mark::where(['subject_id' => $mark->subject->id, 'section_id' => $section_id, 'exam_id' => $exam_id, 'class_id' => $class_id, 'session' => get_schools(), 'school_id' => school_id()])->max('mark_total');
    @endphp
    {{$result_max}}
    </td>
    <td id="bod" align="center">
    @php
    $result_min = \App\Mark::where(['subject_id' => $mark->subject->id, 'section_id' => $section_id, 'exam_id' => $exam_id, 'class_id' => $class_id, 'session' => get_schools(), 'school_id' => school_id()])->min('mark_total');
    @endphp
    {{$result_min}}
    </td>
    <td id="bod" align="center"></td>
    <td id="bod" align="center" > 
        @php
        $mark_grade = \App\Grade::where([['mark_from', '<=', $mark->mark_total], ['mark_upto', '>=', $mark->mark_total]])->first();
        @endphp
       {{$mark_grade->name}}
     </td>
  </tr>
  @endforeach
  
  <tr height="25">
    <td height="20" id="bod">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>

    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
  </tr>

  <tr height="25">
    <td height="20" id="bod">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>

    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
  </tr>

  <tr height="25">
    <td height="20" id="bod">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>

    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
  </tr>

  <tr height="25">
    <td height="20" id="bod">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>

    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
  </tr>

  <tr height="25">
    <td height="20" id="bod">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>

    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
  </tr>

  <tr height="25">
    <td height="20" id="bod">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>

    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
  </tr>

  <tr height="25">
    <td height="20" id="bod">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>

    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
  </tr>

  <tr height="25">
    <td height="20" id="bod">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>

    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
  </tr>

 
  <tr height="25">
    <td height="20" id="bod">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center">&nbsp;</td>
    <td id="bod" align="center" colspan="2">&nbsp;</td>    
  </tr>

  <tr>
    <td height="20" colspan="3" style="border:1px solid #000; border-bottom:0px;border-right:0px; padding-left:4px">&nbsp;Marks Obtainable:&nbsp;&nbsp;<strong>1000</strong></td>
    <td colspan="5" style="border:1px solid #000; border-bottom:0px;border-right:0px;border-left:0px; padding-left:4px">Marks Obtained:&nbsp;&nbsp;<strong>{{$key4->total_marks}}</strong></td>
    <td colspan="5" style="border:1px solid #000; border-bottom:0px; border-left:0px">Average:&nbsp;&nbsp;&nbsp;&nbsp;<strong>{{ $key4->average }}</strong></td>
  </tr>
  <tr>
    <td height="20" colspan="8" style="border:1px solid #000; border-bottom:0px;border-right:0px; padding-left:4px">&nbsp;Position in Class: <strong>
      {{ studentPosition($position) }}
    </strong></td>
    <td colspan="5" style="border:1px solid #000; border-bottom:0px; border-left:0px;">Out of:&nbsp;<strong>{{$count_s}}</strong></td>
  </tr>
  <tr>
    <td height="20" colspan="13"  style="border:1px solid #000; border-bottom:0px; padding-left:4px">&nbsp;Form Teacher's Remarks:&nbsp;&nbsp;&nbsp;<strong>An encouraging performance</strong>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="8" style="border:1px solid #000; border-bottom:0px;border-right:0px;padding-left:4px">&nbsp;Name:&nbsp;<strong>JOHN DOE T</strong></td>
    <td colspan="5" style="border:1px solid #000; border-bottom:0px; border-left:0px"><div style="position:relative">Signature <div class="signature"> jane doe t</div></td>
  </tr>  
  <tr>
    <td height="20" colspan="13"  style="border:1px solid #000; border-bottom:0px; padding-left:4px">&nbsp;Principal's Remarks:&nbsp;<strong>A good result! You can do better</strong></td>
  </tr>  
  <tr>
    <td colspan="8" style="border:1px solid #000; border-bottom:0px;border-right:0px;padding-left:4px">&nbsp;Name:&nbsp;<strong>JANE DOE P</strong></td>
    <td colspan="5" style="border:1px solid #000; border-bottom:0px; border-left:0px"><div style="position:relative"><!--<div style="position:absolute; left: 154px; top: -83px;"><img src="../images/chart.png" width="150" height="92"></div>-->
    Signature<div style="position:absolute; left: 70px; top: -6px;"><img src='../images/sig/0.png' title='Principal`s Signature' height='36' width='86' /></div>
    </div></td>
  </tr>    
    <tr style="font-size:11px">
    <td height="17" colspan="13" class="tbheadr"  style="font-size:11px;border:1px solid #000; border-bottom:0px;  padding-left:4px">&nbsp;</td>
  </tr>  
  <tr style="font-size:14px">
    <td height="16"  style="border:1px solid #000;   padding-left:4px" colspan="13">Final Assessment:&nbsp;&nbsp;&nbsp;(<strong>'A'</strong>) Excellent(75% above);<strong>'B'</strong> Very Good(65-74);<strong>'C'</strong>  Good(55-64);<strong>'D'</strong>  Fair(40-54);<strong>'E'</strong> Poor(39 and  below)</td>
    </tr>  
  <tr>
  <td colspan="7">&nbsp;</td>
    <td colspan="6" align="right" style="padding-top:2px">
        </td>
    </tr>            
      </tbody>         
</table>
</body>
</html>
