const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=>{
    e.preventDefault();         //양식 제출 방지
}

sendBtn.onclick = () =>{
    //start Ajax
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                inputField.value = "";      //db에 메시지가 삽입되면 입력란을 빈칸으로 만듬
                scrollToBottom();
            }
        }
    }
    // Ajax를 통해 폼데이터를 php로 보내기
    let formData = new FormData(form);  //새로운 formData 객체 생성
    xhr.send(formData);                 //폼데이터를 php로 보냄
}

chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}

chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}

setInterval(()=>{       //반복실행함수의 지연설정
    //xml 시작
    let xhr = new XMLHttpRequest();    //xml 객체 생성
    xhr.open("POST", "php/get-chat.php", true);    
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                chatBox.innerHTML = data;
                if(!chatBox.classList.contains("active")){      //액티브 클래스가 챗박스에 없을 경우(마우스 없음) 스크롤이 하단으로 내려감
                    scrollToBottom();
                }
            }
        }
    }
    
    //ajax를 통해 php로 폼데이터를 보내야함
    let formData = new FormData(form);  //formData 객체 생성
    xhr.send(formData);                         //form data를 php로 보냄
}, 500);    //이 기능은 500ms마다 실행됨

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
}