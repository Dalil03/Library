


const searchInput = document.querySelector('.searchInput')
const searchBtn = document.querySelector('.searchButton')
const bookContainer = document.querySelector('.container')
const homeBtn = document.querySelector('.homeBtn')
const loginBtn = document.querySelector('.loginBtn')
const registerBtn = document.querySelector('.registerBtn')

loginBtn.addEventListener('click', ()=> {
    window.location.href ="login.view.php"

    })
    registerBtn.addEventListener('click', ()=> {
    bookContainer.innerHTML = "";

    })


    window.addEventListener('keypress', (e)=> {
        if(e.key === "Enter"){
            e.preventDefault();
            console.log('oui')
            searchBtn.click();
        }
    })



    searchBtn.addEventListener('click', () => {

            let search = searchInput.value
            if(search === ""){
                bookContainer.innerHTML = ''
                let error = document.createElement('p')
                error.classList.add('error-vide')
                error.textContent = 'Veuillez entrer un nom'
                bookContainer.appendChild(error)
            } else {

                axios.get(`https://www.googleapis.com/books/v1/volumes?q=${search}`)
                    .then(response => {
                        const items = response.data.items;
                        console.log(items)
                        this.displayBooks(items)
                    })
                    .catch(error =>{
                        console.log(error);
                    })
            }

        })

    function displayBooks(items) {
        // homeBtn.addEventListener('click', ()=> {
        // bookContainer.innerHTML = "";

        // })

        bookContainer.innerHTML = "";
        items.forEach(item => {

            let idBook = item.id;

            let divBook = document.createElement('div')
            let nameBook =document.createElement('h1')
            let authorBook =document.createElement('h2')
            let dateBook =document.createElement('h3')
            let genreBook = document.createElement('p')
            let imageBook = document.createElement('img')
            let shopBtn = document.createElement('button')

            
            nameBook.textContent = item.volumeInfo.title
            authorBook.textContent = item.volumeInfo.authors
            dateBook.textContent = item.volumeInfo.pusblishedDate
            genreBook.textContent = item.volumeInfo.categories
            imageBook.src = item.volumeInfo.imageLinks.smallThumbnail
            shopBtn.innerHTML = `
                                    <span> Favoris <3 </span>
                                
                                `
            
            divBook.classList.add('div-book')
            nameBook.classList.add('name-book')
            authorBook.classList.add('author-book')
            dateBook.classList.add('date-book')
            genreBook.classList.add('genre-book')
            imageBook.classList.add('image-book')
            shopBtn.classList.add('shop-btn')

            bookContainer.appendChild(divBook)
            divBook.appendChild(nameBook)
            divBook.appendChild(authorBook)
            divBook.appendChild(dateBook)
            divBook.appendChild(imageBook)
            divBook.appendChild(shopBtn)


            sendData(shopBtn,idBook, nameBook, authorBook, genreBook, imageBook)






            let cookies = document.cookie.split(';')
            let connectedCookie = cookies[0]
            let connected = cookies[0].substring(10,11)

            console.log("bla bla " + connected)

            if(connected === '1'){

                imageBook.addEventListener('mouseover', () =>{
                    shopBtn.style.opacity = 1;
                    shopBtn.style.transition = '1s';
    
                })
                imageBook.addEventListener('mouseout', () =>{
                    shopBtn.style.opacity = 0;
                    shopBtn.style.transition = '1s';
    
                })
                
                divBook.addEventListener('mouseover', () =>{
                    shopBtn.style.opacity = 1;
                    shopBtn.style.transition = '1s';
    
                })
                divBook.addEventListener('mouseout', () =>{
                    shopBtn.style.opacity = 0;
                    shopBtn.style.transition = '1s';
    
                })
                
                
                     
            } else {

            }


        
            


        });
    }


    function sendData(shopBtn,idBook, nameBookElement, authorBookElement, genreBookElement, imageBookElement ){
        shopBtn.addEventListener('click', () => {
            var nameBook = nameBookElement.innerText;
            var authorBook = authorBookElement.innerText;
            var genreBook = genreBookElement.innerText;
            var imageBook = imageBookElement.src;
    
            window.location.href = `fav.success.view.php?idBook=${encodeURIComponent(idBook)}&nameBook=${encodeURIComponent(nameBook)}&authorBook=${encodeURIComponent(authorBook)}&genreBook=${encodeURIComponent(genreBook)}&imageBook=${encodeURIComponent(imageBook)}`;
        });
    }
    
    








