<?php 
        echo "<script>
                var javascriptVar = 'malli';
             </script>";
        
        $phpVar = "<script>document.writeln(javascriptVar);</script>";
        echo $phpVar;
    ?>