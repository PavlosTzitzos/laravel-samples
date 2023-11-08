let form = document.querySelector('#some-form');
let loader = document.querySelector('#loader')

form.addEventListener('submit', function (event) {
    event.preventDefault();
  
    // using non css framework method with Style
    loader.style.display = 'block';
  
    // using a css framework such as TailwindCSS
    loader.classList.remove('hidden');

    // pretend the form has been sumitted and returned
    setTimeout(() => loader.style.display = 'none', 1000);
});