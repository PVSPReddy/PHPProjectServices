<?php
class AccessExternalServiceCalls
{
    function AccessExternalServices($url, $method, $parameters, $Headers)
    {
        $url = "https://script.google.com/macros/s/AKfycbx-jmj_70IEWRP3t5Z2QFSIkWakhYbTYvTMM2uTCCIE3ZXx0loS/exec";
        //$url = "https://script.googleusercontent.com/macros/echo?user_content_key=QBOVOPs8uM0MuYQfFyK4W7ilIEB7JgO5VE3NQdZf5lBf2-TjoSmEuBCOGgSjLLtW7tRX5g6S9ImDLwp3oOicSAK30yD0T8G3m5_BxDlH2jW0nuo2oDemN9CCS2h10ox_1xSncGQajx_ryfhECjZEnBOdbNCjBmbjEOOPRrZzbJVgEeGpP0pCiiIfVfhrzVlD0XAZUKozy0efPajHEymamqZYwDtuJYeH&lib=MeTk28aelQajx2xUtX-QeZ3cAfuWwl7sa";

        //CallAccessMethods();
        if(isset($method))
        {
            switch($method)
            {
                case "Get":
                    $this->GetData($url, $Headers);
                break;
                case "Post":
                    $this->PostData($url, $parameters, $Headers);
                break;
                case "Update":
                break;
                case "Delete":
                break;
                default:
                break;
            }
        }
    }

    function GetData($url, $Headers)
    {
        try
        {
            //$curl = curl_init($url);
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HEADER, true);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $curl_response = curl_exec($curl);
            echo $curl_response;
            exit;
            if ($curl_response === false) 
            {
                $info = curl_getinfo($curl);
                curl_close($curl);
                die('error occured during curl exec. Additioanl info: ' . var_export($info));
            }
            curl_close($curl);
            //$decoded = json_decode($curl_response);
            if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
                die('error occured: ' . $decoded->response->errormessage);
            }

            $response = $curl_response; /*array("message"=>"Songs cannot be retrived.",
                             "code"=>"0",
                             $curl_response
                             );*/
            return $response;
            exit;
            echo 'response ok!';
            //var_export($decoded->response);
        }
        catch(PDOException $e)
        {

        }
    }

    function PostData($url, $data, $Headers)
    {
        try
        {

        }
        catch(PDOException $e)
        {

        }
    }

    function Second()
    {

            if($method === "POST" )
            {
                
            }
            else if($method === "GET")
            {
                
            }
            else if($method === "UPDATE")
            {
                
            }
            else if($method === "DELETE")
            {
                
            }
            else
            {
                
            }
    }
}
?>