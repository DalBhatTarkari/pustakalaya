function showmenu(){
    const menu=document.getElementById("menu");
    if (menu.style.display === "block") {
        menu.style.display = "none";
    } else {
        menu.style.display = "block";
    }
    console.log("Clicked");
}
function showbar()
{
    const menu=document.getElementById("searchbar");
    const but=document.getElementById("but");
    if (menu.style.display === "block") 
        {
            menu.style.display = "none";
            but.style.display = "none";
        }
        else {
            menu.style.display = "block";
            but.style.display = "block";
        }

}