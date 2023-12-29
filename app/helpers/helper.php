<?php
if (!function_exists('displayErrors')) {
    function displayErrors($errors)
    {
        if ($errors->any()) {
            return '<div class="alert alert-danger font-weight-bold text-center"><ul>' .
                implode('', $errors->all('<li>:message</li>')) .
                '</ul></div>';
        }
        return '';
    }
}

if(!function_exists('displayErrorMassage')) {
    function displayErrorMassage(){
       if(session()->has('error')){
        return '<div class ="alert alert-danger font-weight-bold text-center">'.session('error') . '</div>';
       }
       return '';
    }
}
function debug($args, $stop=true){
    echo "<pre>";
     print_r($args);
    echo "</pre>";
    if($stop){
       exit();
    }
 }
 if(!function_exists('displaySuccessMessage')){
    function displaySuccessMessage(){
        if (session()->has('success')){
            return '<div class ="alert alert-success font-weight-bold text-center">'.session('success') . '</div>';
        }
        return '';

    }
}

function convertDate($date){
return date("jS, F Y' h:i A", strtotime($date));

}
?>
