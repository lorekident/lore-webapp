window.addEventListener("success", (event) => {
    let elements = document.querySelectorAll(".btn-close");

    elements.forEach((element) => {
        element.click();
    });

    Swal.fire({
        icon: "success",
        iconHtml: '<i class="bx bx-check-double bx-flashing" ></i>',
        title: event.detail.message,
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        showCloseButton: true,
    }).then(() => {
        console.log(event.detail.redirect);
        if (event.detail.redirect) {
            window.location.href = event.detail.redirect;
        } else {
            event.detail.reload ? '' : location.reload()
        }
    });
});
window.addEventListener("reload-uploaded-files", (event) => {
    let elements = document.querySelectorAll(".btn-close");

    elements.forEach((element) => {
        element.click();
    });

    Swal.fire({
        icon: "info",
        iconHtml: '<i class="bx bx-question-mark bx-flashing"></i>',
        title: 'Reload Files',
        showCloseButton: true,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Reload',
        customClass: {
          confirmButton: 'rounded-5 border-none'
        }
      }).then((result) => {
        if (result.isConfirmed) {
          location.reload(); // Reload the page if the user confirms
        }
      });
});

window.addEventListener("err", (event) => {
    let elements = document.querySelectorAll(".btn-close");

    elements.forEach((element) => {
        element.click();
    });

    Swal.fire({
        icon: "error",
        iconHtml: '<i class="bx bxs-error-alt bx-tada" ></i>',
        title: event?.detail?.message,
        showConfirmButton: false,
        // timer: 4000,
        // timerProgressBar:true,
        showCloseButton: true,
    });
});

window.addEventListener("info", (event) => {
    let elements = document.querySelectorAll(".btn-close");

    elements.forEach((element) => {
        element.click();
    });

    Swal.fire({
        icon: "info",
        iconHtml: '<i class="bx bxs-info-circle bx-tada" ></i>',
        title: event?.detail?.message,
        showConfirmButton: false,
        // timer: 4000,
        // timerProgressBar:true,
        showCloseButton: true,
    });
});

window.addEventListener("warning", (event) => {
    let elements = document.querySelectorAll(".btn-close");

    elements.forEach((element) => {
        element.click();
    });

    Swal.fire({
        icon: "warning",
        iconHtml: '<i class="bx bxs-bell bx-tada" ></i>',
        title: event?.detail?.message,
        showConfirmButton: false,
        // timer: 4000,
        // timerProgressBar:true,
        showCloseButton: true,
    });
});
