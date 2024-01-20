if (document.querySelector(".upload-img")) {
    let upImg = document.querySelectorAll(".upload-img");
    upImg.forEach((e) => {

        let imgPrev = document.querySelector(`.${e.dataset.target}`);
        e.addEventListener("change", function () {
            const oFReader = new FileReader();
            imgPrev.classList.remove("d-none");
            oFReader.readAsDataURL(e.files[0]);

            oFReader.onload = function (oFREvent) {
                imgPrev.src = oFREvent.target.result;
            }
        })
    })
}
