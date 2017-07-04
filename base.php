<?php 
function convertUrlQuery($query)
{ 
    $queryParts = explode('&', $query); 
    
    $params = array(); 
    foreach ($queryParts as $param) 
    { 
        $item = explode('=', $param); 
        $params[$item[0]] = $item[1]; 
    } 
    
    return $params; 
}
function getUrlQuery($array_query)
{
    $tmp = array();
    foreach($array_query as $k=>$param)
    {
        $tmp[] = $k.'='.$param;
    }
    $params = implode('&',$tmp);
    return $params;
}
/* 用户输入安全性检测*/
function checkUserInput($inputString){
    if (strpos('script', $inputString)!=false){ 
        return FALSE;
    }else if (strpos('iframe', $inputString)!=false){
        return FALSE;
    }else {
        return TRUE;
    }
};
/*用户名检测*/
function IsUsername($Argv){
    $RegExp='/^[a-zA-Z0-9_]{6,16}$/';
    return preg_match($RegExp,$Argv)?$Argv:false;
}
function IsPassword($Argv){
    $RegExp='/^[a-zA-Z0-9]{6,16}$/'; //由大小写字母跟数字组成并且长度在3-16字符
    return preg_match($RegExp,$Argv)?$Argv:false;
};
/**
 * IsMail函数:检测是否为正确的邮件格式
 * 返回值:是正确的邮件格式返回邮件,不是返回false
 */
function IsMail($Argv){
    $RegExp='/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i';
    return preg_match($RegExp,$Argv)?$Argv:false;
};
        
 /**
 * IsSame函数:检测参数的值是否相同
* 返回值:相同返回true,不相同返回false
 */
function IsSame($ArgvOne,$ArgvTwo,$Force=false){
     return $Force?$ArgvOne===$ArgvTwo:$ArgvOne==$ArgvTwo;
};


?>