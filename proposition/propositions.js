let propositions = [
    {
        id: 1,
        contenu: "Je propose de développer le site en 2 semaines.",
        budget: 1200,
        date_creation: "2025-05-10",
        date_fin: "2025-05-24"
    },
    {
        id: 2,
        contenu: "Je peux livrer en 10 jours avec design responsive.",
        budget: 1500,
        date_creation: "2025-05-12",
        date_fin: "2025-05-22"
    }
];

let currentPage = 1;
const propositionsPerPage = 2;
let filteredPropositions = [...propositions];

// Affichage des propositions
function displayPropositions() {
    const list = document.getElementById('propositionsList');
    list.innerHTML = "";

    const start = (currentPage - 1) * propositionsPerPage;
    const end = start + propositionsPerPage;
    const toShow = filteredPropositions.slice(start, end);

    toShow.forEach(p => {
        const card = document.createElement('div');
        card.className = 'proposition-card';
        card.innerHTML = `
            <p><strong>Proposition:</strong> <span class="proposition-contenu">${p.contenu}</span></p>
            <p><strong>Budget:</strong> <span class="proposition-budget">${p.budget}</span> TND</p>
            <p><strong>Début:</strong> ${p.date_creation}</p>
            <p><strong>Livraison:</strong> ${p.date_fin}</p>
            <div class="card-actions">
                <button onclick='openEditPopup(${JSON.stringify(p)})' class="edit-button">✏️</button>
                <button onclick='alert("Suppression désactivée")' class="delete-button">🗑️</button>
                <button onclick='alert("Chat simulé")' class="message-btn">Message</button>
            </div>
        `;
        list.appendChild(card);
    });

    updatePaginationControls();
}

function updatePaginationControls() {
    const totalPages = Math.ceil(filteredPropositions.length / propositionsPerPage);
    document.getElementById("pageNumbers").textContent = `Page ${currentPage} sur ${totalPages}`;
    document.getElementById("prevPage").disabled = currentPage === 1;
    document.getElementById("nextPage").disabled = currentPage === totalPages;
}

document.getElementById('prevPage').onclick = () => {
    if (currentPage > 1) {
        currentPage--;
        displayPropositions();
    }
};

document.getElementById('nextPage').onclick = () => {
    if (currentPage < Math.ceil(filteredPropositions.length / propositionsPerPage)) {
        currentPage++;
        displayPropositions();
    }
};

document.getElementById('searchInput').addEventListener('input', () => {
    const term = document.getElementById('searchInput').value.toLowerCase();
    filteredPropositions = propositions.filter(p =>
        p.contenu.toLowerCase().includes(term) || p.budget.toString().includes(term)
    );
    currentPage = 1;
    document.querySelector('.search-results-counter').textContent = `${filteredPropositions.length} résultat(s) trouvé(s)`;
    displayPropositions();
});

document.getElementById('fakeCreateForm').addEventListener('submit', function (e) {
    e.preventDefault();
    alert("Soumission désactivée (simulation seulement)");
    closeForm();
});

document.getElementById('editForm').addEventListener('submit', function (e) {
    e.preventDefault();
    alert("Modification désactivée (simulation seulement)");
    closeEditPopup();
});

function openEditPopup(proposition) {
    document.getElementById('editPopup').style.display = 'block';
    document.getElementById('editContenu').value = proposition.contenu;
    document.getElementById('editBudget').value = proposition.budget;
    document.getElementById('editDateCreation').value = proposition.date_creation;
    document.getElementById('editDateFin').value = proposition.date_fin;
}

function closeEditPopup() {
    document.getElementById('editPopup').style.display = 'none';
}

function toggleForm() {
    document.getElementById('proposition-form').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
}

function closeForm() {
    document.getElementById('proposition-form').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
}

window.onload = displayPropositions;
