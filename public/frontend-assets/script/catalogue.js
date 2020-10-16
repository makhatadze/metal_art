
// show search box
const showSearchBtn = document.querySelector('.search-btn');
const searchInput = document.querySelector('#search-input');

showSearchBtn.addEventListener('click', ()=> {
    searchInput.classList.toggle('show');
})


// switch grid / list
const displayList = document.querySelector('.display-list');
const displayGrid = document.querySelector('.display-grid');

// elements to change
const itemWrapper = document.querySelector('.catalogue__item-wrap');
const cards = document.querySelectorAll('.catalogue-card');

// list
displayList.addEventListener('click', () => {
    if(window.innerWidth < 1000) {
        // back tyo grid 
        itemWrapper.classList.remove('list');
        cards.forEach(c => {
            c.classList.remove('list');
        });
        return;  // under 1000 show grid only
    }  

    displayList.classList.add('active');
    displayGrid.classList.remove('active');

    // to list
    itemWrapper.classList.add('list');
    cards.forEach(c => {
        c.classList.add('list');
    })
} );

// grid
displayGrid.addEventListener('click', () => {
    displayList.classList.remove('active');
    displayGrid.classList.add('active');

    // back tyo grid 
    itemWrapper.classList.remove('list');
    cards.forEach(c => {
        c.classList.remove('list');
    })
} );






// change dolar gel filter
// dollar - gel switch active class
function changecurrency($id, $cur,id,dolarValue,realValue){
    // clear both
    let amount = realValue;
    if ($cur === 'dol') {
        amount = amount / dolarValue;
    }
    amount = `${parseInt(amount)}`;

    amount = amount.split('').reverse().join('').match(/.{1,3}/g).map(function (x) {
        return x.split('').reverse().join('')
    }).reverse()
    amount = amount.join(',')
    let sel = `.gel-${id}`;
    $(sel).text(amount);
    $('#'+$id+' .select-dol').removeClass('active');
    $('#'+$id+' .select-gel').removeClass('active');

    // add to selected - $(#curr2 .select-gel) -dol)
    $('#'+$id+' .select-'+$cur).addClass('active');
}



// pagination active  
$('.activable').click(function(e) {
    $('.activable').removeClass('active');

    $(e.target).addClass("active"); 
})