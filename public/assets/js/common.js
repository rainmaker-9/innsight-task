/*
 * Common JavaScript Functionalities
 * Author: Raviraj Chougale
 * Web: https://ravirajchougale.com
 */

document.addEventListener("DOMContentLoaded", function () {
  const tooltipTriggerList = document.querySelectorAll(
    '[data-bs-toggle="tooltip"]'
  );
  [...tooltipTriggerList].map(
    (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
  );
});

const reloadPage = () => {
  location.reload();
};

const showAlert = (
  title,
  type,
  message,
  bstype,
  onConfirm,
  onDeny,
  onCancel
) => {
  if (Swal) {
    Swal.fire({
      title: title ?? title,
      text: message ?? message,
      icon: type ? type : null,
      confirmButtonText: "OK",
      buttonsStyling: false,
      customClass: {
        confirmButton: `btn btn-${bstype}`,
      },
      allowOutsideClick: false,
      allowEscapeKey: false,
    }).then((result) => {
      if (result.isConfirmed) {
        if (onConfirm) {
          onConfirm();
        }
      } else if (result.isDenied) {
        if (onDeny) {
          onDeny();
        }
      } else if (result.isDismissed) {
        if (onCancel) {
          onCancel();
        }
      }
    });
  }
};

const showConfirmPromise = (title, message) => {
  if (Swal) {
    return Swal.fire({
      title: title ?? title,
      text: message ?? message,
      icon: "question",
      showCancelButton: true,
      confirmButtonText: "Yes",
      cancelButtonText: "No",
      buttonsStyling: false,
      customClass: {
        confirmButton: "btn btn-danger",
        cancelButton: "btn btn-secondary",
      },
      allowOutsideClick: false,
      allowEscapeKey: false,
    });
  }
};

const showAlertToast = (message, type, position, time, callback) => {
  if (Swal) {
    Swal.fire({
      toast: true,
      position: position,
      timer: time,
      text: message,
      icon: type,
      showConfirmButton: false,
    }).then(() => {
      if (callback) {
        callback();
      }
    });
  }
};
