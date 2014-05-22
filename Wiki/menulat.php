
    <style>
        body{
            background:#fff url(desc.png) no-repeat 50px 100px;
            font-family:Arial;
            height:200px;
        }
        .header
        {
            width:600px;
            height:56px;
            position:absolute;
            top:0px;
            left:25%;

        }
        a.back{
            width:256px;
            height:73px;
            position:fixed;
            bottom:15px;
            right:15px;
            background:#000 url(codrops_back.png) no-repeat top left;
        }
        .scroll{
            width:133px;
            height:61px;
            position:fixed;
            bottom:15px;
            left:150px;

        }
        .info{
            text-align:right;

        }
    </style>
    
        <div class="header"></div>
        <div class="scroll"></div>
        <ul id="navigation">
            <li class="Accueil"><a href="../?goAccueil=Accueil" title="Accueil"></a></li>
        </ul>
        <script type="text/javascript">
            $(function() {
                $('#navigation a').stop().animate({'marginLeft':'-85px'},1000);

                $('#navigation > li').hover(
                    function () {
                        $('a',$(this)).stop().animate({'marginLeft':'-2px'},200);
                    },
                    function () {
                        $('a',$(this)).stop().animate({'marginLeft':'-85px'},200);
                    }
                );
            });
        </script>




    <center>
    <div id="nav">
      <ul>
        <li><a align="center" href="../?goAccueil=Accueil">Accueil</a></li>
     </ul>
    </div>
    </center>
		