const events = new EventSource("https://events.litera.my/events");

runLoader = (type) => {
    Swal.fire({
        title: type == 'load' ? 'Loading...' : 'Saving...',
        html: 'Please wait for a moment...',
        allowOutsideClick: false,
        allowEscapeKey: false,
        didOpen: () => {
            Swal.showLoading()
        }
    })

    et = setTimeout(showError, 10000)

    function showError(){
        Swal.fire(
            'Error!',
            'An error has been encountered, please contact the system administrator.',
            'error'
        )
    }
}

runAnnouncement = (message) => {
    Swal.fire({
        icon: 'warning',
        title: 'Announcement!',
        text: message,
        allowOutsideClick: false,
        allowEscapeKey: false,
    })
}

runReminder = (message) => {
    Swal.fire({
        icon: 'warning',
        title: 'Reminder!',
        text: message,
        allowOutsideClick: false,
        allowEscapeKey: false,
    })
}

runAlertSuccess = (message) => {
    return new Promise((resolve, reject) => {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: message,
            allowOutsideClick: false,
            allowEscapeKey: false,
        }).then((result) => {
            resolve(result)
        });
    
        clearTimeout(et)
    })
}

runError = (message) => {
    return new Promise((resolve, reject) => {
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: message,
            allowOutsideClick: false,
            allowEscapeKey: false,
        }).then((result) => {
            resolve(result)
        });
    
        clearTimeout(et)
    })
}

runAlertError = (message) => {
    Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: message,
        allowOutsideClick: false,
        allowEscapeKey: false,
    })
    
    clearTimeout(et)
}

runSuccess = (message) => {
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: message,
        allowOutsideClick: false,
        allowEscapeKey: false,
    }).then((result) => {
        if(result.value){
            runLoader('load')
            location.reload()
        }
    })
}

closeLoader = () => {
    Swal.close()
    clearTimeout(et)
}

window.addEventListener('beforeunload', () => {
    events.close();
});

events.onmessage = (event) => {
    const data = JSON.parse(event.data);
    if(data.apps == 'sportsarena-dev'){
        runAnnouncement(data.message)
    }
};

events.addEventListener('heartbeat',(event) => {
    console.log(event.data);
});

events.onerror = (error) => {
    console.error('Unable to connect to SSE server.');
    events.close();
};

decodeEntities = (encodedString) => {
    var textArea = document.createElement('textarea');
    textArea.innerHTML = encodedString;
    return textArea.value;
}