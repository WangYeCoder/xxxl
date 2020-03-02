    <?php

    namespace App\Work;

    class Proxy extends Bases{
    public function getProxy()
    {
        //测试代理可用性
        $useful=$this->doPing(1,2);
        if($useful==true){
            //维护到数据库
        }
    }

    public function doPing($host,$port)
    {
    # code...
    $host = '193.33.186.70'; 
    $port = 80; 
    $waitTimeoutInSeconds = 2; 
    if($fp = fsockopen($host,$port,$errCode,$errStr,$waitTimeoutInSeconds)){   
    // It worked 该IP可用
    return true;
    } else {
    // It didn't work  该IP不可用
    return false;
    } 
    fclose($fp);;
    }

    }