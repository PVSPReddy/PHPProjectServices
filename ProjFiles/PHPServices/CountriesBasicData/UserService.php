<?php

require_once("ConnectionService.php");
require_once("ServerStatus.php");

class UserServices extends ServerStatus
{
    function Connection()
    {
        $getConnService = new GetConnectionService();
        $conn = $getConnService -> getConnection();
        return $conn;
    }

    function GetCountries()
    {
        try
        {
            $conn = $this->Connection();

            $sql = "SELECT * from countriesdb.allcountriesdatasingletable";
            $res_data = $conn->prepare($sql);
            $res_data->execute();

            // set the resulting array to associative
            $_response = $res_data->setFetchMode(PDO::FETCH_ASSOC);
            $response_ = $res_data->fetchAll();

            $countries_data = $response_;
            $response = array("message"=>"Service is successful",
                             "code"=>"1",
                              "movie_details"=>$countries_data
                             );
            $conn = null;
            return $response;
//            $conn->close();
        }
        catch(PDOException $e)
        {
            $countries_data = array();
                $response = array("message"=>"Countries list are empty",
                             "code"=>"0",
                            "movie_details"=>$countries_data
                             );
                return $response;
            //echo "Connection failed: " . $e->getMessage();
        }
    }

    function FaultMethod($data)
    {

    }

}

?>
