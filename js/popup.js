document.addEventListener("DOMContentLoaded", () => {
    const loginButton = document.querySelector("button.btn-default a[href='login.html']");
    const popup = document.getElementById("loginPopup");
    const closeButton = document.querySelector(".close-btn");

    loginButton.addEventListener("click", (e) => {
        e.preventDefault(); // Impede a navegação padrão
        popup.style.display = "flex"; // Mostra o pop-up
    });

    closeButton.addEventListener("click", () => {
        popup.style.display = "none"; // Esconde o pop-up
    });

    window.addEventListener("click", (e) => {
        if (e.target === popup) {
            popup.style.display = "none"; // Fecha ao clicar fora do pop-up
        }
    });
});
