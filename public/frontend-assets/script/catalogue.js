// show search box
const showSearchBtn = document.querySelector('.search-btn');
const searchInput = document.querySelector('#search-input');

if (showSearchBtn) {
    showSearchBtn.addEventListener('click', () => {
        searchInput.classList.toggle('show');
    })
}

// switch grid / list
const displayList = document.querySelector('.display-list');
const displayGrid = document.querySelector('.display-grid');

// elements to change
const itemWrapper = document.querySelector('.catalogue__item-wrap');
const cards = document.querySelectorAll('.catalogue-card');

// list
if (displayList) {
    displayList.addEventListener('click', () => {
        if (window.innerWidth < 1000) {
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
    });
}

// grid
if (displayGrid) {
    displayGrid.addEventListener('click', () => {
        displayList.classList.remove('active');
        displayGrid.classList.add('active');

        // back tyo grid
        itemWrapper.classList.remove('list');
        cards.forEach(c => {
            c.classList.remove('list');
        })
    });

}

function changeSearch(e) {
    var str = 'searchValue=5';

    str = str.replace(/searchValue=5/g, "searchValue=10");
    let url = window.location.href;
    let searchUrl = '';
    if (url.includes('?')) {
        if (url.includes('searchValue=')) {
            let sp = url.split('?');
            searchUrl = `${sp[0]}?searchValue=${e.target.value}`
        } else {
            searchUrl = `${url}&searchValue=${e.target.value}`

        }
    }
    if (searchUrl == '') {
        searchUrl = `${url}?searchValue=${e.target.value}`
    }
    location.href = searchUrl;
}

// change dolar gel filter
// dollar - gel switch active class
function changecurrency($id, $cur, id, dolarValue, realValue) {
    // clear both
    let amount = realValue;
    if ($cur === 'dol') {
        amount = amount * dolarValue;
    }
    amount = `${parseInt(amount)}`;

    amount = amount.split('').reverse().join('').match(/.{1,3}/g).map(function (x) {
        return x.split('').reverse().join('')
    }).reverse()
    amount = amount.join(',')
    let sel = `.gel-${id}`;
    $(sel).text(amount);
    $('#' + $id + ' .select-dol').removeClass('active');
    $('#' + $id + ' .select-gel').removeClass('active');

    // add to selected - $(#curr2 .select-gel) -dol)
    $('#' + $id + ' .select-' + $cur).addClass('active');
}


// pagination active
$('.activable').click(function (e) {
    $('.activable').removeClass('active');

    $(e.target).addClass("active");
})

function brandChange(event) {
    $.ajax({
        url: "/brand-models",
        data: {
            'brand': event.target.value,
        }
    }).done(function (data) {
        if (data) {
            let option = '';
            data.forEach(el => {
                option = `${option}
                                <option value="${el.id}">${el.title}</option>
`
            })

            $('#brand-model').html(option)
        }
    });
}

// Select2
$('.select2').each(function () {
    let options = {}

    if ($(this).data('placeholder')) {
        options.placeholder = $(this).data('placeholder')
    }

    if ($(this).data('hide-search')) {
        options.minimumResultsForSearch = -1
    }

    $(this).select2(options)
})

if(window.File && window.FileList && window.FileReader) {
    $("#file1").on("change",function(e) {
        var files = e.target.files ,
            filesLength = files.length ;
        if (filesLength > 17) {
            alert('ზედმეტად ბევრი ფაილია');
            return false;
        }
        $('.statement-container').html(`<div id="statement-preview"></div>`);
        for (var i = 0; i < filesLength ; i++) {
            var f = files[i]
            var fileReader = new FileReader();
            fileReader.onload = (function(e) {
                var file = e.target;
                $("<img></img>",{
                    class : "imageThumb",
                    src : e.target.result,
                    title : file.name
                }).insertAfter("#statement-preview");
            });
            fileReader.readAsDataURL(f);
        }
    });
} else { alert("Your browser doesn't support to File API") }

$('#sendStatement').on('click',function (e) {

    let first_name = $('input[name="statement_first_name"]').val();
    let last_name = $('input[name="statement_last_name"]').val();
    let phone = $('input[name="statement_phone"]').val();
    let address = $('input[name="statement_address"]').val();
    let personal_id = $('input[name="statement_personal_id"]').val();
    let url = $('input[name="statement_url"]').val();
    let category = $('select[name="statement_category"]').val();
    //
    //
    if (first_name && last_name && phone && address && personal_id && category) {
        let $file = document.getElementById('file1'),
            $formData = new FormData();
        let count = 0;
        if ($file.files.length > 17) {
            alert(`ფაილის ზომა არის ზედმეტად დიდი ...`)
            return false;
        }
        if ($file.files.length > 0) {
            for (var i = 0; i < $file.files.length; i++) {
                if ($file.files[i].size > (1048576*6)) {
                    alert(`${i} - ფაილის ზომა არის ზედმეტად დიდი ...`)
                    return false;
                }
                $formData.append(i , $file.files[i]);
                count++;
            }
        }
        $formData.append('count',count);
        $formData.append('first_name',first_name)
        $formData.append('last_name',last_name)
        $formData.append('phone',phone)
        $formData.append('personal_id',personal_id)
        $formData.append('address',address)
        $formData.append('url',url)
        $formData.append('category',category)
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '/send-statement',
            processData: false,
            contentType: false,
            dataType: 'json',
            data: $formData,
            beforeSend: function () {
                $('.submit-box').addClass('active');
            },
            success: function (data) {
                setTimeout(() => {
                    $('.submit-box').removeClass('active');
                    $('.success-box').addClass('active');
                    $(':input', '.modal__form')
                        .not(':button, :submit, :reset, :hidden')
                        .val('')
                        .removeAttr('checked')
                        .removeAttr('selected');
                    modalS.removeClass('show');
                }, 1000);
            },
            error: function (xhr) { // if error occured
                if (xhr.statusText === 'OK') {
                    setTimeout(() => {
                        $('.submit-box').removeClass('active');
                        $('.success-box').addClass('active');
                        $(':input', '.modal__form')
                            .not(':button, :submit, :reset, :hidden')
                            .val('')
                            .removeAttr('checked')
                            .removeAttr('selected');
                        $('.imageThumb').attr('src','');
                        modalS.removeClass('show');

                    }, 1000);
                } else {
                    console.log(xhr.statusText)
                    console.log('ok')
                    setTimeout(() => {
                        $('.submit-box').removeClass('active');
                        $('.error-box').addClass('active');
                    }, 1000);
                }
            },
            complete: function () {
                setTimeout(() => {
                    $('.success-box').removeClass('active');
                    $('.error-box').removeClass('active');
                }, 2500);
            },
        });

    }
})
