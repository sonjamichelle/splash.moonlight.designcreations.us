<?php
/* Script based on the code you can find at http://opensimulator.org/wiki/Offline_Messaging 
 * @author: Richardus Raymaker -> http:\\www.simsquaremetaverse.nl
 * @date: 2013-03-23
 * @date: 2013-03-26 -> Changed way timestamp get stored in the database, change in table structure.
 */
 
define("C_DB_HOST"      ,"sonja.hopto.org"); 
define("C_DB_DATABASE"  ,"mydata"); 
define("C_DB_USER"      ,"halcyon	"); 
define("C_DB_PASS"      ,"PopeyeMonster1@"); 
define("C_DB_TABLE"     ,"offline");
 
/*---*/
    function SplitIM($httpRaw)
    {
        $ImHeaderStartFunc = strpos($httpRaw,"?>");
        if ($ImHeaderStartFunc!=-1)
        {
            $ImHeaderStartFunc+=2;
            $httpRawFunc = substr($httpRaw,$ImHeaderStartFunc);
            $ImPartsFunc = preg_split('[<|>]',$httpRaw);
 
            return $ImPartsFunc;
        }    
    }
/*---*/
 
/*----------*/
if (isset($_SERVER["PATH_INFO"]))
{
    $urlPath = $_SERVER["PATH_INFO"];
    $httpRaw = $HTTP_RAW_POST_DATA;
 
    if ($urlPath=="/SaveMessage/")
    {
        $start=strpos($httpRaw,"?>");
        if ($start!=-1)
        {
            $httpRaw=substr($httpRaw,$start+2);
 
            /*Open offline database*/
            $link = mysqli_connect(C_DB_HOST, C_DB_USER, C_DB_PASS, C_DB_DATABASE);
            if (!$link) { die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error()); exit; } 
            mysqli_set_charset($link, "utf8");
 
            /*find toAgent UUID*/
            $ImParts = SplitIM($httpRaw);
            $toAgentID=$ImParts[array_search("toAgentID",$ImParts)+1];
            $TMStamp=$ImParts[array_search("timestamp",$ImParts)+1];
 
            /* Store messgae in database and inform user the message is saved */
            mysqli_query($link,"insert into ".C_DB_TABLE." (PrincipalID, Message, TMStamp) values ('" . mysqli_real_escape_string($link,$toAgentID) . "',
                                                                                                   '" . mysqli_real_escape_string($link,$httpRaw). "',
                                                                                                   '" . mysqli_real_escape_string($link,$TMStamp) . "')");
            echo "<?xml version=\"1.0\" encoding=\"utf-8\"?><boolean>true</boolean>";            
 
            /*Close offline database*/
            mysqli_close($link);      
        }
        else
        {   
            echo "<?xml version=\"1.0\" encoding=\"utf-8\"?><boolean>false</boolean>";
        }    
        exit;   
    } 
 
    if ($urlPath=="/RetrieveMessages/")
    { 
        $ImParts = SplitIM($httpRaw);
        $toAgentID=$ImParts[array_search("Guid",$ImParts)+1];
 
        /*Open offline database*/
        $link = mysqli_connect(C_DB_HOST, C_DB_USER, C_DB_PASS, C_DB_DATABASE);
        if (!$link) { die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error()); exit; } 
        mysqli_set_charset($link, "utf8");
 
        $queryresult=mysqli_query($link,"select Message from ".C_DB_TABLE." where PrincipalID='" . mysqli_real_escape_string($link,$toAgentID) . "' ORDER BY ID ASC, TMStamp ASC");        
 
        /* Send offline IM messgaes to user */
        echo "<?xml version=\"1.0\" encoding=\"utf-8\"?><ArrayOfGridInstantMessage xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\">";
 
        while ($row =  mysqli_fetch_array($queryresult, MYSQL_NUM)) 
        {
            echo $row[0];
        }
        echo "</ArrayOfGridInstantMessage>"; 
 
        /* Delete message after send it to user */
        $queryresult=mysqli_query($link,"delete from ".C_DB_TABLE." where PrincipalID='" . mysqli_real_escape_string($link,$toAgentID) . "'");
 
        /*Close offline database*/
        mysqli_close($link); 
 
        exit;          
    }     
}  
 
?>