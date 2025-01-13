function submitForm() {
    var servico = document.getElementById("servicos").value;
    var area = document.getElementById("areas").value;
    alert("Serviço selecionado: " + servico + "\nÁrea selecionada: " + area);
}

let selectedItems = [];

function selectItem(listItem) {
    const item = listItem.innerText;

    // Verifica se o item já está selecionado
    if (listItem.classList.contains('selected')) {
        // Se estiver selecionado, remove da lista de itens selecionados
        const index = selectedItems.indexOf(item);
        selectedItems.splice(index, 1);
        listItem.classList.remove('selected');
    } else {
        // Verifica se já foram selecionados 3 itens
        if (selectedItems.length < 3) {
            // Se ainda não foram selecionados 3 itens, adiciona o item selecionado
            selectedItems.push(item);
            listItem.classList.add('selected');
        } else {
            // Se já foram selecionados 3 itens, mostra um alerta
            alert("Você só pode selecionar até 3 itens.");
        }
    }

    // Atualiza a lista de itens selecionados
    updateSelectedItems();
}

function updateSelectedItems() {
    document.getElementById('selectedItem').innerText = 'Selecionado: ' + selectedItems.join(', ');
}

const maxSelecoes = 5;
const checkboxes = document.querySelectorAll('input[type="checkbox"]');

checkboxes.forEach(function(checkbox) {
    checkbox.addEventListener('change', function() {
        let selecionados = document.querySelectorAll('input[type="checkbox"]:checked');
        if (selecionados.length > maxSelecoes) {
            this.checked = false;
        }
    });
});


// Função para selecionar itens
function selectItem(item) {
    var selectedItem = document.getElementById("selectedItem");
    var selectedItems = selectedItem.innerHTML.split('');
    if (selectedItems.length <= 5) {
        if (!selectedItems.includes(item)) {
            selectedItems.push(item);
            selectedItem.innerHTML = " " + selectedItems.join('');
        }
    }
}

function selectItem(item) {
    var selectedItemDiv = document.getElementById("selectedItem");
    var selectedItems = selectedItemDiv.innerHTML.split(", ");
    var itemList = document.getElementById("itemList");

    if (selectedItems.length >= 5) {
        alert("Você já selecionou o limite de 5 itens.");
        return;
    }

    if (!selectedItems.includes(item)) {
        selectedItems.push(item);
        selectedItemDiv.innerHTML = selectedItems.join(" - ");
    }
}
