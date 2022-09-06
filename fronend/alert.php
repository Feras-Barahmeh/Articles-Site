<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style> 
.modal {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(0);
    transition: all .3s ease-in-out;
    border: 1px solid black;
    border-radius: 5px;
    z-index: 1000;
    background-color: white;
    width: 500px;
    max-width: 80%;
}
.modal.active {
    transform: translate(-50%, -50%) scale(1);
}
.modal-header {
    padding: 10px 15px;
    position: relative;
    justify-content: space-between;
    align-items: center;
    display: flex;
    border-bottom: 1px solid black;
}
.modal-header .title {
    font-size: 1.25rem;
    font-weight: bold;
}
.modal-header .close-button {
    cursor: pointer;
    border: none;
    outline: none;
    border: none;
    background: none;
    font-size: 1.2rem;

}
.modal-body {
    padding: 10px 15px;
}
#overlay {
    position: fixed;
    opacity: 1;
    transition: all .3s ease-in-out;

    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, .5);
    pointer-events: none;
}
#overlay.active {
    opacity: 0;
    pointer-events: all;
}
    </style>
</head>
    <body>
        <button data-modal-target="#modal">Open</button>
        <div class="modal" id="modal">
            <div class="modal-header">
                <div class="title">Examle modal</div>
                <button data-colse-button class="close-button" >&times;</button>
            </div>

            <div class="modal-body">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, cumque? Odit, laborum. Expedita dicta soluta nulla sed! Voluptatibus minus vitae id repellat debitis temporibus soluta, sapiente at corporis, maxime quisquam harum deserunt tempore, beatae nisi necessitatibus molestias possimus perspiciatis eum? Deleniti sint quos ad similique facilis impedit reiciendis non officia aspernatur tempora enim modi, asperiores quas fugit quibusdam sapiente quidem consequuntur ducimus error doloremque numquam pariatur 
                totam! Quas repudiandae praesentium, at aspernatur enim ut! Facere ipsa nesciunt quas dolore voluptatum aspernatur corrupti, voluptatibus libero saepe!
            </div>
        </div>
        <div id="overlay active" ></div>

        <script>
            const openBtn = document.querySelectorAll(["data-modal-target"]);
            const closeBtn = document.querySelectorAll("[data-colse-button]");
            const overlay = document.getElementById("overlay");

            openBtn.forEach(button => {
                button.addEventListener("click", ()=>{
                    const modal = querySelector(button.dataset.modalTarget);
                    openModal(modal);
                });
            });

            closeBtn.forEach(button => {
                button.addEventListener("click", ()=>{
                    const modal = button.closest(".modal");
                    closeModal(modal);
                });
            });
            function openModal(modal) {
                if (modal == null) return ;
                modal.classList.add("active");
                overlay.classList.add("active");
            }
            function closeModal(modal) {
                if (modal == null) return ;
                modal.classList.remove("active");
                overlay.classList.remove("active");
            }

        </script>
    </body>
</html>