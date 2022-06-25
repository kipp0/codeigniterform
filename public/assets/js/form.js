/**
 * With elementor you have to pay for the form components so I just did all this manually
 */

(function() {
    const submitBtn = document.querySelector('#submit')
    const form = document.querySelector('#register')
    const notificationSection = document.querySelector('#notification')

    // validation plugin to aid user when entering in information into the form
    new Validator(form, function (err, res) {
        console.log(res)
        return res
    });

    // ajax submit logic
    submitBtn.addEventListener('click', (e) => {
        e.preventDefault()
        
        const data = new FormData(form)
        data.append('action', 'form_add_user')

        const options = {
            method: "POST",
            credentials: 'same-origin',
            body: data
        }

        fetch(ajax_url, options)
        .then(res => res.json())
        .then(res => {
            notificationSection.innerHTML = ''
            console.log(res)
            if (!res.status) {
                const ul = document.createElement('ul')
                
                for (const error of res.errors) {
                    const li = document.createElement('li')
                    li.innerText = error
                    ul.append(li)
                }
                notificationSection.classList += 'failure'
                notificationSection.append(ul)
                return
            }
            notificationSection.classList += 'success'
            notificationSection.append(`Success: Thank you ${res.data[0].name}, an email was sent to ${res.data[0].email} with password and login username`)
        })
        .catch(err => {
            console.log(err)
        })
        
        
    })
    
}())

