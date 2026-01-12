const copyInputs = document.querySelectorAll("[data-copy-input], #copy-input");

const fallbackCopy = (inputElement) => {
    if (inputElement && typeof inputElement.select === "function") {
        inputElement.focus();
        inputElement.select();
        if (typeof inputElement.setSelectionRange === "function") {
            inputElement.setSelectionRange(0, 99999);
        }
    }

    return document.execCommand("copy");
};

copyInputs.forEach((container) => {
    const copyButton = container.querySelector(
        "[data-copy-button], #copy-button",
    );
    const copyText = container.querySelector("[data-copy-text], #copy-text");
    const input = container.querySelector("[data-copy-value], #website-input");

    if (!copyButton || !copyText || !input) return;

    // Prevent <button> (default type="submit") from submitting the form.
    copyButton.type = "button";

    copyButton.addEventListener("click", async (event) => {
        event.preventDefault();
        event.stopPropagation();

        const value = input.value ?? "";

        try {
            if (navigator.clipboard?.writeText) {
                await navigator.clipboard.writeText(value);
            } else {
                fallbackCopy(input);
            }

            copyText.textContent = "Copied";
        } catch (error) {
            try {
                fallbackCopy(input);
                copyText.textContent = "Copied";
            } catch (_) {
                copyText.textContent = "Gagal";
            }
        } finally {
            setTimeout(() => {
                copyText.textContent = "Copy";
            }, 2000);
        }
    });
});
