const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button");

sendBtn.onclick = () =>{
    //start Ajax
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "success"){
                    location.href = "users.php"
                }else{
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
            }
        }
    }
    // Ajax를 통해 폼데이터를 php로 보내기
    let formData = new FormData(form);  //새로운 formData 객체 생성
    xhr.send(formData);                 //폼데이터를 php로 보냄
}