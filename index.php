<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./CSS/google.css">
    <style>
        *{
          /* 清除所有標籤的內外距及空白 */
          margin:0;
          padding:0;
          box-sizing:border-box;
        }

        .bg
        {
            color:greenyellow !important;
           
        }
        
        .time
        {   position:absolute; left:10px; top:0px;
            font-size:20px; 
            color:white;
             
        }
        .time1
        {   position:absolute; left:32%; top:23%;
            font-size:70px; 
            color:white;
             
        }
        .button
        {
            position:absolute; left:10%; top:80%;
            font-size:25px; 
            width:85px;
            height:35px;
            background:orange; 
            cursor:pointer;
            text-align: center;
            border-radius: 5px;
        }
        .button:active{
             background: orangered;
         }    
        .button1
        {
            position:absolute; left:70%; top:80%;
            font-size:25px;
            width:88px;
            height:35px;
            background:orange; 
            cursor:pointer;
            text-align: center;
            border-radius: 5px;
        }
        .button1:active{
             background: orangered;
         }  
        
        body{
            font-family: 'Ultra', serif;
            background: linear-gradient(to right, #EAEAEA, #DBDBDB, #F2F2F2, #ADA996);
            background-attachment:fixed;
            display:flex;
          align-items:center;
          justify-content:center;
          height:100vh;
               
        }
      
        #calendar_border{
            position:relative;
            left:0px;
            /* top:105px; */
            width:350px;
            height:640px;
            background-image: linear-gradient(to right, #b8cbb8 0%, #b8cbb8 0%, #b465da 0%, #cf6cc9 33%, #ee609c 66%, #ee609c 100%);
           
            border-left-style: none;
            box-shadow : 10px 0 3px -1px  #d09693;
            z-index:9999;
            
        }
        .day {
            color:white;
            
            
        }
        #calendar_out{   
            /* position:absolute; */

            left:0;
            /* top:185px; */
            background-image:url(./17.jpg);
            width:850px;
            height:610px;
            
            box-sizing:border-box;
            background-repeat: no-repeat;
            
            background-size: cover;
        }

        #calendar_in {    
            position:absolute; top:20px; left:500px;
            
            width:1000px;
            height:520px; 
            
            
           
            
        }
        
        table {
            font-size:25px;
            
         
        }
        table td:first-child, table tr td:last-child{
            color:	#FFFF33;
        }        
           
        td{ 
            vertical-align:text-top;
            text-align:center;    /*文字置中對齊*/
            color:white;
            width:80px;
            height:80px;

        }
        td:hover{
            background-color:#5555FF   ;
            border:5px;
            border-radius:40%;
            
        }
    .wrapper{
      position:relative;
      display:flex;
      align-items:center;
      

    }   
    </style>
    <title>功課日期</title>
</head>
<body>

    <?php
    
        if (!empty($_GET['month']) && !empty($_GET['year'])){
             $month = $_GET['month'];
             $year = $_GET['year'];
        
        }else{
        $month=date("m");
        $year=date("Y");
       
        }
       
        ?>
         <?php
            $sd=[
               1=>[1=>"元旦",13=>"臘八節"],
               2=>[28=>"228"],
               3=>[],
               4=>[5=>"清明節"],
               5=>[],
               6=>[],
               7=>[],
               8=>[],
               9=>[],
               10=>[7=>"重陽節",10=>"國慶日"],
               11=>[12=>"國父誕辰"],
               12=>[10=>"人權節",13=>"黑色星期五"],
            ];

            
                 
            $todayDays=date("d");
            //echo "<br>";
            $start="$year-$month-01";
            $startDay=date("w",strtotime($start));  
            $days=date("t",strtotime($start));        
            $endDay=date("w",strtotime("$year-$month-$days"));
            //echo "<br>";

            
           
       ?>
       <!-- <br> -->
<div class="wrapper">
       <div id="calendar_border">
       <?php
        echo "<div class='day time'>"."<h2>" .date("Y-m",strtotime($start))."</h2>"."</div>";
        echo "<div class='day time1'>"."<h2>" . $todayDays."</h2>"."</div>";

        if(($month-1)>0 ){
    ?>
        <a  href ="?month=<?=($month-1);?>&year=<?=($year);?>">
       <div class='day button'  >上個月</div></a> 
    <?php
        }else{
    ?>       
        <a  href ="?month=<?=12;?>&year=<?=($year-1);?>">
     <div class='day button'  >上個月</div></a> 

    <?php
    }
    ?>
    <?php
        if(($month+1)<=12 ){
    ?>
        <a  href ="?month=<?=($month+1);?>&year=<?=($year);?>">
        <div class='day button1' >下個月</div></a>
    <?php
        }else{ 
       
    ?>
        <a  href ="?month=<?=1;?>&year=<?=($year+1);?>">
        <div class='day button1' >下個月</div></a> 
        
    <?php
    }
    ?> 
    </div> 
   
    
    <div id="calendar_out">
    <div id="calendar_in">    
        <table border = '0'>
            <tr>
                <td align="center">SUN</td>
                <td align="center">MON</td>
                <td align="center">TUE</td>
                <td align="center">WED</td>
                <td align="center">THU</td>
                <td align="center">FRI</td>
                <td align="center">SAT</td>
            </tr>
           
            
        <?php    

        for($i=0;$i<6;$i++){
            echo "<tr>";

            for($j=0;$j<7;$j++){ 
                if(!empty($sd[$month][$i*7+$j+1-$startDay])){  //empty()函數用來判斷"值"是不是空的                       
                    
                    $str =$sd[$month][$i*7+$j+1-$startDay];
                    }else{
                        $str = "";
                    } 
                        
                    if($i==0){              
                        if($j<$startDay){      //先判定從星期幾開始
                            echo "<td> </td> ";
                        }else{
                            if(!empty($str)){
                                echo "<td class='bg'>".($i*7+$j+1-$startDay)."<br>".$str."</td>";
                            }else{
                                echo "<td >".($i*7+$j+1-$startDay)."<br>".$str."</td>";
                            }
                        }
                    }else{
                        if(($i*7+$j+1-$startDay)<=$days){  // 開始打印其他禮拜日期
                            if(!empty($str)){
                                if($i*7+$j+1-$startDay==$todayDays){        
                                    echo "<td class='bg'>".($i*7+$j+1-$startDay)."<br>".$str."</td>";
                                }else{
                                    echo "<td class='bg'>".($i*7+$j+1-$startDay)."<br>".$str."</td>";
                                }   

                            }else{ 
                                if($i*7+$j+1-$startDay==$todayDays){        
                                    echo "<td >".($i*7+$j+1-$startDay)."</td>";
                                }else{
                                    echo "<td>".($i*7+$j+1-$startDay)."</td>";
                                }
                                    
                            }
                        }else{
                                echo  "<td>&nbsp</td> ";
                        }
                    } 
            }     
         }
        
        ?>
    
    </div> 
    </div> 
<div>    
    
    
    
</body>
</html>