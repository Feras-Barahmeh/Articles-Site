<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style> 
#boxAlert {
    width: 300px;
    height: 400px;
    position: absolute;
    z-index: 10000;
}
        #boxAlert .contanier {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            color: black;
            border: 1px solid #777;
            width: 400px;
            overflow: hidden;
            /* display: flex;
            flex-direction: column; */
        } 
        #boxAlert .contanier h2 {
            background-color: #85cbe4;
            padding: 5px 20px;
            margin: 0;
            width: 100%;
            
        }
        p {
            font-weight: 600;
            padding: 10px;
        }
        #boxAlert .contanier button {
            width: 150px;
            float: right;
            bottom: 0;
            right: 0;
            margin: 0 5px 5px 0;
            padding: 4px 0;
            position: relative;
            outline: none;
            border: none;
        }
    </style>
</head>
    <body>
    <div id="boxAlert" >
        <div class="contanier">
            <h2 class="">This boxAlert</h2>
            <p>Your massage</p>
            <button id="btn-boxAlert" type="button">OK</button>
        </div>
    </div>
    </body>
</html>