<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteador de Pessoas</title>
    <!-- MDBootstrap CSS -->
    <link
            href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css"
            rel="stylesheet"
    />
    <style>
        .person-card {
            text-align: center;
            margin: 10px;
        }
        .person-card img {
            border-radius: 50%;
        }
        .modal-body img {
            max-width: 100%;
            border-radius: 10px;
        }
    </style>
</head>
<body>
<div class="container text-center mt-5">
    <h1>Sorteio da(o) Anfitriã(o) - IV Encontro da Família Cecatto</h1>
    <div id="people-list" class="d-flex flex-wrap justify-content-center mt-4"></div>
    <button id="draw-button" class="btn btn-primary mt-4">Sortear</button>
</div>

<!-- Modal -->
<div
        class="modal fade"
        id="winnerModal"
        tabindex="-1"
        aria-labelledby="winnerModalLabel"
        aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="winnerModalLabel">Resultado do Sorteio</h5>
                <button
                        type="button"
                        class="btn-close"
                        data-mdb-dismiss="modal"
                        aria-label="Close"
                ></button>
            </div>
            <div class="modal-body text-center">
                <h4 id="modal-message"></h4>
                <img id="modal-image" alt="Vencedor">
            </div>
            <div class="modal-footer">
                <button
                        type="button"
                        class="btn btn-secondary"
                        data-mdb-dismiss="modal"
                >Fechar</button>
            </div>
        </div>
    </div>
</div>

<!-- MDBootstrap JS -->
<script
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"
></script>
<script>
    // Lista de pessoas com imagens
    const people = [
        { name: "Terê", image: "img/tere.jpg" },
        { name: "Lúcia", image: "img/LuciaeNego.jpeg" },
        { name: "Fátima", image: "img/fatima.png" },
        { name: "Afonso", image: "img/Afonso.JPG" },
        { name: "Marcos", image: "img/Marco.png" },
        { name: "Gorete", image: "img/GoreteeNego.jpg" },
        { name: "Kid", image: "img/KideVania.jpeg" },
        { name: "Iri", image: "img/IrieteRonaldo.JPG" }
    ];

    const peopleList = document.getElementById("people-list");
    const drawButton = document.getElementById("draw-button");
    const modalMessage = document.getElementById("modal-message");
    const modalImage = document.getElementById("modal-image");

    // Renderiza a lista de pessoas
    people.forEach((person) => {
        const card = document.createElement("div");
        card.className = "person-card card m-2 p-2";
        card.innerHTML = `
            <img height="130px" width="130px" src="${person.image}" alt="${person.name}">
            <p>${person.name}</p>
        `;
        peopleList.appendChild(card);
    });

    // Evento de sorteio
    drawButton.addEventListener("click", () => {
        const randomIndex = Math.floor(Math.random() * people.length);
        const winner = people[randomIndex];

        // Atualiza o conteúdo do modal
        modalMessage.innerHTML = `O encontro da família Cecatto em 2025 será organizado pela(o) tia(o):<br><h1>${winner.name}</h1>`;
        modalImage.src = winner.image;
        modalImage.alt = `Foto de ${winner.name}`;

        // Abre o modal
        const winnerModal = new mdb.Modal(document.getElementById('winnerModal'));
        winnerModal.show();
    });
</script>
</body>
</html>
