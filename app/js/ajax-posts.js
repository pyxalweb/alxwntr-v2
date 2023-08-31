document.addEventListener("DOMContentLoaded", function() {
    let page = 1
    let loading = false

    function loadPosts() {
        if(loading) return
        loading = true

        const xhr = new XMLHttpRequest()
        xhr.open('POST', ajax_object.ajax_url, true)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
        xhr.onload = function() {
            if (xhr.status === 200) {
                document.querySelector('.posts').insertAdjacentHTML('beforeend', xhr.responseText)
                loading = false
                page++
            }
        }
        xhr.send('action=load_posts&page=' + page)
    }

    document.querySelector('.posts__more').addEventListener('click', function() {
        loadPosts()
    })

    loadPosts()
})
