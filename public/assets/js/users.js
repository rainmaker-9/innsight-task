const AlphabetInputs = document.querySelectorAll(".text-alphabets");
const EmailInputs = document.querySelectorAll(".text-email");
const NumericInputs = document.querySelectorAll(".text-numeric");
const FrmAddUser = document.querySelector("#FrmAddUser");
const FrmEditUser = document.querySelector("#FrmEditUser");
const DeleteButtons = document.querySelectorAll(".btn-delete");

if (AlphabetInputs.length > 0) {
  AlphabetInputs.forEach((input) => {
    input.addEventListener("keypress", (e) => {
      if (!IsAlphabet(e)) {
        e.preventDefault();
        return false;
      }
    });
    input.addEventListener("drop", (e) => {
      e.preventDefault();
      return false;
    });
    input.addEventListener("paste", (e) => {
      e.preventDefault();
      return false;
    });
  });
}

if (EmailInputs.length > 0) {
  EmailInputs.forEach((input) => {
    input.addEventListener("keypress", (e) => {
      if (!IsAllowedEmailCharacter(e)) {
        e.preventDefault();
        return false;
      }
    });
    input.addEventListener("drop", (e) => {
      e.preventDefault();
      return false;
    });
    input.addEventListener("paste", (e) => {
      e.preventDefault();
      return false;
    });
  });
}

if (NumericInputs.length > 0) {
  NumericInputs.forEach((input) => {
    input.addEventListener("keypress", (e) => {
      if (!IsNumeric(e)) {
        e.preventDefault();
        return false;
      }
    });
    input.addEventListener("drop", (e) => {
      e.preventDefault();
      return false;
    });
    input.addEventListener("paste", (e) => {
      e.preventDefault();
      return false;
    });
  });
}

if (FrmAddUser) {
  FrmAddUser.addEventListener("submit", (e) => {
    e.preventDefault();
    const data = new FormData(e.target);
    const inputs = e.target.querySelectorAll("input, select, button");
    disableFields(inputs, true);
    fetch("/add_user_ep", { method: "POST", body: data })
      .then((response) => {
        if (!response.ok) {
          throw new Error(response.statusText);
        }
        response.json().then((result) => {
          if (result) {
            showAlert(
              "",
              result.status ? "success" : "error",
              result.message,
              result.status ? "success" : "danger",
              result.status ? reloadPage : null
            );
          }
        });
      })
      .finally(() => {
        disableFields(inputs, false);
      });
  });
}

if (FrmEditUser) {
  FrmEditUser.addEventListener("submit", (e) => {
    e.preventDefault();
    const data = new FormData(e.target);
    const inputs = e.target.querySelectorAll("input, select, button");
    disableFields(inputs, true);
    fetch("/edit_user_ep", { method: "POST", body: data })
      .then((response) => {
        if (!response.ok) {
          throw new Error(response.statusText);
        }
        response.json().then((result) => {
          if (result) {
            showAlert(
              "",
              result.status ? "success" : "error",
              result.message,
              result.status ? "success" : "danger",
              result.status ? navigateToUsersList : null
            );
          }
        });
      })
      .finally(() => {
        disableFields(inputs, false);
      });
  });
}

const navigateToUsersList = () => {
  location.replace("/users");
};

if (DeleteButtons.length > 0) {
  DeleteButtons.forEach((button) => {
    button.addEventListener("click", (e) => {
      e.preventDefault();
      const userid = e.currentTarget.dataset.userid;
      if (userid) {
        showConfirmPromise(
          "Are you sure?",
          "This will delete this user. Are you sure?"
        ).then((res) => {
          if (res.isConfirmed) {
            const data = new FormData();
            data.append("userid", userid);
            fetch("/delete_user_ep", { method: "POST", body: data }).then(
              (response) => {
                if (!response.ok) {
                  throw new Error(response.statusText);
                }
                response.json().then((result) => {
                  if (result) {
                    showAlert(
                      "",
                      result.status ? "success" : "error",
                      result.message,
                      result.status ? "success" : "danger",
                      result.status ? navigateToUsersList : null
                    );
                  }
                });
              }
            );
          }
        });
      }
    });
  });
}
