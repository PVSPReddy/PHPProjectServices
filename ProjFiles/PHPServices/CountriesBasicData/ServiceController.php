<?php

require_once("UserService.php");
//require_once("ServerStatusService.php");

class RequestHandler// extends ServerStatus
{
    function Request_Handler($userRequest, $data)
    {
        $uServices = new UserServices();
        switch($userRequest)
        {
            case "GetCountriesData":
                return $response = $uServices -> GetCountries();
                break;
            default:
                return $response = $uServices -> FaultMethod($data);
                break;
        }
    }

}

?>
