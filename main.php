<?php
session_start();
if(isset($_SESSION['login'])&&$_SESSION['login']==1){
}else{
    header("location:login.php");
}

?>
<html>
<head>
    <script src="jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="css/main.css" type="text/css">

</head>

<button  onclick="location.href='login.php?logout=true'">logout</button>
<div>
<h1 class="h1">Search</h1>


<div class="flexsearch">
    <div class="flexsearch--wrapper">

        <form id="formSearch" class="flexsearch--form"  method="post">

            <div class="flexsearch--input-wrapper">
                <input class="flexsearch--input" type="search" placeholder="drug" name="drug">
            </div>
            <input class="flexsearch--submit" type="submit" value="&#10140;"/>
            <div class="flexsearch--input-wrapper">
                <input class="flexsearch--input" type="search" placeholder="side effect" name="adr">
                <input class="flexsearch--submit2" type="submit" value="&#10140;"/>
            </div>

        </form>
    </div>
</div>
    <div style="display:block ;  position: relative">

    <iframe id="ifram" width="100%" frameborder="0" height="100%" src="vis.html"></iframe>
    <script >
        $("#formSearch").submit(function(e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.

            var url = "search.php"; // the script where you handle the form input.
            var drug = this.drug.value;
            var adr = this.adr.value;
           if(drug==''){

               if(adr==''){
                   alert("ADR and Drug should not be empty");
                   return false;
               }
               alert("Drug should not be empty");
                return false;
           }
           if(adr==''){
               alert("ADR should not be empty");
               return false;
           }
            $("#load").show();
            var datat =$("#formSearch").serialize();
            $.ajax({
                type: "POST",
                url: url,
                data: datat, // serializes the form's elements.
                success: function(data)
                {
                    if(data.search("okrrlyc")!=-1){
                        //succ
                        document.getElementById("ifram").src="vis.php?fileName="+drug+"_"+adr;
                        //document.getElementById("ifram").contentDocument.location.reload(true);
                        //document.getElementById("ifram").scrollIntoView({  behavior: "smooth", block: "start" });
                        $('html, body').animate({
                            scrollTop: $("#ifram").offset().top
                        }, 600);
                    }else{
                        //fail
                        alert("sorry there is no proper data for this pair of ADR and Drug");
                    }

                    $("#load").hide();

                }
            });

        });
    </script>
        <div class="loader" id="load" hidden="hidden"></div>

    </div>
</div>


</html>
