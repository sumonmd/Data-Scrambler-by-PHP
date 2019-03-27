<?php 
    include_once 'scramblerfunc.php';
    $task="encode";
    $scramblerData='';
    if(isset($_GET['task']) && isset($_GET['task'])!==''){
        $task=$_GET['task'];
    }
    $original_key='abcdefghijklmnopqrstuvwxyz1234567890';
    $key='abcdefghijklmnopqrstuvwxyz1234567890';
    if($task=='key'){
        $key_original=str_split($key);
        shuffle($key_original);
        $key=join('',$key_original);
    }
    else if(isset($_POST['key']) && isset($_POST['key'])!=''){
        $key=$_POST['key'];
    }

    if($task=='encode'){
        $data=$_POST['data'] ?? '';
        if($data!=''){
            $scramblerData=scramblerData($data,$key);
        }

    }
    if($task=='decode'){
        $data=$_POST['data']??'';
        if($data!=''){
            $scramblerData=decodeData($data,$key);
        }
    }
    

?>

<!DOCTYPE>
<html>
   <head>
    <meta charset="UTF-8">
    <title>practise</title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">

    <style>
    body{
        margin-top:30px;
    }
    #data{
        width:100%;
        height:160px;
    }
    #result{
        width:100%;
        height:160px;
    }
    </style>
   </head>
   <body>
       <div class="container">
            <div class="row">
                <div class="column column-60 column-offset-20">
                <h1>Data Scrambler</h1>
                <p>Use this application scramb your data</p>
                <p>
                    <a href="scrambler.php?task=encode">Encode</a> |
                    <a href="scrambler.php?task=decode">Decode</a> |
                    <a href="scrambler.php?task=key">Generate Key</a>
                </p>
                </div>
            </div>
            <div class="row">
                <div class="column column-60 column-offset-20">
                    <form action="scrambler.php <?php if($task=='decode'){ echo "?task=decode";}?>" Method="POST">
                        <label for="key">Key</label>
                        <input type="text" name="key" id="key" <?php displayKey($key);?>>
                        <label for="data">Data</label>
                        <textarea type="text" name="data" id="data"><?php if(isset($_POST['data'])){ echo $_POST['data'];}?></textarea>
                        <label for="">Result</label>
                        <textarea id="result" ><?php echo $scramblerData;?></textarea>
                        <button type="submit">Do it for me</button>
                    </form>
                </div>
            </div>
       </div>
   </body>

</html>