function toggleMenu(){
    const menu = document.getElementById('aside-menu');
    const opened = menu.getAttribute('class');
    if( opened === null ){  
        menu.setAttribute('class', 'opened');
    } else {
        menu.removeAttribute('class', 'opened');
    }
}

function handleErrors(response, callback=null){
    if (!response.ok) {
        throw Error(response.statusText);
    }
    if( callback !== null ){
        callback(response);
    }
    return response;
}