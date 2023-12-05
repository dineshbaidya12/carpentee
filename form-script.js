let submitBtn = document.getElementById('submit-btn');

submitBtn.addEventListener('click', function () {
    let name = document.getElementById('name');
    let phone = document.getElementById('phone');
    let email = document.getElementById('email');
    let Message = document.getElementById('message-box');

    if (name.value == '') {
        name.style.border = '1px solid red';
    } else {
        name.style.border = '';
    }

    if (phone.value == '' || !isValidPhoneNumber(phone.value) || phone.value.length < 10) {
        phone.style.border = '1px solid red';
    } else {
        phone.style.border = '';
    }

    if (email.value == '' || !/^\S+@\S+\.\S+$/.test(email.value)) {
        email.style.border = '1px solid red';
    } else {
        email.style.border = '';
    }

    if (Message.value == '') {
        Message.style.border = '1px solid red';
    } else {
        Message.style.border = '';
    }

    if (name.value == '' || phone.value == '' || !isValidPhoneNumber(phone.value) || phone.value.length < 10 || email.value == '' || !/^\S+@\S+\.\S+$/.test(email.value) || Message.value == '') {
        console.log('Validation Failed');
    } else {
        let data = {
            name: name.value,
            email: email.value,
            phone: phone.value,
            message: Message.value
        };
        let url = 'ajax-req.php';
        sendTheData(data, url);
    }


});


function isValidPhoneNumber(phone) {
    return /^\d+$/.test(phone);
}

function sendTheData(data, url) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status) {
                    document.getElementById('contact-form').reset();
                    Swal.fire({
                        title: "Thank You!",
                        text: response.message,
                        icon: "success"
                    });
                } else {
                    Swal.fire({
                        title: "Sorry!",
                        text: response.message,
                        icon: "error"
                    });
                }
            } else {
                console.error('HTTP error! Status:', xhr.status);
            }
        }
    };

    xhr.onerror = function () {
        console.error('Request failed.');
    };

    xhr.send(JSON.stringify(data));
}