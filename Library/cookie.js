
function showBtns(){

    let cookies = document.cookie.split(';')


    let connectedCookie = cookies[0]
    let connected = cookies[0].substring(10,11)

    const menu = document.querySelector('.menu')
    const loginBtn = document.querySelector('.loginBtn')
    const registerBtn = document.querySelector('.registerBtn')

    const disconnectBtn = document.createElement('li')
    

    disconnectBtn.textContent = 'Disconnect'

    menu.appendChild(disconnectBtn)

      
    if(connected === '1'){
        loginBtn.remove()
        registerBtn.remove()
        menu.classList.toggle('menu-connected')
        
        
             
    } else {
        disconnectBtn.remove()
    }





    disconnectBtn.addEventListener('click', () => {
        let cookies = document.cookie.split(';');
        for (let i = 0; i < cookies.length; i++) {
            let cookie = cookies[i].trim(); 
            if (cookie.indexOf('connected=1') === 0) {
                document.cookie = 'connected=0'; 
                window.location.href = 'index.php'
                break; 
            }
        }
    });
    
    
}

showBtns()



