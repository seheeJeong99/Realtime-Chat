const searchBar = document.querySelector(".users .search input"),
searchBtn = document.querySelector(".users .search button");

searchBtn.onclick = ()=>{
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active");
}

setInterval(()=>{
    //xml 시작
    let xhr = new XMLHttpRequest();    //xml 객체 생성
    xhr.open("GET", "php/users.php", true);     //POST가 아닌 GET 쓰는 이유 : 보내는게 아니라 데이터 받는게 필요함
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                console.log(data);
            }
        }
    }
    xhr.send();
}, 500);    //이 기능은 500ms마다 반복됨