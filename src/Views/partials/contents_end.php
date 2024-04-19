<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    // htmx.logAll()
    htmx.config.globalViewTransitions = true
    htmx.on('htmx:responseError', (event) => {
        console.log(event);
        const error = event.detail.xhr
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            title: JSON.parse(error.response).message,
            showConfirmButton: false,
            timer: 5000
        })
    });

    htmx.on("htmx:beforeSwap", function(e) {
        console.log(e)

        if (e.detail.pathInfo.requestPath) {
            localStorage.setItem("path", e.detail.pathInfo.requestPath)
        }
    })

    htmx.on("htmx:confirm", function(e) {
        e.preventDefault()
        if (e.detail.question) {
            Swal.fire({
                title: "Confirma a ação?",
                text: `${e.detail.question}`,
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sim",
                cancelButtonText: "Cancelar",
            }).then(function(result) {
                if (result.isConfirmed) e.detail.issueRequest(true) // use true to skip window.confirm
            })
        } else {
            e.detail.issueRequest(true)
        }
    })
</script>
</body>

</html>