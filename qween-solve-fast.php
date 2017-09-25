<html><head></head><body>

<?php
echo "<center><h1>Queens solve</h1></center><br>";
$start = microtime(true);
$table = array();
$queens=8;
for ($row=1; $row<=$queens;$row++)
  {
    for ($col=1; $col<=$queens;$col++)
      {
	$table[$row][$col]=0;
      }
  }

 function solve($activeq, $row)
    {
	global $table,  $queens, $start;
	for ($col=1; $col<=$queens;$col++)
        {
        	if($table[$row][$col]==0)
	    	{
            	$tmptable=$table;
                for ($rowx=$row; $rowx<=$queens;$rowx++)
                  {
                         $table[$rowx][$col]=1; 
                  } 
			for ($colx=1; $colx<=$queens;$colx++)
                      {
                        $table[$row][$colx]=1; 
                      }
		 $table[$row][$col]=2;
		 for ($count=1; $count<=$queens-$col;$count++)
                            {
                                $r=$row+$count;
                                $c=$col+$count;
                                $table[$r][$c]=1; 
                            }
                          for ($count=1; $count<=$queens-$row;$count++)
                            {
                                $r=$row+$count;
                                $c=$col-$count;
                                $table[$r][$c]=1;
                            }

		if(($activeq === $queens - 1) || solve($activeq + 1 , $row + 1 ) === true){ showtable();echo microtime(true) - $start;break 2;   return true;}
		$table=$tmptable;
                }

	}
    }


for ($row=1; $row<$queens;$row++)
  {
   if(solve(0, $row) == true)
	{
		showtable();
	}
  }

function showtable(){
global $table, $queens;
for ($row=1; $row<=$queens;$row++)
  {
    for ($col=1; $col<=$queens;$col++)
      {
        echo $table[$row][$col]." ";
      }
    echo "<br>";
  }
 echo "<br>";
}


?>
</body></html>
