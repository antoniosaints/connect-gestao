<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/htmx.org@1.9.11"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Gestão PDV e Controle de Estoque</title>
</head>
<style>
    @keyframes fade-in {
        from {
            opacity: 0;
        }
    }

    @keyframes fade-out {
        to {
            opacity: 0;
        }
    }

    @keyframes slide-from-right {
        from {
            transform: translateX(90px);
        }
    }

    @keyframes slide-to-left {
        to {
            transform: translateX(-90px);
        }
    }

    .slide-it {
        position: relative;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    ::view-transition-old(slide-it) {
        animation: 180ms cubic-bezier(0.4, 0, 1, 1) both fade-out,
            600ms cubic-bezier(0.4, 0, 0.2, 1) both slide-to-left;
    }

    ::view-transition-new(slide-it) {
        animation: 420ms cubic-bezier(0, 0, 0.2, 1) 90ms both fade-in,
            600ms cubic-bezier(0.4, 0, 0.2, 1) both slide-from-right;
    }
</style>

<body class="bg-gray-500">
    <div class="w-screen">
        <?php include __DIR__ . '/../partials/header.php'; ?>

        <!-- Conteúdo -->
        <div class="mt-14 sm:ml-64">
            <div class="content p-4 slide-it" id="content_main_page">

            </div>
        </div>
    </div>
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

        document.addEventListener("htmx:confirm", function(e) {
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