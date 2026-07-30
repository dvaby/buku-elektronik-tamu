import Keyboard from "simple-keyboard";
import "simple-keyboard/build/css/index.css";

document.addEventListener("DOMContentLoaded", () => {
    const keyboardContainer = document.querySelector(".simple-keyboard");
    if (!keyboardContainer) return;

    let currentInput = null;

    const keyboard = new Keyboard({
        onChange: (input) => {
            if (currentInput) {
                currentInput.value = input;
                currentInput.dispatchEvent(new Event("input"));
            }
        },
        onKeyPress: (button) => {
            if (button === "{shift}" || button === "{lock}") {
                keyboard.setOptions({
                    layoutName: keyboard.options.layoutName === "default" ? "shift" : "default",
                });
            }
        },
        layout: {
            default: [
                "1 2 3 4 5 6 7 8 9 0 {bksp}",
                "q w e r t y u i o p",
                "a s d f g h j k l",
                "{shift} z x c v b n m",
                "{space}",
            ],
            shift: [
                "! @ # $ % ^ & * ( ) {bksp}",
                "Q W E R T Y U I O P",
                "A S D F G H J K L",
                "{shift} Z X C V B N M",
                "{space}",
            ],
        },
    });

    // Setiap input/textarea yang punya class "kiosk-input" bakal aktifin keyboard ini
    document.querySelectorAll(".kiosk-input").forEach((input) => {
        input.addEventListener("focus", () => {
            currentInput = input;
            keyboard.setInput(input.value);
        });

        input.addEventListener("input", (e) => {
            keyboard.setInput(e.target.value);
        });
    });
});

document.addEventListener("DOMContentLoaded", () => {
    const sendirianSelect = document.getElementById("anda_sendirian");
    const jumlahWrapper = document.getElementById("jumlah_rombongan_wrapper");
    const jumlahInput = document.getElementById("jumlah_rombongan");

    if (sendirianSelect && jumlahWrapper) {
        const toggleJumlah = () => {
            if (sendirianSelect.value === "Rombongan") {
                jumlahWrapper.classList.remove("hidden");
                jumlahInput.setAttribute("required", "required");
            } else {
                jumlahWrapper.classList.add("hidden");
                jumlahInput.removeAttribute("required");
                jumlahInput.value = "";
            }
        };

        sendirianSelect.addEventListener("change", toggleJumlah);
        toggleJumlah(); // jalanin sekali pas halaman dimuat
    }
});