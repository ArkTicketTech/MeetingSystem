/**
 * Created by huanghongjiang on 15/12/13.
 */

function next(){
    return (index+1)%3;
}
window.onload = function(){
    var indexBack = document.getElementById('backIndex');
    indexBack.addEventListener('click',indexback);
    var orderby = document.getElementById('orderby');
    orderby.addEventListener('click',clickorderby);
}


function indexback(){
    document.write('退出成功');
    return false;
}

function clickorderby(){
    if(this.value=='升序排列'){
        this.value = '降序排列';
    }
    else{
        this.value = '升序排列';
    }
}