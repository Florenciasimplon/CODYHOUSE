let verif = document.querySelectorAll(".ok");
let validBtns = document.querySelectorAll(".valide");

console.log(verif[2].dataset.info);

let count = 0

validBtns.forEach((btn)=>{
    btn.addEventListener('click',function(){
        event.target.setAttribute("disabled", "");
        let divRep = btn.parentNode.children
        for (let i = 0; i < divRep.length; i++) {
             
            if (divRep[i].classList.contains('ok')) {
                
                if(divRep[i].dataset.info ==0){
                    divRep[i].style.backgroundColor = 'red'
                }else{
                    divRep[i].style.backgroundColor = 'green'

                }

                if (divRep[i].checked  ) {
                    if(divRep[i].dataset.info == 1){
                        count ++
                    }
                }
            }         
            if(divRep[i].classList.contains('description')){
                divRep[i].style.opacity = 1
            }
        }
        
        
        console.log('Ton score est de : ' + count);
        document.querySelector('.total').innerHTML = count
    })
})


