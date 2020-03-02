<?php
    namespace App\Work;
   
    use Symfony\Component\CssSelector\CssSelectorConverter;

    use Symfony\Component\DomCrawler\Crawler;

    class CookieHandle extends Bases
    {
    

    /** 
     * 开始抢购总任务
     * */  
    public function dostart()
    {
        $goodsNum ='202002241823125721';
        $cookie = "macid=C87E6C3764B0000161E6B4027DB019DC; _ga=GA1.2.879713598.1561188145; pgv_pvi=7768772395; bdshare_firstime=1580351547920; sid=a516dad5-4e59-4322-a652-5e474284c4bc; NOTE_UPDATE_TIME=1583141426968; NOTE_CACHE=%5B%7B%22id%22%3A200%2C%22title%22%3A%22%E6%B5%8B%E6%9C%8D%E9%BE%99%E9%97%A8NPC%E7%BB%B4%E6%8A%A4%22%2C%22content%22%3A%22%22%2C%22addTime%22%3A1432711191000%2C%22context%22%3A%22'TL'%22%2C%22publishUser%22%3A%22%22%2C%22stick%22%3A0%2C%22stickTime%22%3Anull%2C%22deleteFlag%22%3A0%7D%2C%7B%22id%22%3A198%2C%22title%22%3A%22%E5%AE%A0%E7%88%B1%E4%B8%80%E7%94%9F%E6%9C%8D%E5%8A%A1%E5%99%A8%E7%BB%B4%E6%8A%A4%E5%AE%8C%E6%88%90%22%2C%22content%22%3A%22%22%2C%22addTime%22%3A1431314942000%2C%22context%22%3A%22'TL'%22%2C%22publishUser%22%3A%22%22%2C%22stick%22%3A0%2C%22stickTime%22%3Anull%2C%22deleteFlag%22%3A0%7D%2C%7B%22id%22%3A197%2C%22title%22%3A%22%E5%AE%A0%E7%88%B1%E4%B8%80%E7%94%9F%E6%9C%8D%E5%8A%A1%E5%99%A8%E7%BB%B4%E6%8A%A4%22%2C%22content%22%3A%22%22%2C%22addTime%22%3A1431312451000%2C%22context%22%3A%22'TL'%22%2C%22publishUser%22%3A%22%22%2C%22stick%22%3A0%2C%22stickTime%22%3Anull%2C%22deleteFlag%22%3A0%7D%2C%7B%22id%22%3A196%2C%22title%22%3A%22%E3%80%904%E6%9C%8817%E6%97%A5%E7%BB%B4%E6%8A%A4%E3%80%91%E7%95%85%E6%98%93%E9%98%81.%E9%81%93%E5%85%B7%E5%9D%8A%E7%BB%B4%E6%8A%A4%E5%85%AC%E5%91%8A%22%2C%22content%22%3A%22%22%2C%22addTime%22%3A1429156000000%2C%22context%22%3A%22'TL'%22%2C%22publishUser%22%3A%22%22%2C%22stick%22%3A0%2C%22stickTime%22%3Anull%2C%22deleteFlag%22%3A0%7D%2C%7B%22id%22%3A192%2C%22title%22%3A%22%E3%80%90%E6%96%B0%E5%A4%A9%E9%BE%99%E5%85%AB%E9%83%A8%E3%80%91%E4%BB%A4%E7%89%8C%E5%B1%95%E7%A4%BA%E5%8A%9F%E8%83%BD%E4%B8%8A%E7%BA%BF%E5%95%A6%EF%BC%81%22%2C%22content%22%3A%22%22%2C%22addTime%22%3A1427165782000%2C%22context%22%3A%22'TL''ZJ'%22%2C%22publishUser%22%3A%22%22%2C%22stick%22%3A0%2C%22stickTime%22%3Anull%2C%22deleteFlag%22%3A0%7D%5D; qrcodeid=81fad67d2927a912cf22125497e0aa2ccdfc3b2e6a8a8d18dfe79a20b2d356a01278833a781abe26f762a0830e0eda8a; COOKIE_GOODS_SCANED=%25E6%258A%2598%25E6%259C%2588%25E4%25BA%25A6%25E6%259B%25BC%25E8%2588%259E%25E3%2583%259A%253D202002241811215538%253D58888.0%253D5%2527%25E6%259E%2597%25E4%25B8%2580%25EF%25BC%258E%253D202002241810585533%253D90900.0%253D1%2527%25E6%25B8%2585%25E9%25A2%25A8%25E5%25A2%25A8%25E7%25AB%25B9%253D202002241810395530%253D4444.0%253D8%2527%25E5%25B0%25B8%25E5%25A4%258F%253D202002241809385511%253D260.0%253D5%2527%25EF%25B9%258E%25E6%2598%25A5%25E5%25A4%25A9%25E3%2582%259E%253D202002241809355510%253D188.0%253D8; JSESSIONID=12608D6159D9F3B4C736E6AA8FF0BC4D";
        //判断"开始抢购"出现
        // $startBy = $this->judgeIcon($cookie,$goodsNum);
        //判断倒计时
        $timeBy = $this->judgeTime($cookie,$goodsNum);
    }

    /**
     * 创建订单
     */
    public function doCreateOrder($cookie,$goodsNum){
       $res=$this->getImgTem($cookie,$goodsNum);
       $code =$res['code'];
       $pic = $res['id'];
       if($code){
           $result=$this->doOrder($goodsNum,$code,$cookie);
           return $result;
       }else{
           echo "识别失败";
           die();
       }
    }


    /**
     * 根据图标去识别
     */
    public function judgeIcon($goodsNum)
    {
        # 需要代理池去维护 
        $html = $this->getHtml($goodsNum);
        $crawler = new Crawler($html);
        try{
            $hrefs=$crawler->filter('a[class="btn-buy"]')->text(); 
            if($hrefs=="立即购买"){
                return 1;
            }else{
                return 2;
            };
        }catch(\Exception $e){
            return 2;
        }
    }
    
    public function judgeTime($cookie,$goodsNum){
        $html = $this->getHtml($goodsNum); 
        $crawler = new Crawler($html);
        try{
            $time=$crawler->filter('span[class="less-than-day"]')->extract(array('data-second', 'class'));
            $time=(int)$time[0][0];
            // sleep($time);   
            $isTrue=$this->judgeIcon($goodsNum);
            while(true){
                if($isTrue==1){
                    echo "开始下单";
                    // $result=$this->doCreateOrder($cookie,$goodsNum);
                    // print_r("下单结束".$result);
                    die();   
            };
            }
        }catch(\Exception $e){
            print_r("COOKIE 失效");
            die("!2312"); 
        }
    }

    public function getSelling($goodsNum)
    {
        # code...
        $curl = curl_init();

        $proxyUrl = "118.25.45.211";
        $proxyPort = 2587;
        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://tl.cyg.changyou.com/goods/char_detail?serial_num=$goodsNum",
          CURLOPT_HEADER=>0,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 10,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_PROXY =>$proxyUrl,
          CURLOPT_PROXYPORT=>$proxyPort,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
        ));
        
        $response = curl_exec($curl);

        
        return $response;
    }

    public function getHtml($goodsNum){

        $curl = curl_init();

        $proxyUrl = "118.25.45.211";
        $proxyPort = 2587;
        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://tl.cyg.changyou.com/goods/char_detail?serial_num=$goodsNum",
          CURLOPT_HEADER=>0,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 10,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_PROXY =>$proxyUrl,
          CURLOPT_PROXYPORT=>$proxyPort,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
        ));
        
        $response = curl_exec($curl);

        
        return $response;
    }

    

    public function getImgTem($cookie,$goodsNum)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://tl.cyg.changyou.com/transaction/captcha-image?goods_serial_num=$goodsNum&t=1582944138077",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => array(
            "Cookie: "."$cookie",
            "User-Agent: PostmanRuntime/7.22.0",
            "Accept: */*",
            "Cache-Control: no-cache",
            "Postman-Token: 000f22f7-3ad1-4f31-9afd-97ab48fcdf83",
            "Host: tl.cyg.changyou.com",
            "Accept-Encoding: gzip, deflate, br",
            "Content-Length: ",
            "Connection: keep-alive"
            ),
        ));
        
        $response = curl_exec($curl);

        $base64_image_final = base64_encode($response);

        echo "开始识别";
        echo "\n";
        $result=$this->tlbbChang($cookie,$goodsNum,$base64_image_final);
        echo "结束识别";
        echo "\n";

        echo json_encode($result);
       
        if(!empty($result['code'])){
            return $result;
        }else{
            return null;
        }
        
    }

    public function doOrder($goodsNum,$code,$cookie)
    {
       
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://tl.cyg.changyou.com/transaction/buy?=",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "goods_serial_num=$goodsNum&captcha_code=$code",
  CURLOPT_HTTPHEADER => array(
    "Cookie: "."$cookie",
    "Content-Type: application/x-www-form-urlencoded",
    "User-Agent: PostmanRuntime/7.22.0",
    "Accept: */*",
    "Cache-Control: no-cache",
    "Postman-Token: fc64ff82-f09a-489b-a25c-be97360519a9",
    "Host: tl.cyg.changyou.com",
    "Accept-Encoding: gzip, deflate, br",
    "Content-Length: 53",
    "Connection: keep-alive"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
// echo $response;
// print_r($response);

return $response;
    }


    public function tlbbChang($cookie,$goodsNum,$img){ 

            try{

        //超级鹰账号信息
        $user		= 'w258765';				//超级鹰用户账号
        $pass		= md5('w258765');			//经过md5加密的密码
        $softid		= '217309ae4cb4d37f8c85e26b6fad0159';			//软件ID 用户中心>软件ID 可以生成
        $codetype	= '1902' ;			//码图类型,查看更多类型 https://www.chaojiying.com/price.html
        // $userfile	= 'img.jpg' ;		//注意PHP是否能正确取得图片数据，关注下PHP权限和图片路径  注意有时windows系统须要用到绝对路径
        $base64_str	= $img ;				//base64字符串方式 参考 https://www.chaojiying.com/api-46.html

        //发送 base64字符串方式
        $result = $this->CJY_Post_base64($user,$pass,$softid,$codetype,$base64_str) ;

        //判断是否能读取到文件
        // if (is_readable($userfile) == false) { die('文件不存在或者无法读取'); }

        //查询帐号信息
        echo '----帐号信息----<br />';
        $info = $this->CJY_GetScore($user,$pass);
        $infoArray = json_decode($info,true);

        //识别验证码
        // $result = $this->CJY_RecognizeBytes($user,$pass,$softid,$codetype,$userfile);
        $reArray = json_decode($result,true);
        if($reArray["err_no"] == 0)
        {
            return [
                'code'=>$reArray["pic_str"],
                'id'=>$reArray["pic_id"]
            ];
        }
        else{
            return [
                'msg'=>json_encode($reArray)
            ];
        }


        //报告错误,只有识别成功并且验证码错误时,调用此函数才有效
        if($reArray["err_no"] != 0)
        {
        $this->CJY_ReportError($user,$pass,$reArray["pic_id"],$softid);
        }

        }catch(\Exception $e){

        return $e;

        };
        }

        //查询题分
        //返回样例:{"err_no":0,"err_str":"OK","tifen":821690,"tifen_lock":0}
        function CJY_GetScore($user,$pass){
        $url = 'http://code.chaojiying.net/Upload/GetScore.php' ; 
        $fields = array( 
        'user'=>$user ,
        'pass2'=>$pass ,
        ); 

        $ch = curl_init() ;  
        curl_setopt($ch, CURLOPT_URL,$url) ;  
        curl_setopt($ch, CURLOPT_POST,count($fields)) ;   
        curl_setopt($ch, CURLOPT_POSTFIELDS,$fields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回  
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true) ; // 在启用 CURLOPT_RETURNTRANSFER 时候将获取数据返回  
        curl_setopt($ch, CURLOPT_REFERER,'') ; 
        curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9.2.3) Gecko/20100401 Firefox/3.6.3') ;
        $result = curl_exec($ch); 
        curl_close($ch) ;

        return $result ;
        }

        //识别验证码
        //返回样例:{"err_no":0,"err_str":"OK","pic_id":1662228516102,"pic_str":"8vka","md5":"35d5c7f6f53223fbdc5b72783db0c2c0","str_debug":""}
        function CJY_RecognizeBytes($user,$pass,$softid,$codetype,$userfile){
        $url = 'http://upload.chaojiying.net/Upload/Processing.php' ; 
        $fields = array( 
        'user'=>$user ,
        'pass2'=>$pass ,
        'softid'=>$softid ,
        'codetype'=>$codetype ,
        'userfile'=>"@$userfile" ,  //注意,当PHP版本高于5.5后，此行可能无效要改为下一行
        //'userfile'=> new CURLFile(realpath($userfile)),
        ); 

        $ch = curl_init() ;  
        curl_setopt($ch, CURLOPT_URL,$url) ;  
        curl_setopt($ch, CURLOPT_POST,count($fields)) ;   
        curl_setopt($ch, CURLOPT_POSTFIELDS,$fields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回  
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true) ; // 在启用 CURLOPT_RETURNTRANSFER 时候将获取数据返回  
        curl_setopt($ch, CURLOPT_REFERER,'') ; 
        curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9.2.3) Gecko/20100401 Firefox/3.6.3') ;
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));  //加入这行是为了让 curl 一次发送POST包,防止发送包里出现 Expect:100-continue 造成CDN节点返回417错误
        $result = curl_exec($ch); 
        curl_close($ch) ;

        return $result ;
        }
        //发送 base64字符串 
        function CJY_Post_base64($user,$pass,$softid,$codetype,$base64_str){
        $url = 'http://upload.chaojiying.net/Upload/Processing.php' ; 
        $fields = array( 
        'user'=>$user ,
        'pass2'=>$pass ,
        'softid'=>$softid ,
        'codetype'=>$codetype ,
        'file_base64'=>$base64_str
        ); 

        $ch = curl_init() ;  
        curl_setopt($ch, CURLOPT_URL,$url) ;  
        curl_setopt($ch, CURLOPT_POST,count($fields)) ;   
        curl_setopt($ch, CURLOPT_POSTFIELDS,$fields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回  
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true) ; // 在启用 CURLOPT_RETURNTRANSFER 时候将获取数据返回  
        curl_setopt($ch, CURLOPT_REFERER,'') ; 
        curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9.2.3) Gecko/20100401 Firefox/3.6.3') ;
        $result = curl_exec($ch); 
        curl_close($ch) ;

        return $result ;
        }

        //报告错误,只在验证码识别结果是错误的时候使用该函数
        //返回样例:{"err_no":0,"err_str":"OK"}
        function CJY_ReportError($user,$pass,$PicId,$SoftId){
        $url = 'http://code.chaojiying.net/Upload/ReportError.php' ; 
        $fields = array( 
        'user'=>$user ,
        'pass2'=>$pass ,
        'id'=>$PicId ,
        'softid'=>$SoftId ,
        ); 

        $ch = curl_init() ;  
        curl_setopt($ch, CURLOPT_URL,$url) ;  
        curl_setopt($ch, CURLOPT_POST,count($fields)) ;   
        curl_setopt($ch, CURLOPT_POSTFIELDS,$fields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回  
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true) ; // 在启用 CURLOPT_RETURNTRANSFER 时候将获取数据返回  
        curl_setopt($ch, CURLOPT_REFERER,'') ; 
        curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9.2.3) Gecko/20100401 Firefox/3.6.3') ;
        $result = curl_exec($ch); 
        curl_close($ch) ;

        return $result ;
        }

    }






    ?>