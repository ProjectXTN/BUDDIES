let element = document.getElementById('avis1');
let findClass = document.querySelectorAll('.cardRepear');
let buttonClickAvis = document.getElementById('clickVoirPlus');
let buttonClickComment = document.getElementById('clickVoirPlusComment');


function voirPlusAvis(){
console.log('ok')
    findClass.forEach(function(element){
        element.classList.toggle('hide')
    })
        

}

buttonClickAvis.addEventListener('click', voirPlusAvis);
buttonClickComment.addEventListener('click', voirPlusAvis);