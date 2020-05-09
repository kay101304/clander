<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:arial,"Microsoft JhengHei";
    
}
body{
    background-size: cover;
    background-image: url("pic1.jpg");
    color:white;
}
table{
    border-collapse:collapse;
    margin:  10% auto;
    border: 2px solid lightcyan;
    min-width:90%;
    min-height:50%;
}
table td{
    border:1px solid lightcyan;
    padding:5px;
    text-align:center;
    height:70px;
    width:80px;
}
a{
    display: inline-flex;
    width:48%;
    flex-wrap:nowrap;
    justify-content: center;s
    align-items: center;
    color:lightcyan;
    text-decoration:none;
    font-size:18px;

}
.flex{
    display: flex;
    max-width:100%;
    flex-wrap:wrap;
}
.type{
    display: inline-flex;
    width: 25%;
    justify-content: center;
    align-items: center;
    padding: 10px;
    }
input[type="number"]{
    background-color:transparent;
    border:2px solid transparent;
    width:120px;height:20px;border:2px #9999FF dashed;
    color:lightcyan;
}
input[type="submit"]{
    background-color:transparent;
    color:lightcyan;
}
h1,h2{
        text-align: center;
    }
    h1{
        color: #555;
    }
    .div>a{
        color: #99f;
        text-align: center;
    }
    td,th{
        border: 2px solid lightcyan;
        text-align:center;
        
    }
    tr>th:first-child,tr>th:last-child{
        color:rgb(246, 148, 197);
        font-weight: bold;
    }
    tr>td:first-child,
    tr>td:last-child{
        color:rgb(246, 148, 197);      
    }
</style>
<div>
 <form action="?" method="get">
    <input type="number" name="year">
    <input type="submit" value="年份查詢">
</form> 
</div>
<div class="flex"></div>
<?php

if(isset($_GET["year"])){
    $year=$_GET["year"];
    }else{
        $year=date("Y");
    }

if(isset($_GET['month'])){
    $month=$_GET['month'];
    }else{
        $month=date("n");
    }

if($month == 1){
    $prevyear = $year-1;
    $prevmonth = 12;
}else{
    $prevyear = $year;
    $prevmonth = $month-1;
}

if($month == 12){
    $nextyear = $year+1;
    $nextmonth = 1;
}else{
    $nextyear = $year;
    $nextmonth = $month+1;
}

// echo $year;
echo "<h4 style='text-align:center'>西元".$year."年曆</h4>";
?>



<table>
<tr>
<td  colspan="7"><?=$month;?>月</td>
</tr>
    <tr>
        <th>Sun</th> 
        <th>Mon</th> 
        <th>Tue</th> 
        <th>Wed</th> 
        <th>Thur</th> 
        <th>Fri</th> 
        <th>Sat</th> 
    </tr>

<?php

$festivals=[ '11'=>'元旦',
'123'=>'彈性放假',
'124'=>'除夕',
'125'=>'春節',
'126'=>'春節',
'127'=>'春節',
'128'=>'春節',
'129'=>'春節',
'228'=>'和平'."<br>".'紀念日',
'402'=>'補假日',
'403'=>'放假日',
'44'=>'清明節'."<br>".'兒童節',
'51'=>'勞動節',
'625'=>'端午節',
'626'=>'彈性放假',
'101'=>'中秋節',
'102'=>'彈性放假',
'109'=>'補假日',
'1010'=>'國慶日',
];

$fd="$year-$month-01";
$fdw=date("w" ,strtotime($fd)); //計算該日期為星期幾
$fin=date("t",strtotime($fd)); //計算該月有幾天
// $tm=date("m");
// $td=date("d");

for($i = 0; $i <6; $i++) {
    echo "<tr>";
    for($j = 0; $j<7; $j++) {
        if($i==0 && $j<$fdw || $i*7+$j+1-$fdw > $fin){
        echo "<td>";
        echo "</td>";
        }else{
            $td= $i*7+$j+1-$fdw;
            $md= $month.$td;
            echo "<td>";
            echo $td."<br>";
            foreach($festivals as $key => $v){
                if($md == $key){
                    echo $v;
                    echo "</td>";
                    }
                }
            
        }
           
    }
    echo "</tr>";
}
?>

</table>
<?php
echo "</div>";
?>
</div>
<a href="index.php?year=<?=$year=$prevyear;?>&month=<?=$month=$prevmonth;?>">　　Previous month　　</a>
<a href="index.php?year=<?=$year=$nextyear;?>&month=<?=$month=$nextmonth;?>">　　Next month　　</a> 