const sessionMsg = document.querySelector(".session-message");

if (sessionMsg !== null) {
    setTimeout(() => {
        sessionMsg.remove();
    }, 3000);
}
