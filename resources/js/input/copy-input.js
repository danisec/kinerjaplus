const copyInput = document.getElementById("copy-input");
if (copyInput) {
    // Select the copy button and input field
    const copyButton = document.getElementById("copy-button");
    const copyText = document.getElementById("copy-text");
    const websiteInput = document.getElementById("website-input");

    // Event listener for the copy button
    copyButton.addEventListener("click", () => {
        // Copy the input value to the clipboard
        navigator.clipboard.writeText(websiteInput.value).then(() => {
            // Change the text to "Copied"
            copyText.textContent = "Copied";

            // Reset the text back to "Copy" after 2 seconds
            setTimeout(() => {
                copyText.textContent = "Copy";
            }, 2000);
        });
    });
}
