<?php

    namespace App\Work;

    class Ebbinghaus extends Bases{
    public function newTable($list)
    {
        $newStudy = 0;
        $reviewCyclicity = [1,2,4,7,15];
        echo "<table border='1'>\n";
        echo "<tr>\n";
        echo "<th>日期</th>\n";
        echo "<th>初次记忆</th>\n";
        echo "<th>复习</th>\n";
        echo "</tr>\n";
        $time = time();
        for ($i=1; $i<=$list; $i++){
            //返回日期
            $newStudy = $i;
            echo "<tr>\n";
            //每日日期
            $everyDay= date("m-d",$time);
            echo "<td>{$everyDay}</td>\n";
            //新学习
            echo "<td>{$i}</td>\n";
            //复习判断
            $review = []; 
            //假如复习到了第6天 这里就是那个时间点 
            for ($j=1; $j<=$i; $j++){
            $timeDistans= $i-$j; //6 - 1 =5 ； 那么第一天所学习的单词到现在已经有五天的间隔了 开始判断是不是属于review周期
            $isRewview=in_array($timeDistans,$reviewCyclicity);
            if($isRewview){ //如果在review周期内 那么将他添加到计划里
                $review[]=$j; 
                echo "<td>{$j}</td>\n";
            }
            }
           
            $review = json_encode($review);
                  
            echo "</tr>\n";
            $time= time() + (3600 * 24)*$i ;

        }
        echo "<table>\n";
    }
}