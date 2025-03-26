document.addEventListener("DOMContentLoaded", function() {
    let inputs = document.querySelectorAll("input, select");
    let progressBar = document.getElementById("progress");

    inputs.forEach(input => {
        input.addEventListener("input", function() {
            let total = 0;
            document.querySelectorAll("input").forEach(i => {
                total += parseInt(i.value) || 0;
            });

            let progressValue = Math.min((total / 500) * 100, 100);
            progressBar.style.width = progressValue + "%";
        });
    });
});
