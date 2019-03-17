const init = () => {

    document.getElementById('auth-form').addEventListener('submit', function () {
       let formData = new FormData(this);
       if (formData.get('id') === "admin") {
           this.action = 'admin/requests.html';
       } else if (formData.get('id') === "user") {
           this.action = 'user-dashboard.html';
       } else if (formData.get('id') === "staff") {
           this.action = 'staff-dashboard.html';
       }
    });
};

init();