const searchBar = document.querySelector(".users .search input"),
searchBtn = document.querySelector(".users .search button"),
usersList = document.querySelector(".users .users-list");

searchBtn.onclick = ()=>{
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active");
    searchBar.value = "";
}

searchBar.onkeyup = ()=>{
    let searchTerm = searchBar.value;
    if(searchTerm != ""){       //검색어를 치면 클래스에 active 추가
        searchBar.classList.add("active");
    }else{
        searchBar.classList.remove("active");
    }
    //xml 시작
    let xhr = new XMLHttpRequest();    //xml 객체 생성
    xhr.open("POST", "php/search.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                usersList.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);
}

setInterval(()=>{       //반복실행함수의 지연설정
    //xml 시작
    let xhr = new XMLHttpRequest();    //xml 객체 생성
    xhr.open("GET", "php/users.php", true);     //POST가 아닌 GET 쓰는 이유 : 보내는게 아니라 데이터 받는게 필요함
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(!searchBar.classList.contains("active")){    //active가 서치바 클래스에 포함되지 않을경우(검색어가 없을때) 이 데이터를 추가
                    usersList.innerHTML = data;
                }
            }
        }
    }
    xhr.send();
}, 500);    //이 기능은 500ms마다 실행됨