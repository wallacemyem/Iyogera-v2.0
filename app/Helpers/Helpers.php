<?php
use App\Setting;
use App\School;
//use DB;

function get_settings($type) {

    $settings = Setting::first();
    return $settings[$type];
}

function get_schools() {
    $school_id = school_id();
    //$school = School::first();
    return DB::table('schools')->where('id', $school_id)->value('session');
}

function school_id() {
    if(Auth::user()->role == "superadmin") {
        return Auth::user()->school_id;
    }else {
        return Auth::user()->school_id;
    }
}

function studentPosition($position){  /* student result position suffix  */                               
                
                if($position == 1){
                    
                    $positionSup = "1st"; 
            
                }elseif($position == 2){
                    
                    $positionSup = "2nd"; 
            
                }elseif($position == 3){
                    
                    $positionSup = "3rd"; 
            
                }elseif(($position != '') && ($position > 3)){
                    
                    $positionSup = $position."th"; 
                    
                }else{
                    
                    $positionSup = " - "; 
                }
                
                return $positionSup;
                
        }   

/**
 * Open Translation File
 * @return Response
*/
function openJSONFile($code){
    $jsonString = [];
    if(File::exists(base_path('resources/lang/'.$code.'.json'))){
        $jsonString = file_get_contents(base_path('resources/lang/'.$code.'.json'));
        $jsonString = json_decode($jsonString, true);
    }
    return $jsonString;
}

/**
 * Save JSON File
 * @return Response
*/

function saveDefaultJSONFile($language_code){
    
    if(File::exists(base_path('resources/lang/'.$language_code.'.json'))){
        $newLangFile = base_path('resources/lang/'.$language_code.'.json');
        $enLangFile   = base_path('resources/lang/en.json');
        copy($enLangFile, $newLangFile);
    }else {
        $fp = fopen(base_path('resources/lang/'.$language_code.'.json'), 'w');
        $newLangFile = base_path('resources/lang/'.$language_code.'.json');
        $enLangFile   = base_path('resources/lang/en.json');
        copy($enLangFile, $newLangFile);
        fclose($fp);
    }
}


function saveJSONFile($language_code, $updating_key, $updating_value){
    $jsonString = [];
    if(File::exists(base_path('resources/lang/'.$language_code.'.json'))){
        $jsonString = file_get_contents(base_path('resources/lang/'.$language_code.'.json'));
        $jsonString = json_decode($jsonString, true);
        $jsonString[$updating_key] = $updating_value;
    }else {
        $jsonString[$updating_key] = $updating_value;
    }
    $jsonData = json_encode($jsonString, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    file_put_contents(base_path('resources/lang/'.$language_code.'.json'), stripslashes($jsonData));
}

function translate($phrase) {

    $language_code = 'en';
    $langArray = openJSONFile($language_code);
    if (array_key_exists($phrase, $langArray)){
    }
    else{
        $langArray[$phrase] = ucfirst(str_replace('_', ' ', $phrase));
        $jsonData = json_encode($langArray, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
        file_put_contents(base_path('resources/lang/'.$language_code.'.json'), stripslashes($jsonData));
    }

    return __($phrase);
}
