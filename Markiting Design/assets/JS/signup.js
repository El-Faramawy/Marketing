function openModal(){
    $('#myForm').on('submit', function(e){
    $('#myModal').modal('show');
    e.preventDefault();
    });
}
function openCredit(){
    window.location.href="credit.html";
}
document.getElementById("next").onclick=function(){
    document.getElementById("signUp").style.display="none";
    document.body.scrollTop=0;
    document.getElementById("creditCard").style.display="inline-block";
}
document.getElementById("previous").onclick=function(){
    document.getElementById("signUp").style.display="block";
    document.getElementById("creditCard").style.display="none";
}