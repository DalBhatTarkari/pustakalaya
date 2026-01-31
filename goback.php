<?php 
function goback() {
    echo '
    <style>
    
    .icontray{
        all: unset;
        display:flex;
        flex-wrap:wrap;
        justify-content: flex-start;
        gap:10px;
    }
    .goback{
        position: relative;
        top:10px;
        left:10px;
        max-height:30px;
        cursor:pointer;
    }
    </style>
    <div class="icontray">
    <img class="goback" src="/pustakalaya/images/goback.png" onclick="window.history.back();" >
    <img class="goback" src="/pustakalaya/images/home.png" onclick="window.location.href=\'/pustakalaya/roles/users/dash.php\'" >
    </div>
    ';
}
?>
