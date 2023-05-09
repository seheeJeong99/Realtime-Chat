const form = document.querySelector(".singup form"),
continueBtn = form.querySelector(".button input");

continueBtn.onclick = ()=>{
    console.log("hello");
}

// form.onsubmit = (e)=>{
//     e.preventDefault();   //prevent form from submitting
// }

// continueBtn.onclick = ()=>{
//     //start Ajax
//     let xhr = new XMLHttpRequest(); //XML object 생성
//     xhr.open("POST", "php/signup.php", true);  // (method, url, async)만 사용
//     xhr.onload = ()=>{
//         if(xhr.readyState === XMLHttpRequest.DONE){
//             if(xhr.status === 200){
//                 let data = xhr.response;        // xhr.response는 전달된 url의 응답을 반환함
//                 console.log(data);
//             }
//         }
//     }
//     xhr.send();
// }