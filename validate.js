let i = 0;
document.addEventListener("keyup",()=>{
    i++; 
    if(i>2){  //preventing msg from being printed on reload
        validate();
    }
})

function validate(){
    const inputs = document.getElementsByTagName("input");
    const cpw = document.getElementById("cpw");
    const submit =  document.getElementById("submit");
    const msg =  document.getElementById("msg");
    submit.disabled = true;

    for (let i = 0; i < inputs.length; i++) {
        if(inputs[i].value.trim()==""){
            msg.innerHTML = "Fill All Required Fields."
            return;
        }

        if(inputs[i].id.trim()=="pw"){
            if(inputs[i].value.length < 8){
                msg.innerHTML = "Password Too short."
                return;
            }

            if(cpw && cpw.value.trim() != pw.value.trim()){
                msg.innerHTML = "Both Passwords Donot Match."
                return;
            }
        }
    }

    msg.innerHTML = ""
    submit.disabled = false;
    
}